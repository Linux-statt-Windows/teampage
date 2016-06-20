<?php

/**
 * A function to sort a multidimensional array by a given criteria
 *
 * @return Closure
 */
function make_comparer() {
    // Normalize criteria up front so that the comparer finds everything tidy
    $criteria = func_get_args();
    foreach ($criteria as $index => $criterion) {
        $criteria[$index] = is_array($criterion)
            ? array_pad($criterion, 3, null)
            : array($criterion, SORT_ASC, null);
    }

    return function($first, $second) use ($criteria) {
        foreach ($criteria as $criterion) {
            // How will we compare this round?
            list($column, $sortOrder, $projection) = $criterion;
            $sortOrder = $sortOrder === SORT_DESC ? -1 : 1;

            // If a projection was defined project the values now
            if ($projection) {
                $lhs = call_user_func($projection, $first[$column]);
                $rhs = call_user_func($projection, $second[$column]);
            }
            else {
                $lhs = $first[$column];
                $rhs = $second[$column];
            }

            // Do the actual comparison; do not return if equal
            if ($lhs < $rhs) {
                return -1 * $sortOrder;
            }
            else if ($lhs > $rhs) {
                return 1 * $sortOrder;
            }
        }

        return 0; // tiebreakers exhausted, so $first == $second
    };
}

// Load data
$memberList_json = file_get_contents('members.json');
$memberList = json_decode($memberList_json, true)['members'];

// sort the members alphabetically
usort($memberList, make_comparer('name'));

// convert to stdClass for easier use
$memberList = json_decode(json_encode($memberList));

// Links to social media
$googlePlus = "https://plus.google.com/u/0/+";
$facebook = "https://www.facebook.com/";
$twitter = "https://twitter.com/";
$github = "https://github.com/";

// Fallback path for the background image
$fallbackBackgroundPic = "./backgroundPic/fallback.png";
$fallbackProfilePic = "./profilePic/fallback.gif";

/**
 * Prints the listItem, if existent.
 */
function ifListItemDefined($listItem, $category)
{
    if ($category == "E-Mail") {
        $listItem = "<a href=mailto:" . $listItem . ">" . $listItem . "</a>";
    }
    if ($listItem != "") {
        echo "<li>" . "<b>" . $category . ": </b>" . $listItem . "</li>";
    }
}

/**
 * Prints the Social Buttons, if existent.
 */
function ifSocialDefined($socialItem, $buttonType, $link)
{
    $buttonType = strtolower($buttonType);
    $iconClass = "";
    $buttonName = "";
    switch ($buttonType) {
        case "facebook":
            $iconClass = $buttonType;
            $buttonName = "Facebook";
            break;
        case "twitter":
            $iconClass = $buttonType;
            $buttonName = "Twitter";
            break;
        case "googleplus":
            $iconClass = "google-plus";
            $buttonName = "Google+";
            break;
        case "github":
            $iconClass = "github";
            $buttonName = "Github";
            break;
    }

    if ($socialItem != "") {
        echo "<a class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--" . $buttonType . "' target='_blank'
        href=" . $link . $socialItem . "><i class='fa fa-" . $iconClass . " fa-fw'></i>" . $buttonName . "</a></button>";
    }
}

// Prints
foreach ($memberList as $key) {

    // Main division of this overview
    echo "<div class='mdl-card mdl-cell mdl-shadow--2dp'>";

    // If there if no background picture, then use the fallback.png
    echo "<figure class='mdl-card__media mdl-color--primary'>";
    if (file_exists("./backgroundPic/" . $key->backgroundPic) && !empty($key->backgroundPic)) {
        echo "<img class='background' src='/backgroundPic/" . $key->backgroundPic . "'/>";
    } else {
        echo "<img class='background' src='" . $fallbackBackgroundPic . "'/>";
    }
    if (file_exists("./profilePic/" . $key->profilePic) && !empty($key->profilePic)) {
        echo "<img class='profilePic' src='/profilePic/" . $key->profilePic . "'/>";
    } else {
        echo "<img class='profilePic' src='" . $fallbackProfilePic . "'/>";
    }
    echo "</figure><br />";

    // Lists all items, which have no special function
    echo "<div class='mdl-card__title'><h1 class='mdl-card__title-text'>" . $key->name . " (" . $key->alias . ")</h1></div>"
        . "<div class='mdl-card__supporting-text'>"
        . "<ul class='mdl-list'>";

    $today = new DateTime();
    $birthdate = new DateTime($key->year);
    $interval = $today->diff($birthdate);

    ifListItemDefined($interval->format('%y'), "Alter");
    ifListItemDefined($key->project, "Abteilung");
    ifListItemDefined($key->location, "Ort");
    ifListItemDefined($key->email, "E-Mail");
    ifListItemDefined($key->tasks, "Aufgaben");
    ifListItemDefined($key->motto, "Motto");

    echo "</ul></div>";

    // Fill empty space
    echo "<div class='mdl-layout-spacer'></div>";

    // Lists available social media buttons
    if
    (
        !empty($key->facebook)
        || !empty($key->twitter)
        || !empty($key->google)
        || !empty($key->github)
    )
    {
        echo "<div class='mdl-card__actions mdl-card--border'>";
        ifSocialDefined($key->facebook, "facebook", $facebook);
        ifSocialDefined($key->twitter, "twitter", $twitter);
        ifSocialDefined($key->google, "googleplus", $googlePlus);
        ifSocialDefined($key->github, "github", $github);
        echo "</div>";
    }

    echo "</div >";
}
?>

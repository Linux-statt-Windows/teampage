<?php
// Load data
$memberList = file_get_contents('members.json');
$memberList_json = json_decode($memberList);

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
foreach ($memberList_json->members as $key) {

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
    $birthdate = new DateTime($key->age);
    $interval = $today->diff($birthdate);

    ifListItemDefined($interval->format('%y'), "Alter");
    ifListItemDefined($key->project, "Abteilung");
    ifListItemDefined($key->hometown, "Heimatstadt");
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
        echo "</div></div >";
    }
}
?>

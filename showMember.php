<?php
$memberList = file_get_contents('members.json');
$memberList_json = json_decode($memberList);

foreach ($memberList_json->members as $key) {
    echo
        "<section class='section--center mdl-shadow--2dp my-section'>"
        . "<ul class='mdl-list'>"
        . "<li>" . "<b>" . $key->name . "</b>" . "</li>"
        . "<li>" . "<span class='left'>" . "Alter: " . "</span>" . "<span class='right'>" . $key->age . "</span>" . "</li>"
        . "<li>" . "Abteilung: " . $key->project . "</li>"
        . "<li>" . $key->hometown . "</li>"
        . "<li>" . $key->email . "</li>"
        . "<li>" . $key->facebook . "</li>"
        . "<li>" . $key->twitter . "</li>"
        . "<li>" . $key->google . "</li>"
        . "<li>" . $key->profilePic . "</li>"
        . "<li>" . $key->backgroundPic . "</li>"
        . "</ul>"
        . "</section>";
}
?>

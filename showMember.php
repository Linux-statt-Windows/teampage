<?php
$memberList = file_get_contents('member.json');
$memberList_json = json_decode($memberList);
//var_dump($memberList_json);

foreach ($memberList_json->members as $key) {
    echo
        "<div class='card'>"
        . $key->name . "<br/>"
        . $key->age . "<br/>"
        . $key->project . "<br/>"
        . $key->hometown . "<br/>"
        . $key->email . "<br/>"
        . $key->facebook . "<br/>"
        . $key->twitter . "<br/>"
        . $key->google . "<br/>"
        . $key->profilePic . "<br/>"
        . $key->backgroundPic . "<br/>"
        . "</div>";
}
?>

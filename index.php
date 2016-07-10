<?php
require_once("vendor/autoload.php");
include_once("controller/member.php");

$controller = new MemberController();
$controller->display();
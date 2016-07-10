<?php

require_once("model/member.php");


class MemberController
{
    public $members;

    public $templates;

    public function __construct()
    {
        $this->members = new MemberModel();
        $this->templates = new League\Plates\Engine('view');
    }

    public function display()
    {
        // Register date to age function
        $this->templates->registerFunction('toAge', function ($year) {
            $today = new DateTime();
            $birthday = new DateTime($year);
            return $today->diff($birthday)->format('%y');
        });

        echo $this->templates->render('member', ['members' => $this->members->getMemberList()]);
    }
}
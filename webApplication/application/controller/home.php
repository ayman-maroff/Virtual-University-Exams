<?php

error_reporting(E_ERROR | E_PARSE);
//session_start();
// $_SESSION['login_state'] = true;
/**
 * 
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        if ($_SESSION['roleid'] == 1) {
            // echo "I am admin";
            // echo  $_SESSION['username'];
            //echo $_SESSION['rolename'];

            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/users/admin.php';
        } else if ($_SESSION['roleid'] == 2) {
            require_once 'application/templates/header.php';
            require_once 'application/views/TestCenter_views/navbar.php';
            require_once 'application/views/TestCenter_views/sidebar.php';
            require_once 'application/views/users/testCenterManager.php';
        } else if ($_SESSION['roleid'] == 3) {
            // echo "I am " . $_SESSION['rolename'] . " </br>";
            // echo  $_SESSION['username'];
            // echo  $_SESSION['userid'];
            require_once 'application/templates/header.php';
            require_once 'application/views/student_views/navbar.php';
            require_once 'application/views/student_views/sidebar.php';
            require_once 'application/views/users/student.php';
        } else {
            // echo "I am a Visiter";
            require_once 'application/views/home/index.php';
        }
    }
}

<?php
// session_start();

class material extends Controller
{
    function index(){
        header("Location:" . URL);
    }
    
    function coursesList()
    {
        if (in_array('coursesList', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('MaterialModel');
            $array3 = $actionsModel->coursesList();
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/admin-views/course_profile.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function coursesListST()
    {
        if (in_array('coursesListST', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('MaterialModel');
            $array = $actionsModel->coursesListST();
            require_once 'application/templates/header.php';
            require_once 'application/views/student_views/navbar.php';
            require_once 'application/views/student_views/sidebar.php';
            require_once 'application/views/student_views/coursesShow.php';
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

    function addcourse()
    {
        if (in_array('addcourse', $_SESSION['UserPermissions'])) {
            if (
                    isset($_POST['coursename'])
                ) {
                
                $coursename = trim($_POST['coursename']);
                $coursename = strip_tags($coursename);
                $topicname = trim($_POST['topicname']);
                $topicname=strip_tags($topicname);
                $model_name = $this->loadModel('MaterialModel');
                if($coursename=="" ){
                    $_SESSION['alert_text'] = "There are some empty inputs!";
                    $_SESSION['alert_code'] = "error";
                    $_SESSION['ref'] = "material/coursesList";
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/templates/scripts.php';
                }else{
                    $model_name->add($coursename, $topicname);
                }
            } else {
                echo "The Course name field is required.";
                die();
            }
           
            $_SESSION['alert_text'] = "Add completed!";
            $_SESSION['alert_code'] = "success";
            $_SESSION['ref'] = "material/coursesList";
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once  'application/templates/scripts.php';
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function prepareToUpdateCourse($course_id, $topic_id = null)
    {
        if (in_array('prepareToUpdateCourse', $_SESSION['UserPermissions'])) {
            $model_name = $this->loadModel('MaterialModel');
            if ($topic_id == null) {
                $array3 = $model_name->preparetoupdate($course_id);
                if (empty($array3[2])) {
                    $_SESSION['alert_text'] = "Invalid parameter!";
                    $_SESSION['alert_code'] = "error";
                    $_SESSION['ref'] = "home/index";
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/templates/scripts.php';
                } else {
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/views/admin-views/updatecourse.php';
                }
            } else {
                $array3 = $model_name->preparetoupdate($course_id, $topic_id);
                if (empty($array3[2])) {
                    $_SESSION['alert_text'] = "Invalid parameter!";
                    $_SESSION['alert_code'] = "error";
                    $_SESSION['ref'] = "home/index";
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/templates/scripts.php';
                } else {
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/views/admin-views/updatecourse.php';
                }
            }
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function updateCourse($course_id, $topic_id = null)
    {
        /*
                $_SESSION['alert_code']="success";
                                require_once  'application/templates/scripts.php';

                */
    if (in_array('updateCourse', $_SESSION['UserPermissions'])) {
        if (isset($_POST['coursename'])) {
            $coursename = trim($_POST['coursename']);
                $coursename = strip_tags($coursename);
                $topicname = trim($_POST['topicname']);
                $topicname=strip_tags($topicname);
            $model_name = $this->loadModel('MaterialModel');
            if($coursename=="" ){
                $_SESSION['alert_text'] = "There are some empty inputs!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "material/coursesList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            }else{
                $retrn = $model_name->courseupdate($course_id, $topic_id, $coursename, $topicname);

                if ($retrn == "1") {
                    $_SESSION['alert_text'] = "Update Completed!";
                    $_SESSION['alert_code'] = "success";

                    $actionsModel = $this->loadModel('MaterialModel');
                    $array3 = $actionsModel->coursesList();

                    $_SESSION['ref'] = "material/coursesList";
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/templates/scripts.php';
                } else {
                    $_SESSION['alert_text'] = "Update Failed!";
                    $_SESSION['alert_code'] = "error";
                    $_SESSION['ref'] = "material/coursesList";
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/templates/scripts.php';
                }
            }
        } else {
            echo "The Course name field is required.";
            die();
        }
    }else{
        echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
        echo "\r\n"."Your Permissions are: ";
        print_r($_SESSION['UserPermissions']);
    }
    }
    public function prepareToDeleteCourse($course_id, $topic_id = null){
        if (in_array('prepareToDeleteCourse', $_SESSION['UserPermissions'])) {
            $_SESSION['delete_path'] = "material/deleteCourse/".$course_id."/".$topic_id;
            $_SESSION['canceled_path'] = "material/coursesList";
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            // require_once 'application/views/admin-views/tests.php';
            require_once  'application/templates/delete_script.php';
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    public function deleteCourse($course_id, $topic_id = null)
    {
        if (in_array('deleteCourse', $_SESSION['UserPermissions'])) {
            $model_name = $this->loadModel('MaterialModel');
            $retrn = $model_name->deletecourse($course_id, $topic_id);
            if ($retrn == "1") {
                $_SESSION['alert_text'] = "Delete Completed!";
                $_SESSION['alert_code'] = "success";

                $actionsModel = $this->loadModel('MaterialModel');
                $array3 = $actionsModel->coursesList();

                $_SESSION['ref'] = "material/coursesList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            } else {
                $_SESSION['alert_text'] = "Delete Failed!";
                $_SESSION['alert_code'] = "error";

                $actionsModel = $this->loadModel('MaterialModel');
                $array3 = $actionsModel->coursesList();

                $_SESSION['ref'] = "material/coursesList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            }
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
}

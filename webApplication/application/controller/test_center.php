<?php
class test_center extends Controller
{
    function index(){
        header("Location:" . URL);
    }
    function CentersList()
    {  if (in_array('CentersList', $_SESSION['UserPermissions'])) {
        $actionsModel = $this->loadModel('Test_centerModel');
        $centers =  $actionsModel->CentersList();
        require_once 'application/templates/header.php';
        require_once 'application/views/admin-views/navbar.php';
        require_once 'application/views/admin-views/sidebar.php';
        require_once 'application/views/admin-views/testcenter.php';}
        else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function addcenter()
    {
        if (in_array('addcenter', $_SESSION['UserPermissions'])) {
            if (
            isset($_POST['centeraddress'])  && isset($_POST['capacity'])
        ) {
            $centeraddress = trim($_POST['centeraddress']);
            $centeraddress=strip_tags($centeraddress);
            $capacity = $_POST['capacity'];

            $model_name = $this->loadModel('Test_centerModel');
            if ($centeraddress=="") {
                $_SESSION['alert_text'] = "Some feilds are empty!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "test_center/CentersList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            } else {
                $model_name->add($centeraddress, $capacity);
            }
        }else {
                echo "All field are required.";
                die();
            }
            // $this->CentersList();
            $_SESSION['alert_text'] = "Add completed!";
            $_SESSION['alert_code'] = "success";
            $_SESSION['ref'] = "test_center/CentersList";
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
    function prepareToUpdateCenter($id)
    { 
        if (in_array('CentersList', $_SESSION['UserPermissions'])) {
            $model_name = $this->loadModel('Test_centerModel');

            $array3 = $model_name->preparetoupdate($id);
            // print_r($array3);
            if (empty($array3[1])) {
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
                require_once  'application/views/admin-views/updatecenter.php';
            }
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function updateCenter($id)
    {
        if (in_array('updateCenter', $_SESSION['UserPermissions'])) {
            if (
            isset($_POST['centeraddress'])  && isset($_POST['capacity'])
        ) {
            $centeraddress = trim($_POST['centeraddress']);
            $centeraddress=strip_tags($centeraddress);
            $capacity = $_POST['capacity'];

            $model_name = $this->loadModel('Test_centerModel');
            if ($centeraddress=="") {
                $_SESSION['alert_text'] = "Some feilds are empty!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "test_center/CentersList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            } else {
                $model_name->centerupdate($id, $centeraddress, $capacity);
            }
        }else {
                echo "All field are required.";
                die();
            }
            $_SESSION['alert_text'] = "Update completed!";
            $_SESSION['alert_code'] = "success";
            $_SESSION['ref'] = "test_center/CentersList";
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
    public function perpareTodeleteCenter($id){
        if (in_array('perpareTodeleteCenter', $_SESSION['UserPermissions'])) {
            $_SESSION['delete_path'] = "test_center/deleteCenter/".$id;
            $_SESSION['canceled_path'] = "test_center/CentersList".$topic_name;
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            // require_once 'application/views/admin-views/tests.php';
            require_once  'application/templates/delete_script.php';
        }
        else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);  
        }
    }
    public function deleteCenter($id)
    {

        if (in_array('deleteCenter', $_SESSION['UserPermissions'])) {
            $model_name = $this->loadModel('Test_centerModel');
            $model_name->deleteCenter($id);
            $_SESSION['alert_text'] = "Delete completed!";
            $_SESSION['alert_code'] = "success";
            $_SESSION['ref'] = "test_center/CentersList";
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
}

<?php


class user extends Controller
{
    function index(){
        header("Location:" . URL);
    }
    function login(){
        require_once 'application/views/users/login.php';
    }

    function preparetoaddUser(){
        
        require_once 'application/templates/header.php';
        require_once 'application/views/admin-views/navbar.php';
        require_once 'application/views/admin-views/sidebar.php';
        require_once 'application/views/users/register.php';
    }

    function adduser()
    {
        if(in_array('adduser',$_SESSION['UserPermissions'])){
 
        if (
            isset($_POST['firstname'])  && isset($_POST['lastname'])  && isset($_POST['midlename'])  &&
            isset($_POST['email']) &&
            isset($_POST['phonenumber'])
        ) {


                $firstname = trim($_POST['firstname']);
                $firstname=strip_tags($firstname);
                $lastname =trim($_POST['lastname']);
                $lastname=strip_tags($lastname);
                $midlename = trim($_POST['midlename']);
                $midlename=strip_tags($midlename);
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $phonenumber = $_POST['phonenumber'];
            $hashedpass = $_POST['password1'];

            //^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$ // (([a-z]|[A-Z]|[0-9])+)[@](([a-z]|[A-Z]|[0-9])+)[.]([a-z][a-z][a-z])
            if((!preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/" , $email)) || (!preg_match("/^[0-9][0-9][0-9][0-9]+$/" , $phonenumber))){
                $_SESSION['alert_text'] = "An error occured!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "user/userList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            }

             else {
                 $ROLE = $_POST['ROLE'];
                 $model_name = $this->loadModel('UsersModel');
                 if ($firstname=="" || $lastname=="" || $midlename=="") {
                     $_SESSION['alert_text'] = "An error occured!";
                     $_SESSION['alert_code'] = "error";
                     $_SESSION['ref'] = "user/userList";
                     require_once 'application/templates/header.php';
                     require_once 'application/views/admin-views/navbar.php';
                     require_once 'application/views/admin-views/sidebar.php';
                     require_once  'application/templates/scripts.php';
                 } else {
                     $_return_value = $model_name->add($firstname, $lastname, $midlename, $phonenumber, $gender, $email, $hashedpass, $ROLE);

                     if ($_return_value == "1") {
                         $_SESSION['alert_text'] = "Add Completed!";
                         $_SESSION['alert_code'] = "success";
                         $_SESSION['ref'] = "user/userList";
                         require_once 'application/templates/header.php';
                         require_once 'application/views/admin-views/navbar.php';
                         require_once 'application/views/admin-views/sidebar.php';
                         require_once  'application/templates/scripts.php';
                     } elseif ($_return_value == "2") {
                         $_SESSION['alert_text'] = "An error occured!";
                         $_SESSION['alert_code'] = "error";
                         $_SESSION['ref'] = "user/userList";
                         require_once 'application/templates/header.php';
                         require_once 'application/views/admin-views/navbar.php';
                         require_once 'application/views/admin-views/sidebar.php';
                         require_once  'application/templates/scripts.php';
                     } elseif ($_return_value == "3") {
                         $_SESSION['alert_text'] = "Someone already has the same email!";
                         $_SESSION['alert_code'] = "warning";
                         $_SESSION['ref'] = "user/userList";
                         require_once 'application/templates/header.php';
                         require_once 'application/views/admin-views/navbar.php';
                         require_once 'application/views/admin-views/sidebar.php';
                         require_once  'application/templates/scripts.php';
                     }
                 }
             }
        } else {
            echo "All field are required.";
            die();
        }
    }else{
        echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
        echo "\r\n"."Your Permissions are: ";
        print_r($_SESSION['UserPermissions']);
    }
    }

    function userprofileST($userId)
    {

        $model_name = $this->loadModel('UsersModel');
        $array = $model_name->prfileUser($userId);
        if (empty($array)) {
            $_SESSION['alert_text'] = "Invalid parameter!";
            $_SESSION['alert_code'] = "error";
            $_SESSION['ref'] = "user/index";
            require_once 'application/templates/header.php';
            require_once 'application/views/student_views/navbar.php';
            require_once 'application/views/student_views/sidebar.php';
            require_once  'application/templates/scripts.php';
        } else {
            require_once 'application/templates/header.php';
            require_once 'application/views/student_views/navbar.php';
            require_once 'application/views/student_views/sidebar.php';
            require_once 'application/views/TestCenter_views/profile.php';
        }
    }
    function userprofileTC($userId)
    {

        $model_name = $this->loadModel('UsersModel');
        $array = $model_name->prfileUser($userId);
        if (empty($array)) {
            $_SESSION['alert_text'] = "Invalid parameter!";
            $_SESSION['alert_code'] = "error";
            $_SESSION['ref'] = "user/index";
            require_once 'application/templates/header.php';
            require_once 'application/views/TestCenter_views/navbar.php';
            require_once 'application/views/TestCenter_views/sidebar.php';
            require_once  'application/templates/scripts.php';
        } else {
            require_once 'application/templates/header.php';
            require_once 'application/views/TestCenter_views/navbar.php';
            require_once 'application/views/TestCenter_views/sidebar.php';
            require_once 'application/views/TestCenter_views/profile.php';
        }
    }
    function userprofileAD($userId)
    {
        $model_name = $this->loadModel('UsersModel');
        $array = $model_name->prfileUser($userId);
        if (empty($array)) {
            $_SESSION['alert_text'] = "Invalid parameter!";
            $_SESSION['alert_code'] = "error";
            $_SESSION['ref'] = "user/index";
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once  'application/templates/scripts.php';
        } else {
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/TestCenter_views/profile.php';
        }
    }
    function confirmuser()
    {

        $name = $_POST['name'];
        $hashedpass = $_POST['password'];
        $model_name = $this->loadModel('UsersModel');
        $array = $model_name->confirm($name, $hashedpass);

       if($array==0){
        //    echo "<h1>Password doesnot matched!</h1>";
        //    require_once 'application/templates/header.php';
        //    require_once 'application/views/admin-views/navbar.php';
        //    require_once 'application/views/admin-views/sidebar.php';
           require_once 'application/views/users/loginfailed.php';

        }else{
           foreach ($array as $index) {
               if ($index->Role_id == 1) {
                   $_SESSION['roleid'] = 1;
                   $_SESSION['username'] = $index->firstname . " " . $index->lastname;
                   $_SESSION['rolename'] = "Admin";
                   $_SESSION['userid'] = $index->uid;
                   $ArrayOfUserPermissions = array();
                   $model_name2 = $this->loadModel('RolePermessionModel');
                   $permissions = $model_name2->getUserPermissions(1);
                   foreach ($permissions as $UserPermission) {
                       array_push($ArrayOfUserPermissions, $UserPermission->perm_name);
                   }

                   $_SESSION['UserPermissions']=$ArrayOfUserPermissions;
                   //  print_r($_SESSION['UserPermissions']);
                   // require_once './application/controller/home.php';
                   // $home = new Home();
                   // $home->index();
                   header("Location:" . URL . "home/index/");
               }
               if ($index->Role_id == 2) {
                   $_SESSION['roleid'] = 2;
                   $_SESSION['username'] = $index->firstname . " " . $index->lastname;
                   $_SESSION['rolename'] = "Test Center Manager";
                   $_SESSION['userid'] = $index->uid;
                   // require_once 'application/views/users/testcentermanager.php';
                   $ArrayOfUserPermissions = array();
                   $model_name2 = $this->loadModel('RolePermessionModel');
                   $permissions = $model_name2->getUserPermissions(2);
                   foreach ($permissions as $UserPermission) {
                       array_push($ArrayOfUserPermissions, $UserPermission->perm_name);
                   }

                   $_SESSION['UserPermissions']=$ArrayOfUserPermissions;
                   //  print_r($_SESSION['UserPermissions']);
                   // require_once './application/controller/home.php';
                   // $home = new Home();
                   // $home->index();
                   header("Location:" . URL . "home/index/");
               }
               if ($index->Role_id == 3) {
                   $questionId = array();
                   $optionId = array();
                   $Ids = array($questionId, $optionId);
                   // $_SESSION['Exam_timer'] = 0;
                   $_SESSION['Examing'] =  $Ids;
                   $_SESSION['roleid'] = 3;
                   $_SESSION['username'] = $index->firstname . " " . $index->lastname;
                   $_SESSION['rolename'] = "Student";
                   $_SESSION['userid'] = $index->uid;
                   $_SESSION['Mname'] = "";
                   $ArrayOfUserPermissions = array();
                   $model_name2 = $this->loadModel('RolePermessionModel');
                   $permissions = $model_name2->getUserPermissions(3);
                   foreach ($permissions as $UserPermission) {
                       array_push($ArrayOfUserPermissions, $UserPermission->perm_name);
                   }

                   $_SESSION['UserPermissions']=$ArrayOfUserPermissions;
                   //  print_r($_SESSION['UserPermissions']);
                   // require_once './application/controller/home.php';
                   // $home = new Home();
                   // $home->index();
                   header("Location:" . URL . "home/index/");
               }
           }
       }
    }

    function userList()
    {


        $actionsModel = $this->loadModel('UsersModel');
        $users = $actionsModel->userslist();
        require_once 'application/templates/header.php';
        require_once 'application/views/admin-views/navbar.php';
        require_once 'application/views/admin-views/sidebar.php';
        require_once 'application/views/admin-views/users.php';
    }

    public function prepareTodeleteUser($user_id){
        if (in_array('prepareTodeleteUser', $_SESSION['UserPermissions'])) {
            $_SESSION['delete_path'] = "user/deleteUser/".$user_id;
            $_SESSION['canceled_path'] = "user/userList";
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
    public function deleteUser($user_id)
    {
        if (in_array('deleteUser', $_SESSION['UserPermissions'])) {
            if (isset($user_id)) {
                $usermodel = $this->loadModel('UsersModel');
                $usermodel->deleteUser($user_id);
            }
            $Usermodel = $this->loadModel('UsersModel');
            $users =  $Usermodel->userslist();
            $_SESSION['alert_text'] = "Delete Completed!";
            $_SESSION['alert_code'] = "success";
            $_SESSION['ref'] = "user/userList";
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
    function prepareToUpdateUser($user_id)
    {
        if (in_array('updateUser', $_SESSION['UserPermissions'])) {
            $model_name = $this->loadModel('UsersModel');
            $array = $model_name->preparetoupdate($user_id);
            if (empty($array)) {
                $_SESSION['alert_text'] = "Invalid parameter!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "user/index";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            } else {
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/views/users/updateuser.php';
            }
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function updateUser($user_id)
    {
        if (in_array('updateUser', $_SESSION['UserPermissions'])) {
            if (
                        isset($_POST['firstname'])  && isset($_POST['lastname'])  && isset($_POST['midlename'])  &&
                        isset($_POST['email']) &&
                        isset($_POST['phonenumber'])
                    ) {
                        $firstname = trim($_POST['firstname']);
                        $firstname=strip_tags($firstname);
                $lastname =trim($_POST['lastname']);
                $lastname=strip_tags($lastname);
                $midlename = trim($_POST['midlename']);
                $midlename=strip_tags($midlename);
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $phonenumber = $_POST['phonenumber'];
                $ROLE = $_POST['ROLE'];
                if ((!preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/", $email)) || (!preg_match("/^[0-9][0-9][0-9][0-9]+$/", $phonenumber))) {
                    $_SESSION['alert_text'] = "An error occured!";
                    $_SESSION['alert_code'] = "error";
                    $_SESSION['ref'] = "user/userList";
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/templates/scripts.php';
                } else {
                    $model_name = $this->loadModel('UsersModel');
                    if ($firstname=="" || $lastname=="" || $midlename=="") {
                        $_SESSION['alert_text'] = "An error occured!";
                            $_SESSION['alert_code'] = "error";
                            $_SESSION['ref'] = "user/userList";
                            require_once 'application/templates/header.php';
                            require_once 'application/views/admin-views/navbar.php';
                            require_once 'application/views/admin-views/sidebar.php';
                            require_once  'application/templates/scripts.php';
                    } else {
                        $reutrn_value = $model_name->userupdate($user_id, $firstname, $lastname, $midlename, $phonenumber, $gender, $email, $ROLE);
                        if ($reutrn_value == "1") {
                            $_SESSION['alert_text'] = "Update Completed!";
                            $_SESSION['alert_code'] = "success";
                            $_SESSION['ref'] = "user/userList";
                            require_once 'application/templates/header.php';
                            require_once 'application/views/admin-views/navbar.php';
                            require_once 'application/views/admin-views/sidebar.php';
                            require_once  'application/templates/scripts.php';
                        } elseif ($reutrn_value == "2") {
                            $_SESSION['alert_text'] = "An error occured!";
                            $_SESSION['alert_code'] = "error";
                            $_SESSION['ref'] = "user/userList";
                            require_once 'application/templates/header.php';
                            require_once 'application/views/admin-views/navbar.php';
                            require_once 'application/views/admin-views/sidebar.php';
                            require_once  'application/templates/scripts.php';
                        } elseif ($reutrn_value == "3") {
                            $_SESSION['alert_text'] = "Someone already has the same email!";
                            $_SESSION['alert_code'] = "warning";
                            $_SESSION['ref'] = "user/userList";
                            require_once 'application/templates/header.php';
                            require_once 'application/views/admin-views/navbar.php';
                            require_once 'application/views/admin-views/sidebar.php';
                            require_once  'application/templates/scripts.php';
                        }
                    }
                }
            } else {
                echo "All field are required.";
                die();
            }
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function logout()
    {
        $_SESSION = array("");
        require_once 'application/views/home/index.php';
    }
}

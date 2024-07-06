<?php
class question extends Controller
{
    function index(){
        header("Location:" . URL);
    }

    function questionsList($topic_name)
    {
        if (in_array('questionsList', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('QuestionModel');
            $questions =  $actionsModel->questionsList($topic_name);
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/admin-views/subjects.php';
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

    function displayQuestion($question_id, $topic_name)
    {
        if (in_array('displayQuestion', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('QuestionModel');
            $questions =  $actionsModel->questionsList($topic_name);
            $Q_informations =  $actionsModel->displayQuestion($question_id);
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/admin-views/subjects.php';
            require_once 'application/views/admin-views/questions.php';
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

    function addQuestion($topic_name)
    {
        if (in_array('addQuestion', $_SESSION['UserPermissions'])) {
            if (
            isset($_POST['Qtext'])  && isset($_POST['Mark']) && $_POST['num'] && $_POST['option1'] && $_POST['option2']
        ) {
                $quetinText = trim($_POST['Qtext']);
                $quetinText=strip_tags($quetinText);
                $mark = $_POST['Mark'];
                $optionNum = $_POST['num'];
                $correct = $_POST['correct'];
                $option1 = trim($_POST['option1']);
                $option1=strip_tags($option1);
                $option2 = trim($_POST['option2']);
                $option2=strip_tags($option2);
                $option3 = trim($_POST['option3']);
                $option3=strip_tags($option3);
                $option4 = trim($_POST['option4']);
                $option4=strip_tags($option4);
                $option5 = trim($_POST['option5']);
                $option5=strip_tags($option5);

                $model_name = $this->loadModel('QuestionModel');
                if((($optionNum==2) && ($option1=="" || $option2==""))|| (($optionNum==3) && ($option1=="" || $option2=="" || $option3==""))
                || (($optionNum==4) && ($option1=="" || $option2=="" || $option3=="" || $option4==""))
                || (($optionNum==5) && ($option1=="" || $option2=="" || $option3=="" || $option4=="" || $option5==""))
                ){
                    $_SESSION['alert_text']="Some feilds are empty!";
                        $_SESSION['alert_code']="error";
                        $_SESSION['ref'] = "question/questionsList/".$topic_name;

                        $actionsModel = $this->loadModel('QuestionModel');
                        $questions =  $actionsModel->questionsList($topic_name);
                        
                        require_once 'application/templates/header.php';
                        require_once 'application/views/admin-views/navbar.php';
                        require_once 'application/views/admin-views/sidebar.php';
                        // require_once 'application/views/admin-views/subjects.php';
                        require_once  'application/templates/scripts.php';
                    
                }else{
                    $retrn = $model_name->addquestion($topic_name, $quetinText, $mark, $optionNum, $correct, $option1, $option2, $option3, $option4, $option5);

                    if ($retrn == "1") {
                        $_SESSION['alert_text']="Add Completed!";
                        $_SESSION['alert_code']="success";
                        $_SESSION['ref'] = "question/questionsList/".$topic_name;

                        $actionsModel = $this->loadModel('QuestionModel');
                        $questions =  $actionsModel->questionsList($topic_name);
                        require_once 'application/templates/header.php';
                        require_once 'application/views/admin-views/navbar.php';
                        require_once 'application/views/admin-views/sidebar.php';
                        // require_once 'application/views/admin-views/subjects.php';
                        require_once  'application/templates/scripts.php';
                    } else {
                        $_SESSION['alert_text']="Add Failed!";
                        $_SESSION['alert_code']="error";
                        $_SESSION['ref'] = "question/questionsList/".$topic_name;
                        ;
                        require_once 'application/templates/header.php';
                        require_once 'application/views/admin-views/navbar.php';
                        require_once 'application/views/admin-views/sidebar.php';
                        require_once  'application/templates/scripts.php';
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
        //$this->questionsList($topic_name);
    }
    function prepareAddquestion($topicname)
    {
        if (in_array('prepareAddquestion', $_SESSION['UserPermissions'])) {
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/admin-views/add-question.php';
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

    public function prepareTodeleteQuestion($question_id, $topic_name){
        if (in_array('prepareTodeleteQuestion', $_SESSION['UserPermissions'])) {
            $_SESSION['delete_path'] = "question/deleteQuestion/".$question_id."/".$topic_name;
            $_SESSION['canceled_path'] = "question/questionsList".$topic_name;
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            // require_once 'application/views/admin-views/tests.php';
            require_once  'application/templates/delete_script.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    public function deleteQuestion($question_id, $topic_name)
    {

        if (in_array('deleteQuestion', $_SESSION['UserPermissions'])) {
            $usermodel = $this->loadModel('QuestionModel');
            $retrn = $usermodel->deleteQuestion($question_id);
            // $this->questionsList($topicname);

            if ($retrn == "1") {
                $_SESSION['alert_text']="Delete Completed!";
                $_SESSION['alert_code']="success";
                $_SESSION['ref'] = "question/questionsList/".$topic_name;;

                $actionsModel = $this->loadModel('QuestionModel');
                $questions =  $actionsModel->questionsList($topic_name);
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            } else {
                $_SESSION['alert_text']="Delete Failed!";
                $_SESSION['alert_code']="error";
                $_SESSION['ref'] = "question/questionsList/".$topic_name;;
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
    function prepareToUpdateQuestion($question_id, $topicname)
    {
        if (in_array('prepareToUpdateQuestion', $_SESSION['UserPermissions'])) {
            $model_name = $this->loadModel('QuestionModel');
            $array = $model_name->preparetoupdate($question_id);
            if (empty($array)) {
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
                require_once 'application/views/admin-views/update-question.php';
            }
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function updateQuestion($question_id, $topic_name)
    {
        if (in_array('updateQuestion', $_SESSION['UserPermissions'])) {
            if (
            isset($_POST['Qtext'])  && isset($_POST['Mark']) && $_POST['num'] && $_POST['option1'] && $_POST['option2']
        ) {
            $quetinText = trim($_POST['Qtext']);
            $quetinText=strip_tags($quetinText);
                $mark = $_POST['Mark'];
                $optionNum = $_POST['num'];
                $correct = $_POST['correct'];
                $option1 = trim($_POST['option1']);
                $option1=strip_tags($option1);
                $option2 = trim($_POST['option2']);
                $option2=strip_tags($option2);
                $option3 = trim($_POST['option3']);
                $option3=strip_tags($option3);
                $option4 = trim($_POST['option4']);
                $option4=strip_tags($option4);
                $option5 = trim($_POST['option5']);
                $option5=strip_tags($option5);

                $model_name = $this->loadModel('QuestionModel');
            if((($optionNum==2) && ($option1=="" || $option2==""))|| (($optionNum==3) && ($option1=="" || $option2=="" || $option3==""))
                || (($optionNum==4) && ($option1=="" || $option2=="" || $option3=="" || $option4==""))
                || (($optionNum==5) && ($option1=="" || $option2=="" || $option3=="" || $option4=="" || $option5==""))
                ){
                    $_SESSION['alert_text']="Some feilds are empty!";
                    $_SESSION['alert_code']="error";
                    $_SESSION['ref'] = "question/questionsList/".$topic_name;

                    $actionsModel = $this->loadModel('QuestionModel');
                    $questions =  $actionsModel->questionsList($topic_name);
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    // require_once 'application/views/admin-views/subjects.php';
                    require_once  'application/templates/scripts.php';
                
            }else{
                $retrn = $model_name->Questionupdate($question_id, $quetinText, $mark, $optionNum, $correct, $option1, $option2, $option3, $option4, $option5);

                if ($retrn == "1") {
                    $_SESSION['alert_text']="Update Completed!";
                    $_SESSION['alert_code']="success";
                
                    $actionsModel = $this->loadModel('QuestionModel');
                    $questions =  $actionsModel->questionsList($topic_name);
               
                    $_SESSION['ref'] = "question/questionsList/".$topic_name;
                    ;
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/templates/scripts.php';
                } else {
                    $_SESSION['alert_text']="Update Failed!";
                    $_SESSION['alert_code']="error";
                    $_SESSION['ref'] = "question/questionsList/".$topic_name;
                    ;
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/templates/scripts.php';
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
        // $this->questionsList($topicname);
    }
}

<?php

class test extends Controller
{
    function index(){
        header("Location:" . URL);
    }

    function ExamQuestionlList($exam, $material_name, $cid)
    {
        if (in_array('ExamQuestionlList', $_SESSION['UserPermissions'])) {
            require_once 'application/templates/header.php';
            require_once 'application/views/TestCenter_views/navbar.php';
            require_once 'application/views/TestCenter_views/sidebar.php';
            require_once 'application/views/TestCenter_views/ExamView.php';
            // require_once 'application/templates/footer.php';
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

    function MaterialList()
    {
        if (in_array('MaterialList', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('TestModel');
            $array = $actionsModel->materialList();
            require_once 'application/templates/header.php';
            require_once 'application/views/TestCenter_views/navbar.php';
            require_once 'application/views/TestCenter_views/sidebar.php';
            require_once 'application/views/TestCenter_views/GenerateExam.php';
        }
         else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
         }
    }
    function prepareToGenerate($cid)
    { 
         if (in_array('prepareToGenerate', $_SESSION['UserPermissions'])) {
             $model_name = $this->loadModel('TestModel');

             $array2 = $model_name->prepareToGenerate($cid);
             if (empty($array2)) {
                $_SESSION['alert_text'] = "Invalid parameter!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "user/index";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            } else {
                require_once 'application/templates/header.php';
                require_once 'application/views/TestCenter_views/navbar.php';
                require_once 'application/views/TestCenter_views/sidebar.php';
                require_once  'application/views/TestCenter_views/Generate.php';
            }
         }
        else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function Generate($cid, $material_name)
    {
        if (in_array('Generate', $_SESSION['UserPermissions'])) {
            $Number = $_POST['Number'];
            $model_name = $this->loadModel('TestModel');
            $exam = $model_name->generate($cid, $Number);
            if (count($exam) == 0) {
                $_SESSION['alert_text'] = "Generate Failed!";
                $_SESSION['alert_code'] = "error";
                $actionsModel = $this->loadModel('TestModel');
                $array = $actionsModel->materialList();
                $_SESSION['ref'] = "test/MaterialList";
                require_once 'application/templates/header.php';
                require_once 'application/views/TestCenter_views/navbar.php';
                require_once 'application/views/TestCenter_views/sidebar.php';
                // require_once 'application/views/TestCenter_views/GenerateExam.php';
                require_once  'application/templates/scripts.php';
            } else {
                $this->ExamQuestionlList($exam, $material_name, $cid);
            }
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function testsList()
    {
        if (in_array('testsList', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('TestModel');
            $tests = $actionsModel->listOfTests();
            require_once 'application/templates/header.php';
            require_once 'application/views/TestCenter_views/navbar.php';
            require_once 'application/views/TestCenter_views/sidebar.php';
            require_once 'application/views/TestCenter_views/tests.php';
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function prepareTodeletTest($Tid){
        if (in_array('prepareTodeletTest', $_SESSION['UserPermissions'])) {
            $_SESSION['delete_path'] = "test/deletTest/".$Tid;
            $_SESSION['canceled_path'] = "test/testsList";
            require_once 'application/templates/header.php';
            require_once 'application/views/TestCenter_views/navbar.php';
            require_once 'application/views/TestCenter_views/sidebar.php';
            // require_once 'application/views/admin-views/tests.php';
            require_once  'application/templates/delete_script.php';
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function deletTest($tid)
    {
        if (in_array('deletTest', $_SESSION['UserPermissions'])) {
            $_SESSION['alert_text'] = "Delete Completed!";
            $_SESSION['alert_code'] = "success";
            $actionsModel = $this->loadModel('TestModel');
            $tests = $actionsModel->deletTest($tid);
            $_SESSION['ref'] = "test/testsList";
            require_once 'application/templates/header.php';
            require_once 'application/views/TestCenter_views/navbar.php';
            require_once 'application/views/TestCenter_views/sidebar.php';
            // require_once 'application/views/admin-views/tests.php';
            require_once  'application/templates/scripts.php';
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function saveExam($MaterialId, $MaterialName)
    {
        $exam = $_POST['hiddenArray'];
        if (isset($_POST['AddExambtn'])) {
            if (isset($_POST['fullmark']) && isset($_POST['date']) && isset($_POST['time'])) {
                $fullMark = $_POST['fullmark'];
                $date = $_POST['date'];
                $time = $_POST['time'];

                $actionsModel = $this->loadModel('TestModel');
                $returnValue = $actionsModel->addTest($exam, $MaterialId, $fullMark, $date, $time);

                if ($returnValue == "1") {
                    $_SESSION['alert_text'] = "Test Saved!";
                    $_SESSION['alert_code'] = "success";
                    $_SESSION['ref'] = "test/testsList";
                    $actionsModel = $this->loadModel('TestModel');
                    $tests = $actionsModel->listOfTests();
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    // require_once 'application/views/admin-views/tests.php';
                    require_once  'application/templates/scripts.php';
                    // $ind = 0;
                    // if ($ind == 0) {
                    //     header("Location:" . URL . "test/testsList");
                    // }
                } else {
                    $_SESSION['alert_text'] = "Test un Saved!";
                    $_SESSION['alert_code'] = "error";
                    $_SESSION['ref'] = "test/testsList";
                    $actionsModel = $this->loadModel('TestModel');
                    $tests = $actionsModel->listOfTests();
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    // require_once 'application/views/admin-views/tests.php';
                    require_once  'application/templates/scripts.php';
                }
            }
        }
    }
    function Examing($Mid)
    {

        if (in_array('Examing', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('TestModel');
            $test = $actionsModel->Examing($Mid);

            if ($test!=0) {
                require_once 'application/views/student_views/showExam.php';
            } else {
                // error_reporting(E_NOTICE);
                // ini_set("display_errors", 0);

                // echo "<h1>An ERROR has been cought !</h1>";
                $_SESSION['alert_text'] = "There is NO QUESTIONS in this course topics!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "test/displayCenters";
                require_once 'application/templates/header.php';
                require_once 'application/views/student_views/navbar.php';
                require_once 'application/views/student_views/sidebar.php';
                require_once  'application/templates/scripts.php';
            }
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function prepareToStartExam($Mid, $Mname){
        if (in_array('prepareToStartExam', $_SESSION['UserPermissions'])) {
            $_SESSION['delete_path'] = "test/StartExam/".$Mid."/".$Mname;
            $_SESSION['canceled_path'] = "test/displayCenters";
            require_once 'application/templates/header.php';
            require_once 'application/views/student_views/navbar.php';
            require_once 'application/views/student_views/sidebar.php';
            // require_once 'application/views/admin-views/tests.php';
            require_once  'application/templates/confirm_script.php';
        }
        else{  echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }

    }
    function StartExam($Mid, $Mname)
    {
        if (in_array('StartExam', $_SESSION['UserPermissions'])) {
            $_SESSION['Mname'] = $Mname;
            $actionsModel = $this->loadModel('TestModel');
            $testinfo = $actionsModel->StartExam($Mid);
            $time = 0;
            foreach ($testinfo as $index) {
                $time = $index->time;
                break;
            }

            // echo $time;
            $_SESSION['Exam_timer'] = $time;
            header("Location:" . URL . "test/Examing/" . $Mid);
        }else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
        // $this->Examing($Mid);
    }
    function displayCenters()
    {

   if (in_array('displayCenters', $_SESSION['UserPermissions'])) {
       $actionsModel = $this->loadModel('TestModel');
       $centers = $actionsModel->displayCenters();
       require_once 'application/templates/header.php';
       require_once 'application/views/student_views/navbar.php';
       require_once 'application/views/student_views/sidebar.php';
       require_once 'application/views/student_views/Examing.php';
   }
        else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function Nextquestion($Qid, $Tid, $restNum)
    {


        $actionsModel = $this->loadModel('TestModel');
        $test = $actionsModel->Nextquestion($Qid, $Tid, $restNum);

        require_once 'application/views/student_views/showExam.php';
    }

    function Previosquestion($Qid, $Tid, $restNum)
    {



        $actionsModel = $this->loadModel('TestModel');
        $test = $actionsModel->Previosquestion($Qid, $Tid, $restNum);

        require_once 'application/views/student_views/showExam.php';
    }
    function Move($Qid, $Tid, $restNum)
    {
        if (in_array('Move', $_SESSION['UserPermissions'])) {
            $_SESSION['ExamID'] = $Tid;
            if (isset($_POST['correct'])) {
                $restNum--;

                if (in_array($Qid, $_SESSION['Examing'][0])) {
                    unset($_SESSION['Examing'][0][array_search($Qid, $_SESSION['Examing'][0])]);
                    unset($_SESSION['Examing'][1][array_search($_POST['correct'], $_SESSION['Examing'][1])]);
                }
                array_push($_SESSION['Examing'][0], $Qid);

                array_push($_SESSION['Examing'][1], $_POST['correct']);
            }

            if (isset($_POST['next'])) {
                $this->nextQuestion($Qid, $Tid, $restNum);
            }
            if (isset($_POST['previos'])) {
                $this->Previosquestion($Qid, $Tid, $restNum);
            }
            if (isset($_POST['submit'])) {
                // $this->Previosquestion($Qid, $Tid, $restNum);
                header("Location:" . URL . "test/submitExam/");
            }
        }else{ echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
            
        }
    }
    function submitExam()
    {
        if (in_array('submitExam', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('TestModel');
            $mark = $actionsModel->submitExam();
            $questionId = array();
            $optionId = array();
            $Ids = array($questionId, $optionId);
            $_SESSION['Examing'] =  $Ids;
            
            $_SESSION['alert_text'] = "Your exam is complete, your mark is: " . $mark;
            $_SESSION['alert_code'] = "success";
            $_SESSION['ref'] = "test/ShowStudenExam/" . $_SESSION['userid'];
            require_once 'application/templates/header.php';
            require_once 'application/views/student_views/navbar.php';
            require_once 'application/views/student_views/sidebar.php';

            require_once  'application/templates/scripts.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
        
    }
    function ShowStudenExam($Std)
    {  
         if (in_array('ShowStudenExam', $_SESSION['UserPermissions'])) {
             $actionsModel = $this->loadModel('TestModel');
             $Tests = $actionsModel->ShowStudentExams($Std);
             require_once 'application/templates/header.php';
             require_once 'application/views/student_views/navbar.php';
             require_once 'application/views/student_views/sidebar.php';
             require_once 'application/views/student_views/MyExam.php';
         }
        else{
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n"."Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
}

<?php
require_once 'BaseModel.php';
class TestModel extends BaseModel
{
    public function __construct($db)
    {
        parent::__construct($db, "test");
    }
    function materialList()
    {

        $Select = "SELECT mt_name ,material.id as cid FROM material where (material.id in (SELECT Material_id from topic));";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();


        return $array;
    }
    function updateMList($new)
    {

        $Select = "SELECT mt_name ,material.id as cid FROM material where (material.id in (SELECT Material_id from topic));";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();
        $array2 = array($array, $new);

        return $array2;
    }
    public function prepareToGenerate($cid)
    {


        $Select = "SELECT material.id as cid , mt_name FROM material  WHERE ( material.id = '$cid' )";
        $stmt = $this->db->prepare($Select);
        $stmt->execute();
        $new = $stmt->fetchAll();

        return $this->updateMList($new);
    }
    public function generate($cid, $Number)
    {
        $Select = "SELECT question.id from question where ( Topic_id in (SELECT topic.id from topic where (Material_id = '$cid')) )";
        $stmt = $this->db->prepare($Select);
        $stmt->execute();
        $new = $stmt->fetchAll();
        $exam = array();
        if (count($new) > $Number || count($new) == $Number) {
            $Select = "SELECT id from topic where (Material_id = '$cid')";
            $stmt = $this->db->prepare($Select);
            $stmt->execute();
            $Topics = $stmt->fetchAll();
            // echo count($Topics);
            // echo $Number;
            while ($Number != 0) {
                // echo "lll";
                foreach ($Topics as $tid) {
                    // echo $tid->id;
                    // $tid = $tiid;

                    $Select = "SELECT id ,question_text,num_of_answers,question_mark from question where (Topic_id = '$tid->id')";
                    $stmt = $this->db->prepare($Select);
                    $stmt->execute();
                    $questions = $stmt->fetchAll();
                    if (count($questions) != 0) {
                        $indexrand = rand(0, count($questions) - 1);
                        $qid = $questions[$indexrand];
                        if (count($questions) > 1) {
                            while (in_array($qid, $exam)) {

                                $indexrand = rand(0, count($questions) - 1);
                                // echo "/////////////////////////////////////////////////////";
                                // echo $indexrand;
                                // echo "/////////////////////////////////////////////////////";

                                $qid = $questions[$indexrand];
                            }
                            array_push($exam, $qid);
                            $Number--;
                            if ($Number == 0)
                                break;
                            else {
                                continue;
                            }
                        } else if (count($questions) == 1) {
                            if (!in_array($qid, $exam)) {
                                array_push($exam, $qid);
                                $Number--;
                                if ($Number == 0)
                                    break;
                                else {
                                    continue;
                                }
                            }
                        }
                    }
                }
            }
        }
        // echo 'jjjjjjjjjjjjj';
        // print_r($exam);
        return $exam;
    }
    function listOfTests()
    {
        //SELECT question_text,num_of_answers,question_mark,option.correct, option.text FROM question INNER JOIN option on question.id = option.Question_id where 
        $Select = "SELECT test.id as tid,full_mark,num_of_questions,time,date,mt_name from test INNER JOIN material on test.Material_id = material.id ";
        $query = $this->db->prepare($Select);
        $query->execute();
        return $query->fetchAll();
    }
    function deletTest($tid)
    {
        $delete = "DELETE from question_test where (Test_id = '$tid')";
        $query = $this->db->prepare($delete);
        $query->execute();

        $this->deleteById($tid);
        return $this->listOfTests();
    }
    function addTest($exam, $MaterialId, $fullMark, $date, $time)
    {

        $numofQuestions = count($exam);
        $Insert = "INSERT INTO `test` ( `full_mark`, `num_of_questions`, `time`, `date`, `Material_id`) VALUES ( '$fullMark', '$numofQuestions', '$time', '$date', '$MaterialId')";
        $query = $this->db->prepare($Insert);
        $query->execute();

        $Select = "SELECT test.id as tid from test where (full_mark = '$fullMark' and date = '$date' and time = '$time' and Material_id = '$MaterialId' )  ";
        $query = $this->db->prepare($Select);
        $query->execute();
        $tid = $query->fetch();

        foreach ($exam as $questionId) {

            $insertt = "INSERT INTO `question_test` ( `Question_id`, `Test_id`) VALUES ( '$questionId', '$tid->tid')";
            $query = $this->db->prepare($insertt);
            $query->execute();
        }
        return "1";
    }
    function displayCenters()
    {
        // try{
            $Select = "SELECT id ,mt_name FROM material";
            $query = $this->db->prepare($Select);
            $query->execute();
            $array2 = $query->fetchAll();
            $Select = "SELECT id ,address, capacity FROM test_center";
            $query = $this->db->prepare($Select);
            $query->execute();
            $array1 = $query->fetchAll();
            $array = array($array1, $array2);
            return $array;
        // }catch(E_WARNING $e){
        //     echo "<h1>There is a E_Wraning Error !</h1>";
        // }
    }
    function Examing($Mid)
    {

        // try{
        $Select = "SELECT id ,full_mark,num_of_questions,time ,date from test where (Material_id = '$Mid')";
        $stmt = $this->db->prepare($Select);
        $stmt->execute();
        $exams = $stmt->fetchAll();

        if (count($exams) != 0) {
            $Tid = 0;
            if (count($exams) > 1) {
                $indexrand = rand(0, count($exams) - 1);

                $Tid = $exams[$indexrand];
            } else {
                $Tid =  $exams[0];
            }
            $temp = $Tid->id;
            $Select = "SELECT Question_id  from  question_test where Test_id = '$temp' ";
            $stmt = $this->db->prepare($Select);
            $stmt->execute();
            $questions = $stmt->fetchAll();


            foreach ($questions as $index) {
                $id = $index->Question_id;
                $Select = "SELECT question_text,num_of_answers,question_mark,option.id ,option.correct, option.text FROM question INNER JOIN option on question.id = option.Question_id where question.id= '$index->Question_id'";
                $query = $this->db->prepare($Select);
                $query->execute();
                $test = $query->fetchAll();
                array_push($test, $id);
                break;
            }

            if (count($test)>=1) {
                array_push($test, $exams[$indexrand]);
                array_push($test, 1);
                array_push($test, $exams[$indexrand]->num_of_questions);
                return $test;
            }else{
                // echo "<h1>An ERROR has been cought !</h1>";
                return 0;
            }


        }
        // }catch(E_NOTICE $e){
        //     echo "<h1>An ERROR has been cought !</h1>";
        // }
        

    }
    function Nextquestion($Qid, $Tid, $restNum)
    {
        $Select = "SELECT id ,full_mark,num_of_questions,time ,date from test where (id = '$Tid')";
        $stmt = $this->db->prepare($Select);
        $stmt->execute();
        $exams = $stmt->fetchAll();
        $Select = "SELECT Question_id  from  question_test where Test_id = '$Tid' ";
        $stmt = $this->db->prepare($Select);
        $stmt->execute();
        $questions = $stmt->fetchAll();
        $NumOfQuestion = 0;
        $NextquestionID = 0;

        for ($i = 0; $i < count($questions); $i++) {

            if ($questions[$i]->Question_id == $Qid && $i + 1 < count($questions)) {
                echo $i;
                $NumOfQuestion = $i + 2;
                $NextquestionID = $questions[$i + 1]->Question_id;
                break;
            }
        }
        $Select = "SELECT question_text,num_of_answers,question_mark,option.id ,option.correct, option.text FROM question INNER JOIN option on question.id = option.Question_id where question.id= '$NextquestionID'";
        $query = $this->db->prepare($Select);
        $query->execute();
        $test = $query->fetchAll();
        array_push($test,  $NextquestionID);
        array_push($test, $exams[0]);
        array_push($test, $NumOfQuestion);
        array_push($test, $restNum);
        return $test;
    }

    function  Previosquestion($Qid, $Tid, $restNum)
    {
        $Select = "SELECT id ,full_mark,num_of_questions,time ,date from test where (id = '$Tid')";
        $stmt = $this->db->prepare($Select);
        $stmt->execute();
        $exams = $stmt->fetchAll();
        $Select = "SELECT Question_id  from  question_test where Test_id = '$Tid' ";
        $stmt = $this->db->prepare($Select);
        $stmt->execute();
        $questions = $stmt->fetchAll();
        $NumOfQuestion = 0;
        $PrequestionID = 0;

        for ($i = 0; $i < count($questions); $i++) {

            if ($questions[$i]->Question_id == $Qid && $i - 1 >= 0) {

                $NumOfQuestion = $i;
                $PrequestionID = $questions[$i - 1]->Question_id;
                break;
            }
        }
        $Select = "SELECT question_text,num_of_answers,question_mark,option.id ,option.correct, option.text FROM question INNER JOIN option on question.id = option.Question_id where question.id= '$PrequestionID'";
        $query = $this->db->prepare($Select);
        $query->execute();
        $test = $query->fetchAll();
        array_push($test,  $PrequestionID);
        array_push($test, $exams[0]);
        array_push($test, $NumOfQuestion);
        array_push($test, $restNum);
        return $test;
    }
    function StartExam($Mid)
    {
        $Select = "SELECT time from test where (Material_id = '$Mid')";
        $stmt = $this->db->prepare($Select);
        $stmt->execute();
        $array = array();
        $array = $stmt->fetchAll();
        return $array;
    }
    function submitExam()
    {
        $Tid = $_SESSION['ExamID'];

        $MarkOfEachQuestion = 0;
        $examStudentMark = 0;
        $examFullMark = 0;
        $Select = " SELECT question_mark FROM question INNER JOIN question_test on question.id = question_test.Question_id where question_test.Test_id='$Tid'";
        $stmt = $this->db->prepare($Select);
        $stmt->execute();
        $marks = array();
        $marks = $stmt->fetchAll();
        foreach ($marks as $index) {
            $examFullMark += $index->question_mark;
        }
        $path = "studentExams.txt";
        $handler = fopen($path, 'r+');
        $Material_Name = $_SESSION['Mname'];
        file_put_contents($path, 'Student ID: ' . $_SESSION['userid'] . "\r\n", FILE_APPEND);
        file_put_contents($path, 'Material Name: ' . $Material_Name . "\r\n", FILE_APPEND);
        file_put_contents($path, 'Date: ' . date("Y-m-d") . "\r\n", FILE_APPEND);


        $Select = "SELECT * from test where (id= '$Tid')";
        $stmt = $this->db->prepare($Select);
        $stmt->execute();
        $array = array();
        $array = $stmt->fetchAll();
        $NumOfQuestion = $array[0]->num_of_questions;

        $questions_ids_session = array();
        $options_ids_session = array();

        foreach ($_SESSION['Examing'][0] as $session_element) {
            array_push($questions_ids_session,  $session_element);
        }
        foreach ($_SESSION['Examing'][1] as $session_element) {
            array_push($options_ids_session,  $session_element);
        }

        $ids_array = array($questions_ids_session, $options_ids_session);
        $j = 0;
        for ($i = 0; $i < count($options_ids_session); $i++) {

            $qid = $ids_array[0][$i];
            $Select = "SELECT * from question where (id= '$qid')";
            $stmt = $this->db->prepare($Select);
            $stmt->execute();
            $question = array();
            $question = $stmt->fetchAll();
            $j = $i + 1;


            foreach ($question as $Ques) {
                $Question_Text = $Ques->question_text;
                file_put_contents($path, 'Question' . $j . ':' . $Question_Text . "\r\n", FILE_APPEND);
                $MarkOfEachQuestion = $Ques->question_mark;
                break;
            }


            $oid = $ids_array[1][$i];

            $Select = "SELECT correct,text from option where (id = '$oid' and Question_id='$qid')";
            $stmt = $this->db->prepare($Select);
            $stmt->execute();
            $option = array();
            $option = $stmt->fetchAll();
            $Yqtext = "";
            $Nqtext = "";

            foreach ($option as $ind) {

                if ($ind->correct == 1) {

                    $examStudentMark += $MarkOfEachQuestion;
                    $Yqtext = $ind->text;
                    file_put_contents($path, '   Answer:' . $Yqtext . " (The Student Answer:Correct)" . "\r\n", FILE_APPEND);
                } else {

                    $Nqtext = $ind->text;
                    $Select = "SELECT the_correct_answer from question where (id = ' $qid')";
                    $stmt = $this->db->prepare($Select);
                    $stmt->execute();
                    $option2 = array();
                    $option2 = $stmt->fetchAll();
                    foreach ($option2 as $opt) {
                        $Yqtext = $option2[0]->the_correct_answer;
                        file_put_contents($path, '   Student Answer:' . $Nqtext  . "\r\n", FILE_APPEND);
                        file_put_contents($path, '   The Correct Answer:' . $Yqtext . "\r\n", FILE_APPEND);
                        break;
                    }
                }

                break;
            }
        }

        $j++;
        if ($NumOfQuestion > count($questions_ids_session)) {
            $NoAnswer = array();
            $Select = "SELECT Question_id  from  question_test where Test_id = '$Tid' ";
            $stmt = $this->db->prepare($Select);
            $stmt->execute();
            $questions = $stmt->fetchAll();
            foreach ($questions as $ind1) {
                if (in_array($ind1->Question_id, $questions_ids_session) == false) {
                    array_push($NoAnswer, $ind1->Question_id);
                }
            }
            foreach ($NoAnswer as $ind) {
                $Select = "SELECT * from question where (id= '$ind')";
                $stmt = $this->db->prepare($Select);
                $stmt->execute();
                $question = array();
                $question = $stmt->fetchAll();
                foreach ($question as $Ques) {
                    $Question_Text = $Ques->question_text;
                    file_put_contents($path, 'Question' . $j . ':' . $Question_Text . "\r\n", FILE_APPEND);
                    file_put_contents($path, '  Student Answer: ' . "The student did not answer" . "\r\n", FILE_APPEND);
                    file_put_contents($path, '  The Correct Answer: ' . $Ques->the_correct_answer  . "\r\n", FILE_APPEND);
                    break;
                }
                $j++;
            }
        }
        file_put_contents($path, 'The final mark: ' . ($examStudentMark / $examFullMark) * 100 ."%". "\r\n", FILE_APPEND);

        file_put_contents($path, '---------------------------------///////////-----------------------------' . "\r\n", FILE_APPEND);
        fclose($handler);
        if($examStudentMark==0)
        return 0;
        return ($examStudentMark / $examFullMark) * 100;
    }
    function ShowStudentExams($Std)
    {
        $path = "studentExams.txt";

        $questionsWithAnswers = array();
        $question = array();
        $exam = array();
        $examssOfOneStudent = array();

        $handler = fopen($path, 'r');
        while (!feof($handler)) {
            $line = fgets($handler);
            $sub = substr($line, 11, 15);
            if (strpos($line, "ID")) {
                if (trim($sub) == $Std) {
                    //take all informations about student who has the specific id
                    $in_line = $line;
                    while (!strpos($in_line, "////")) {
                        $in_line = fgets($handler);
                        if (!strpos($in_line, "////")) {
                            // echo $in_line;
                            if (strpos($in_line, "aterial")) {
                                $MatrialName = trim(substr($in_line, 14, 25));
                            } else if (strpos($in_line, "ate:")) {
                                $Date = trim(substr($in_line, 5, 25));
                            } else if (strpos($in_line, "final")) {
                                $Mark = trim(substr($in_line, 15, 25));
                            }
                        }
                    }

                    array_push($exam, $MatrialName);
                    array_push($exam, $Date);
                    array_push($exam, $Mark);

                    array_push($examssOfOneStudent, $exam);
                    $empty_array = array();
                    $exam = $empty_array;
                }
            }
        }

        return ($examssOfOneStudent);
    }
}

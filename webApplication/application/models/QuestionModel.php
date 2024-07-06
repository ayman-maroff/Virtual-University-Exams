<?php
require_once 'BaseModel.php';
class QuestionModel extends BaseModel
{
    public function __construct($db)
    {
        parent::__construct($db, "question");
    }
    function questionsList($topic_name)
    {

        $Select = "SELECT  id FROM  topic where tp_name= :topic_name";
        $stmt = $this->db->prepare($Select);
        $stmt->execute([":topic_name" => $topic_name]);
        $rnum = $stmt->fetchColumn();

        $Select = "SELECT id FROM question where Topic_id= :rnum ";

        $query = $this->db->prepare($Select);
        $query->execute([":rnum" => $rnum]);
        return $query->fetchAll();
    }
    function displayQuestion($question_id)
    {

        $Select = "SELECT question_text,num_of_answers,question_mark,option.correct, option.text FROM question INNER JOIN option on question.id = option.Question_id where question.id= :question_id";
        $query = $this->db->prepare($Select);
        $query->execute([":question_id" => $question_id]);
        return $query->fetchAll();
    }
    function addquestion($topicname, $quetinText, $mark, $optionNum, $correct, $option1, $option2, $option3, $option4, $option5)
    {
        $Select = "SELECT id FROM question WHERE Question_text = :quetinText";
        $stmt = $this->db->prepare($Select);
        $stmt->execute([":quetinText" => $quetinText]);
        $rnum = $stmt->fetchColumn();

        $Select = "SELECT  id FROM  topic where tp_name= :topicname";
        $stmt = $this->db->prepare($Select);
        $stmt->execute([":topicname" => $topicname]);
        $rnum2 = $stmt->fetchColumn();

        if ($correct == "1")
            $yesAnswer = $option1;
        if ($correct == "2")
            $yesAnswer = $option2;
        if ($correct == "3")
            $yesAnswer = $option3;
        if ($correct == "4")
            $yesAnswer = $option4;
        if ($correct == "5")
            $yesAnswer = $option5;
        if ($rnum == "") {

            $Insert = "INSERT INTO question (question_text,num_of_answers,the_correct_answer,question_mark,Topic_id) 
                                values( :quetinText, :optionNum, :yesAnswer, :mark, :rnum2)";
            $stmt = $this->db->prepare($Insert);

            $stmt->execute(array(
                ':quetinText' => $quetinText, ':optionNum' => $optionNum, ':yesAnswer' => $yesAnswer, ':mark' => $mark,
                ':rnum2' => $rnum2
            ));

            $Select = "SELECT  id FROM  question where question_text= :quetinText";
            $stmt = $this->db->prepare($Select);
            $stmt->execute([":quetinText" => $quetinText]);
            $rnum3 = $stmt->fetchColumn();
            $temp = 0;
            if ($correct == "1")
                $temp = 1;
            $Insert = "INSERT INTO option (correct,text,testing_answers_paper_id,Question_id) 
        values( '$temp', '$option1', '1', '$rnum3')";
            $stmt = $this->db->prepare($Insert);
            $stmt->execute();
            $temp = 0;
            if ($correct == "2")
                $temp = 1;
            $Insert = "INSERT INTO option (correct,text,testing_answers_paper_id,Question_id) 
        values( '$temp', '$option2', '1', '$rnum3')";
            $stmt = $this->db->prepare($Insert);
            $stmt->execute();
            $temp = 0;
            if ($option3 != "") {
                if ($correct == "3")
                    $temp = 1;
                $Insert = "INSERT INTO option (correct,text,testing_answers_paper_id,Question_id) 
            values( '$temp', '$option3', '1', '$rnum3')";
                $stmt = $this->db->prepare($Insert);
                $stmt->execute();
                $temp = 0;
            }
            if ($option4 != "") {
                if ($correct == "4")
                    $temp = 1;
                $Insert = "INSERT INTO option (correct,text,testing_answers_paper_id,Question_id) 
            values( '$temp', '$option4', '1', '$rnum3')";
                $stmt = $this->db->prepare($Insert);
                $stmt->execute();
                $temp = 0;
            }
            if ($option5 != "") {
                if ($correct == "5")
                    $temp = 1;
                $Insert = "INSERT INTO option (correct,text,testing_answers_paper_id,Question_id) 
            values( '$temp', '$option5', '1', '$rnum3')";
                $stmt = $this->db->prepare($Insert);
                $stmt->execute();
                $temp = 0;
            }
            return "1";
        } else  return "0";
    }
    public function deleteQuestion($question_id)
    {


        $sql = "DELETE FROM option WHERE Question_id = '$question_id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $this->deleteById($question_id);
        return "1";
    }
    public function preparetoupdate($question_id)
    {
        $Select = "SELECT question_text,num_of_answers,question_mark,option.id,option.correct, option.text FROM question INNER JOIN option on question.id = option.Question_id where question.id= :question_id";
        $query = $this->db->prepare($Select);
        $query->execute([":question_id" => $question_id]);
        return $query->fetchAll();
    }

    public function Questionupdate($question_id, $questionText, $mark, $optionNum, $correct, $option1, $option2, $option3, $option4, $option5)
    {
        $Select = "SELECT id  FROM option  where (option.Question_id= :question_id)";
        $query = $this->db->prepare($Select);
        $query->execute([":question_id" => $question_id]);
        $idarray =  $query->fetchAll();
        $id1 = 0;
        $id2 = 0;
        $id3 = 0;
        $id4 = 0;
        $id5 = 0;
        $idm = array();
        foreach ($idarray as $id) {
            $id1 = $id->id;
            array_push($idm,  $id->id);
        }

        $update = "UPDATE question SET question_text='$questionText' ,num_of_answers='$optionNum',question_mark='$mark'  WHERE (question.id ='$question_id' )";
        $stmt = $this->db->prepare($update);
        $stmt->execute();
        $temp = 0;
        if (count($idm) == 2) {
            if ($correct == "1")
                $temp = 1;

            $update = "UPDATE option SET correct='$temp' ,text='$option1'  WHERE (option.id ='$idm[0]' )";
            $stmt = $this->db->prepare($update);
            $stmt->execute();
            $temp = 0;
            if ($correct == "2")
                $temp = 1;
            $update = "UPDATE option SET correct='$temp' ,text='$option2'  WHERE (option.id ='$idm[1]' )";
            $stmt = $this->db->prepare($update);
            $stmt->execute();
            $temp = 0;
            if ($option3 != "") {
                if ($correct == "3")
                    $temp = 1;
                $Insert = "INSERT INTO option (correct,text,testing_answers_paper_id,Question_id) 
                    values( '$temp', '$option3', '1', '$question_id')";
                $stmt = $this->db->prepare($Insert);
                $stmt->execute();
                $temp = 0;
            }
            if ($option4 != "") {
                if ($correct == "4")
                    $temp = 1;
                $Insert = "INSERT INTO option (correct,text,testing_answers_paper_id,Question_id) 
                    values( '$temp', '$option4', '1', '$question_id')";
                $stmt = $this->db->prepare($Insert);
                $stmt->execute();
                $temp = 0;
            }
            if ($option5 != "") {
                if ($correct == "5")
                    $temp = 1;
                $Insert = "INSERT INTO option (correct,text,testing_answers_paper_id,Question_id) 
                    values( '$temp', '$option5', '1', '$question_id')";
                $stmt = $this->db->prepare($Insert);
                $stmt->execute();
                $temp = 0;
            }
        }
        if (count($idm) == 3) {
            if ($correct == "1")
                $temp = 1;
            $update = "UPDATE option SET  correct='$temp' ,text='$option1'  WHERE (option.id ='$idm[0]' )";
            $stmt = $this->db->prepare($update);
            $stmt->execute();
            $temp = 0;
            if ($correct == "2")
                $temp = 1;
            $update = "UPDATE option SET correct='$temp' ,text='$option2'  WHERE (option.id ='$idm[1]' )";
            $stmt = $this->db->prepare($update);
            $stmt->execute();
            $temp = 0;
            if ($correct == "3")
                $temp = 1;
            $update = "UPDATE option SET correct='$temp' ,text='$option3'  WHERE (option.id ='$idm[2]' )";
            $stmt = $this->db->prepare($update);
            $stmt->execute();
            $temp = 0;
            if ($option4 != "") {
                if ($correct == "4")
                    $temp = 1;
                $Insert = "INSERT INTO option (correct,text,testing_answers_paper_id,Question_id) 
                    values( '$temp', '$option4', '1', '$question_id')";
                $stmt = $this->db->prepare($Insert);
                $stmt->execute();
                $temp = 0;
            }
            if ($option5 != "") {
                if ($correct == "5")
                    $temp = 1;
                $Insert = "INSERT INTO option (correct,text,testing_answers_paper_id,Question_id) 
                    values( '$temp', '$option5', '1', '$question_id')";
                $stmt = $this->db->prepare($Insert);
                $stmt->execute();
                $temp = 0;
            }
        }

        if (count($idm) == 4) {
            if ($correct == "1")
                $temp = 1;

            $update = "UPDATE option SET correct='$temp' ,text='$option1'  WHERE (option.id ='$idm[0]' )";
            $stmt = $this->db->prepare($update);
            $stmt->execute();
            $temp = 0;
            if ($correct == "2")
                $temp = 1;
            $update = "UPDATE option SET correct='$temp' ,text='$option2'  WHERE (option.id ='$idm[1]' )";
            $stmt = $this->db->prepare($update);
            $stmt->execute();
            $temp = 0;
            if ($correct == "3")
                $temp = 1;
            $update = "UPDATE option SET  correct='$temp' ,text='$option3'  WHERE (option.id ='$idm[2]' )";
            $stmt = $this->db->prepare($update);
            $stmt->execute();
            $temp = 0;
            if ($correct == "4")
                $temp = 1;
            $update = "UPDATE option SET  correct='$temp' ,text='$option4'  WHERE (option.id ='$idm[3]' )";
            $stmt = $this->db->prepare($update);
            $stmt->execute();
            $temp = 0;
            if ($option5 != "") {
                if ($correct == "5")
                    $temp = 1;
                $Insert = "INSERT INTO option (correct,text,testing_answers_paper_id,Question_id) 
                    values( '$temp', '$option5', '1', '$question_id')";
                $stmt = $this->db->prepare($Insert);
                $stmt->execute();
                $temp = 0;
            }
        }
        if (count($idm) == 5) {
            if ($correct == "1")
                $temp = 1;
            $update = "UPDATE option SET  correct='$temp' ,text='$option1'  WHERE (option.id ='$idm[0]' )";
            $stmt = $this->db->prepare($update);
            $stmt->execute();
            $temp = 0;
            if ($correct == "2")
                $temp = 1;
            $update = "UPDATE option SET  correct='$temp' ,text='$option2'  WHERE (option.id ='$idm[1]' )";
            $stmt = $this->db->prepare($update);
            $stmt->execute();
            $temp = 0;
            if ($correct == "3")
                $temp = 1;
            $update = "UPDATE option SET correct='$temp' ,text='$option3'  WHERE (option.id ='$idm[2]' )";
            $stmt = $this->db->prepare($update);
            $stmt->execute();
            $temp = 0;
            if ($correct == "4")
                $temp = 1;
            $update = "UPDATE option SET  correct='$temp' ,text='$option4'  WHERE (option.id ='$idm[3]' )";
            $stmt = $this->db->prepare($update);
            $stmt->execute();
            $temp = 0;
            if ($correct == "5")
                $temp = 1;
            $update = "UPDATE option SET  correct='$temp' ,text='$option5'  WHERE (option.id ='$idm[4]' )";
            $stmt = $this->db->prepare($update);
            $stmt->execute();
        }
        return "1";
    }
}

<?php
require_once 'BaseModel.php';
class MaterialModel extends BaseModel
{
    public function __construct($db)
    {
        parent::__construct($db, "material");
    }
    function coursesList()
    {

        $Select = "SELECT mt_name ,material.id as cid, topic.id as tid , topic.tp_name FROM material INNER JOIN topic on material.id=topic.Material_id";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();

        $Select = "SELECT mt_name ,id as cid  FROM material where( id not in (SELECT Material_id from topic))";
        $query2 = $this->db->prepare($Select);
        $query2->execute();
        $array2 = $query2->fetchAll();

        $array3 = array($array, $array2);

        return $array3;
        // require_once 'application/views/admin-views/course_profile.php';
    }
    function coursesListST()
    {

        $Select = "SELECT mt_name ,material.id as cid FROM material where (material.id in (SELECT Material_id from topic));";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();
        return $array;
    }
    function updatecoursesList($temp, $new)
    {

        $Select = "SELECT mt_name ,material.id as cid, topic.id as tid , topic.tp_name FROM material INNER JOIN topic on material.id=topic.Material_id";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();

        $Select = "SELECT mt_name ,id as cid  FROM material where( id not in (SELECT Material_id from topic))";
        $query2 = $this->db->prepare($Select);
        $query2->execute();
        $array2 = $query2->fetchAll();
        $array3 = array($array, $array2, $new, $temp);

        return $array3;
    }

    public function add($coursename, $topicname)
    {
        $Select = "SELECT mt_name FROM material WHERE mt_name = :coursename";
        $stmt = $this->db->prepare($Select);
        $stmt->execute([":coursename" => $coursename]);
        $rnum = $stmt->fetchColumn();
        $temp = 1;
        if ($rnum == "") {
            $Insert = "INSERT INTO material (mt_name,university_id) 
                                values( :coursename, :temp)";
            $stmt = $this->db->prepare($Insert);

            $stmt->execute(array(':coursename' => $coursename, ':temp' => $temp));
            if ($topicname != "") {
                $Select = "SELECT id FROM material WHERE  mt_name = :coursename ";
                $stmt = $this->db->prepare($Select);
                $stmt->execute(array(':coursename' => $coursename));
                $array  = $stmt->fetchAll();
                $m_id = $array[0]->id;
                $Insert = "INSERT INTO topic (tp_name,Material_id) 
                values( :topicname, :m_id)";
                $stmt = $this->db->prepare($Insert);
                $stmt->execute(array(':topicname' => $topicname, ':m_id' => $m_id));
            }
        } else {

            if ($topicname != "") {
                $Select = "SELECT tp_name FROM topic WHERE tp_name = :topicname";
                $stmt = $this->db->prepare($Select);
                $stmt->execute([":topicname" => $topicname]);
                $rnum = $stmt->fetchColumn();
                if ($rnum == "") {
                    $Select = "SELECT id FROM material WHERE  mt_name = :coursename ";
                    $stmt = $this->db->prepare($Select);
                    $stmt->execute(array(':coursename' => $coursename));
                    $array  = $stmt->fetchAll();
                    $m_id = $array[0]->id;
                    $Insert = "INSERT INTO topic (tp_name,Material_id) 
                values( :topicname, :m_id)";
                    $stmt = $this->db->prepare($Insert);
                    $stmt->execute(array(':topicname' => $topicname, ':m_id' => $m_id));
                } else {
                    // echo "the topic already exists";
                }
            }
        }
    }
    public function preparetoupdate($course_id, $topic_id = null)
    {
        if ($topic_id != null) {

            $Select = "SELECT material.id  , mt_name, topic.id  ,topic.tp_name FROM material INNER JOIN topic on material.id=topic.Material_id WHERE ( topic.id = :topic_id )";
            $stmt = $this->db->prepare($Select);
            $stmt->execute(array(':topic_id' => $topic_id,));
            $new = $stmt->fetchAll();
            $temp = 1;
            return $this->updatecoursesList($temp, $new);
        } else {
            $Select = "SELECT mt_name  FROM material  WHERE ( id = :course_id )";
            $stmt = $this->db->prepare($Select);
            $stmt->execute(array(':course_id' => $course_id));
            $new = $stmt->fetchAll();
            $temp = 0;
            return $this->updatecoursesList($temp, $new);
        }
    }

    public function courseupdate($course_id, $topic_id = null, $coursename, $topicname)
    {

        $Select = "SELECT mt_name FROM material WHERE (mt_name = :coursename)";
        $stmt = $this->db->prepare($Select);
        $stmt->execute(array(":coursename" => $coursename));
        $rnum = $stmt->fetchColumn();
        if ($rnum != "") {

            if ($topicname != "" && $topic_id == null) {
                $Insert = "INSERT INTO topic (tp_name,Material_id) 
                                values( :topicname, :course_id)";
                $stmt = $this->db->prepare($Insert);
                $stmt->execute(array(':topicname' => $topicname, ':course_id' => $course_id));
            }
            if ($topicname != "" && $topic_id != null) {
                $update = "UPDATE topic SET tp_name= '$topicname'  WHERE (id='$topic_id' )";

                $stmt = $this->db->prepare($update);
                $stmt->execute();
            }
            return "1";
        } else {
            $update = "UPDATE material SET mt_name='$coursename'  WHERE (material.id ='$course_id' )";
            $stmt = $this->db->prepare($update);
            $stmt->execute();


            if ($topicname != "" && $topic_id == null) {
                $Insert = "INSERT INTO topic (tp_name,Material_id) 
                              values( :topicname, :course_id)";
                $stmt = $this->db->prepare($Insert);
                $stmt->execute(array(':topicname' => $topicname, ':course_id' => $course_id));
            }
            if ($topicname != "" && $topic_id != null) {
                $update = "UPDATE topic SET tp_name='$topicname'  WHERE (id='$topic_id' )";
                $stmt = $this->db->prepare($update);
                $stmt->execute();
            }
            return "1";
        }
    }
    public function deletecourse($course_id = null, $topic_id = null)
    {
        if ($topic_id == null) {
            $this->deleteById($course_id);
            return "1";
        } else {
            $Select = "SELECT id  FROM question  WHERE ( Topic_id = '$topic_id' )";
            $stmt = $this->db->prepare($Select);
            $stmt->execute();
            $temp = $stmt->fetchAll();
            foreach ($temp as $id) {
                $sql = "DELETE FROM option WHERE Question_id = '$id->id'";
                $query = $this->db->prepare($sql);
                $query->execute();
            }
            $sql = "DELETE FROM question WHERE Topic_id = '$topic_id'";
            $query = $this->db->prepare($sql);
            $query->execute();
            $sql = "DELETE FROM topic WHERE topic.id = '$topic_id'";
            $query = $this->db->prepare($sql);
            $query->execute();
            return "1";
        }
    }
}

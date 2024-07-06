<?php
require_once 'BaseModel.php';
class Test_centerModel extends BaseModel
{
    public function __construct($db)
    {
        parent::__construct($db, "test_center");
    }
    function Centerslist()
    {
        $Select = "SELECT id ,address, capacity FROM test_center";
        $query = $this->db->prepare($Select);
        $query->execute();
        return $query->fetchAll();
    }
    
    function updateCenterList($array)
    {

         $Select = "SELECT id ,address, capacity FROM test_center";
        $query = $this->db->prepare($Select);
        $query->execute();
        $centers= $query->fetchAll();
      
        $array3 = array($centers , $array);

        return $array3;
        // require_once  'application/views/admin-views/updatecenter.php';

    }
    public function add($centeraddress,$capacity)
    {
        $Select = "SELECT address FROM test_center WHERE address = :centeraddress";
        $stmt = $this->db->prepare($Select);
        $stmt->execute([":centeraddress" => $centeraddress]);
        $rnum = $stmt->fetchColumn();
        if ($rnum == "") {
           
            $Insert = "INSERT INTO test_center (address,university_id,capacity) 
                                values( '$centeraddress', '1', '$capacity')";
            $stmt = $this->db->prepare($Insert);

            $stmt->execute();
       
        } 
    }
    public function preparetoupdate($id)
    {
        $Select = "SELECT id ,address, capacity FROM test_center where id = '$id'";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array= $query->fetchAll();
        return $this->updateCenterList($array);
 
    }

    public function centerupdate($id,$centeraddress,$capacity)
    {
       $update = "UPDATE test_center SET address= '$centeraddress' ,capacity ='$capacity'  WHERE (id='$id' )";

        $stmt = $this->db->prepare($update);
       $stmt->execute();
    }
    public function deleteCenter($id)
{      
       $this->deleteById($id);
}
}
    

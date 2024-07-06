<?php
require_once 'BaseModel.php';
class UsersModel extends BaseModel
{
    public function __construct($db)
    {
        parent::__construct($db, "user");
    }

    /**
     * Get all songs from database
     */

    public function add($firstname, $lastname, $midlename, $phonenumber, $gender, $email, $hashedpass, $ROLE)
    {
        $Select = "SELECT email FROM user WHERE email = :email";
        $stmt = $this->db->prepare($Select);
        $stmt->execute([":email" => $email]);
        $rnum = $stmt->fetchColumn();
        if ($rnum == "") {
            if ($ROLE == "Admin") {
                $ROl_ID = 1;
            } elseif ($ROLE == "Testcenteradmin") {
                $ROl_ID = 2;
            } elseif ($ROLE == "Student") {
                $ROl_ID = 3;
            }
            $hashed_ = md5($hashedpass);
            $Insert = "INSERT INTO user (firstname,lastname,midlename,phonenumber,gender,email,hashedPasswd,Role_id) 
                                values( :firstname, :lastname, :midlename, :phonenumber, :gender, :email, :hashed_, :ROl_ID)";
            $stmt = $this->db->prepare($Insert);

            if ($stmt->execute(array(
                ':firstname' => $firstname, ':lastname' => $lastname, ':midlename' => $midlename, ':phonenumber' => $phonenumber,
                ':gender' => $gender, ':email' => $email, ':hashed_' => $hashed_, ':ROl_ID' => $ROl_ID
            ))) {
                // echo "New record inserted sucessfully.";4
                return "1";
            } else {
                // echo 'error';
                return "2";
            }
        } else {
            // echo "Someone already registers using this email.";
            return "3";
        }
    }


    public function confirm($name, $hashedpass)
    {
        $hashed = md5($hashedpass);
        $Role_id = 'Role_id';

        $Select = "SELECT firstname FROM user WHERE ( firstname = :name and hashedPasswd = :hashed )";
        $stmt = $this->db->prepare($Select);
        $stmt->execute(array(':name' => $name, ':hashed' => $hashed));
        $array = $stmt->fetchAll();
        $rnum = count($array);
        if ($rnum == 0) {
            // echo "<h1>Login Failed!</h1> ";
            return 0;
        } else {
            $Role_id = 'Role_id';
            $Select = "SELECT user.id as uid,Role_id,firstname,lastname FROM user WHERE ( firstname = :name and hashedPasswd = :hashed )";
            $stmt = $this->db->prepare($Select);
            $stmt->execute(array(':name' => $name, ':hashed' => $hashed));
            $array = $stmt->fetchAll();
            $rnum = count($array);

            return $array;
        }
    }
    function userslist()
    {
        $Select = "SELECT user.id as iid,firstname,midlename,lastname,email,phonenumber,gender,role.roleName FROM user INNER JOIN role on user.Role_id=role.id";
        $query = $this->db->prepare($Select);
        $query->execute();
        return $query->fetchAll();
    }
    function prfileUser($ID)
    {
        $Select = "SELECT * FROM user where( id = '$ID' )";
        $query = $this->db->prepare($Select);
        $query->execute();
        return $query->fetchAll();
    }

    public function deleteUser($user_id)
    {

        $this->deleteById($user_id);
    }
    public function preparetoupdate($user_id)
    {
        $Select = "SELECT user.id as iid,firstname,midlename,lastname,email,phonenumber,gender,role.roleName  FROM user INNER JOIN role on user.Role_id=role.id WHERE ( user.id = '$user_id' )";
        $stmt = $this->db->prepare($Select);
        $stmt->execute();
        $array = $stmt->fetchAll();
        $rnum = count($array);

        return $array;
    }

    public function userupdate($user_id, $firstname, $lastname, $midlename, $phonenumber, $gender, $email, $ROLE)
    {

        $Select = "SELECT email FROM user WHERE (email = :email and not id=:iid)";
        $stmt = $this->db->prepare($Select);
        $stmt->execute(array(":email" => $email, ":iid" => $user_id));
        $rnum = $stmt->fetchColumn();
        if ($rnum == "") {
            if ($ROLE == "Admin") {
                $ROl_ID = 1;
            } elseif ($ROLE == "Testcenteradmin") {
                $ROl_ID = 2;
            } elseif ($ROLE == "Student") {
                $ROl_ID = 3;
            }
            $update = "UPDATE user SET firstname=:fstname ,lastname=:lstname,email=:eml ,midlename =:midlname ,phonenumber=:phnnumber ,gender=:gndr ,Role_id=:roleid  WHERE (id=:usr_id )";
            $stmt = $this->db->prepare($update);

            if ($stmt->execute(
                array(
                    ':fstname' => $firstname, ':lstname' => $lastname, ':midlname' => $midlename, ':phnnumber' => $phonenumber,
                    ':gndr' => $gender, ':eml' => $email,  ':usr_id' => $user_id, ':roleid' => $ROl_ID
                )
            )) {
                // echo "User Updated sucessfully.";
                return "1";
            } else {
                // echo 'error';
                return "2";
            }
        } else {
            // echo "Someone already using this email.";
            return "3";
        }
    }
}

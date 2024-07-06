 <?php
 require_once 'BaseModel.php';
 class RolePermessionModel extends BaseModel
 {
     public function __construct($db)
     {
         parent::__construct($db, "role_permission");
     }
     
     public function getUserPermissions($RoleID){
         
        $Select = "SELECT DISTINCT perm as perm_name FROM permission INNER JOIN role_permission on permission.id=role_permission.Permission_id where role_permission.Role_id='$RoleID'";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();
        return $array;
     }
 }
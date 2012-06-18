<?php
require_once(HACKADEMIC_PATH."model/common/class.HackademicDB.php");

class User {
    public $id;
    public $username;
    public $password;
    public $full_name;
    public $is_admin;
    public $email;
    public $joined;
    public $last_visit;
    public $is_activated;
    public $token;
    
    public static function findByUserName($username) {
        global $db;
		$sql = "SELECT * FROM users WHERE username='{$username}' LIMIT 1";
		$result_array=self::findBySQL($sql);
        return !empty($result_array)?array_shift($result_array):false;
    }
    
     public static function getUser($id) {
     
	global $db;
               $sql = "SELECT * FROM users WHERE id='{$id}' LIMIT 1";
               $result_array=self::findBySQL($sql);
               // return !empty($result_array)?array_shift($result_array):false;
               return $result_array;
     }   
    
    private static function findBySQL($sql) {
        global $db;
        $result_set=$db->query($sql);
        $object_array=array();
        while($row=$db->fetchArray($result_set)) {
            $object_array[]=self::instantiate($row);
        }
        return $object_array;
    }
    
    public static function addUser($username,$full_name,$email,$password,$joined,$is_activated,$is_admin){
	
        global $db;
        $password = md5($password);
	$sql="INSERT INTO users (username,full_name,email,password,joined,is_activated,is_admin)";
	$sql .= "VALUES ('$username','$full_name','$email','$password','$joined','$is_activated','$is_admin')";
        $query = $db->query($sql);
        if ($db->affectedRows()) {
	    return true;
        } else {
	    return false;
	}
    }
    
    public static function updateLastVisit($username){
	global $db;
	$last_visit=date("Y-m-d H-i-s");
	$sql="UPDATE users SET last_visit='$last_visit'";
	$sql .="WHERE username='$username'";
	$query = $db->query($sql);
        if ($db->affectedRows()) {
	    return true;
        } else {
	    return false;
	}
    }
    
    public static function getNumberOfUsers() {
        global $db;
        $sql = "SELECT COUNT(*) as num FROM users";
        $query = $db->query($sql);
        $result = $db->fetchArray($query);
        return $result['num'];
    }
    
    public static function getNUsers ($start, $limit) {
        global $db;
        $sql= "SELECT * FROM users ORDER BY id LIMIT $start, $limit";
        $result_array=self::findBySQL($sql);
        return $result_array;
    }

    public function doesUserExist($username){
	global $db;
	$sql = "SELECT * FROM users WHERE username='$username'";
	$query = $db->query($sql);
	$result = $db->numRows($query);
	if ($result) {
	    return true;
	} else {
	    return false;
	}
    }
    
     public static function updateUser($id,$username,$full_name,$email,$password,$is_activated,$is_admin){
	  
	  global $db;
	  if($password==''){
	  $sql="UPDATE users SET username='$username',full_name='$full_name',email='$email',is_activated='$is_activated',is_admin='$is_admin'";
	  $sql .= " WHERE id=$id";
     }
     else{
	  $password=md5($password);
	  $sql="UPDATE users SET username='$username',full_name='$full_name',email='$email',password='$password',is_activated='$is_activated',is_admin='$is_admin'";
	  $sql .= " WHERE id=$id";
     }
          $query = $db->query($sql);
          if ($db->affectedRows()) {
	    return true;
          } else {
	    return false;
	}
       }
       
      public static function deleteUser($id){
	  
	  global $db;
	  $sql="DELETE FROM users WHERE id='$id'";
          $query = $db->query($sql);
          if ($db->affectedRows()) {
	    return true;
          } else {
	    return false;
	}
       }
       
    public static function instantiate($record) {
        $object=new self;
        foreach($record as $attribute=>$value) {
            if($object->hasAttribute($attribute)) {
                $object->$attribute=$value;
            }
        }
        return $object;
    }
    
    private function hasAttribute($attribute) {
        $object_vars=get_object_vars($this);
        return array_key_exists($attribute,$object_vars);
    }
}
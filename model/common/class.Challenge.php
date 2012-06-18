<?php
require_once(HACKADEMIC_PATH."model/common/class.HackademicDB.php");
class Challenge {
      public $id;
      public $title;
      public $date_posted;
    
     
       
     public function doesChallengeExist($name){
	global $db;
	$sql = "SELECT * FROM challenges WHERE title='$name'";
	$query = $db->query($sql);
	$result = $db->numRows($query);
	if ($result) {
	    return true;
	} else {
	    return false;
	}
    } 
       
     public static function getChallenge($id) {
        
	global $db;
        $sql = "SELECT * FROM challenges WHERE id='{$id}' LIMIT 1";
        $result_array=self::findBySQL($sql);
       // return !empty($result_array)?array_shift($result_array):false;
        return $result_array;
       }
       
    public static function insertId() {
        global $db;
        return $db->insertId();
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
       
     public static function getNchallenges($start, $limit) {
	  
          global $db;
          $sql= "SELECT * FROM challenges LIMIT $start, $limit";
          $result_array=self::findBySQL($sql);
          return $result_array;
	}
     public static function getNumberOfChallenges() {
	  
          global $db;
          $sql = "SELECT COUNT(*) as num FROM challenges";
          $query = $db->query($sql);
          $result = $db->fetchArray($query);
          return $result['num'];
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
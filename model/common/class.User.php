<?php
require_once(HACKADEMIC_PATH."model/common/class.HackademicDB.php");

class User {
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
	public $is_admin;
    
    public static function findByUserName($username) {
        global $db;
		$sql = "SELECT * FROM users WHERE username='{$username}' LIMIT 1";
		$result_array=self::findBySQL($sql);
        return !empty($result_array)?array_shift($result_array):false;
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
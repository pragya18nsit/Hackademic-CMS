<?php
require_once(HACKADEMIC_PATH."model/common/class.HackademicDB.php");
class Article {
      public $id;
      public $title;
      public $content;
      public $date_posted;
      public $created_by;
      public $last_modified;
      public $last_modified_by;
      public $ordering;
      public $is_published;
       
     public static function getArticle($id) {
        
	global $db;
        $sql = "SELECT * FROM articles WHERE id='{$id}' LIMIT 1";
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
     public static function getNarticles ($start, $limit) {
	  
          global $db;
          $sql= "SELECT * FROM articles LIMIT $start, $limit";
          $result_array=self::findBySQL($sql);
          return $result_array;
	}
     public static function getNumberOfArticles() {
	  
          global $db;
          $sql = "SELECT COUNT(*) as num FROM articles";
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
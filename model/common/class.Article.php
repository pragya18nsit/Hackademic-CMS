<?php
require_once(HACKADEMIC_PATH."model/common/class.HackademicDB.php");
class Article{
     public $id;
      public $username;
      public $title;
      public $content;
      public $date_posted;
    
     public static function addarticle($username,$title,$content,$date_posted){
	
        global $db;
	$sql="INSERT INTO addarticle(username,title,content,date_posted)";
	$sql .= "VALUES ('$username','$title','$content','$date_posted')";
        $query = $db->query($sql);
        if ($db->affectedRows()) {
	    return true;
        } else {
	    return false;
	}
       }     
}
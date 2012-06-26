<?php
require_once(HACKADEMIC_PATH."model/common/class.HackademicDB.php");
require_once(HACKADEMIC_PATH."/model/common/class.Article.php");
class ArticleBackend extends Article {
    
     public static function addArticle($title,$content,$date_posted,$created_by,$is_published){
	
        global $db;
	$sql="INSERT INTO articles(title,content,date_posted,created_by,is_published)";
	$sql .= "VALUES ('$title','$content','$date_posted','$created_by','$is_published')";
        $query = $db->query($sql);
        if ($db->affectedRows()) {
	    return true;
        } else {
	    return false;
	}
       }
     public static function updateArticle($id,$title,$content,$date_modified,$last_modified_by){
	  
	  global $db;
	  $sql="UPDATE articles SET title='$title',content='$content',last_modified='$date_modified',last_modified_by='$last_modified_by'";
	  $sql .= "WHERE id='$id'";
          $query = $db->query($sql);
          if ($db->affectedRows()) {
	    return true;
          } else {
	    return false;
	}
       }
     public static function deleteArticle($id){
	  
	  global $db;
	  $sql="DELETE FROM articles WHERE id='$id'";
          $query = $db->query($sql);
          if ($db->affectedRows()) {
	    return true;
          } else {
	    return false;
	}
       }
       
     public static function insertId() {
        global $db;
        return $db->insertId();
    }
}
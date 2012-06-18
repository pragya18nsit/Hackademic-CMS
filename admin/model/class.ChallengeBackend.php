<?php
require_once(HACKADEMIC_PATH."/model/common/class.Challenge.php");
class ChallengeBackend extends Challenge{
    
     public static function addchallenge($title,$date_posted){
	
        global $db;
	$sql="INSERT INTO challenges(title,date_posted)";
	$sql .= "VALUES ('$title','$date_posted')";
        $query = $db->query($sql);
        if ($db->affectedRows()) {
	    return true;
        } else {
	    return false;
	}
       }
     public static function deleteChallenge($id){
	  
	  global $db;
	  $sql="DELETE FROM challenges WHERE id='$id'";
          $query = $db->query($sql);
          if ($db->affectedRows()) {
	    return true;
          } else {
	    return false;
	}
       }
}
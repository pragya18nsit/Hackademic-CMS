<?php
/**
 *
 * Hackademic-CMS/model/common/class.ChallengeAttempts.php
 *
 * Hackademic Challenge Attempts Class
 * Class for Hackademic's Challenge Attempts Object
 * 
 * Copyright (c) 2012 OWASP
 *
 * LICENSE:
 *
 * This file is part of Hackademic CMS (https://www.owasp.org/index.php/OWASP_Hackademic_Challenges_Project).
 *
 * Hackademic CMS is free software: you can redistribute it and/or modify it under the terms of the GNU General Public
 * License as published by the Free Software Foundation, either version 2 of the License, or (at your option) any
 * later version.
 *
 * Hackademic CMS is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with Hackademic CMS.  If not, see
 * <http://www.gnu.org/licenses/>.
 *
 *
 * @author Pragya Gupta <pragya18nsit[at]gmail[dot]com>
 * @author Konstantinos Papapanagiotou <conpap[at]gmail[dot]com>
 * @license http://www.gnu.org/licenses/gpl.html
 * @copyright 2012 OWASP
 *
 */
require_once(HACKADEMIC_PATH."model/common/class.HackademicDB.php");
class ChallengeAttempts {
    public $id;
    public $user_id;
    public $challenge_id;
    public $time;
    public $status;
   
   
    public static function addChallengeAttempt($user_id,$challenge_id,$time,$status){
	global $db;
	$sql="INSERT INTO challenge_attempts(user_id,challenge_id,time,status)";
	$sql .= "VALUES ('$user_id','$challenge_id','$time','$status')";
        $query = $db->query($sql);
        if ($db->affectedRows()) {
	    return true;
        } else {
	    return false;
	}
    }
    
     public static function updateChallengeAttempt($id,$time,$status){
	global $db;
        $sql="UPDATE challenge_attempts SET time='$time',status='$status'";
        $sql .= " WHERE id=$id";
	$query = $db->query($sql);
	if ($db->affectedRows()) {
	  return true;
	} else {
	  return false;
	}
    }
    public static function deleteChallengeAttempt($id){
	global $db;
	$sql = "DELETE FROM challenge_attempts WHERE id='$id'";
        $query = $db->query($sql);
        if ($db->affectedRows()) {
	    return true;
        } else {
	    return false;
	}
    }
     public static function getChallengeAttemptDetails($user_id) {
	global $db;
        $sql = "SELECT challenge_id,status,id,pkg_name FROM challenges INNER JOIN challenge_attempts";
        $sql .=" WHERE challenge_attempts.challenge_id=challenges.id AND challenge_attempts.user_id='{$user_id}' ";
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
}
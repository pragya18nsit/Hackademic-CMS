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


	public static function addChallengeAttempt($user_id,$challenge_id,$status){
		global $db;
		$time = date("Y-m-d H:i:s");
		$params=array(':user_id' => $user_id,
				':challenge_id' => $challenge_id,
				':time' => $time,
				':status' => $status
			     );
		$sql="INSERT INTO challenge_attempts(user_id,challenge_id,time,status)";
		$sql .= "VALUES (:user_id,:challenge_id,:time,:status)";
		$query = $db->query($sql,$params);
		if ($db->affectedRows($query)) {
			return true;
		} else {
			return false;
		}
	}
	
	public static function deleteChallengeAttemptByUser($user_id){
		global $db;
		$params=array(':user_id' => $user_id);
		$sql = "DELETE FROM challenge_attempts WHERE user_id=:user_id";
		$query = $db->query($sql,$params);
		if ($db->affectedRows($query)) {
			return true;
		} else {
			return false;
		}
	}
	
	public static function deleteChallengeAttemptByChallenge($challenge_id){
		global $db;
		$params=array(':challenge_id' => $challenge_id);
		$sql = "DELETE FROM challenge_attempts WHERE challenge_id=:challenge_id";
		$query = $db->query($sql,$params);
		if ($db->affectedRows($query)) {
			return true;
		} else {
			return false;
		}
	}
	
	public static function getChallengeAttemptDetails($user_id) {
		global $db;
		$params=array(':user_id' => $user_id);
		$sql = "SELECT challenge_id,status,id,pkg_name FROM challenges INNER JOIN challenge_attempts";
		$sql .=" WHERE challenge_attempts.challenge_id=challenges.id AND challenge_attempts.user_id=:user_id ";
		$result_array=self::findBySQL($sql,$params);
		// return !empty($result_array)?array_shift($result_array):false;
		return $result_array;
	}
	
	public static function isTaskCleared($user_id, $challenge_id) {
		global $db;
		$params = array(
			':user_id' => $user_id,
			':challenge_id' => $challenge_id
		);
		$sql = "SELECT * FROM challenge_attempts WHERE user_id = :user_id AND ";
		$sql .= "challenge_id = :challenge_id AND status = 1;";
		$query = $db->query($sql, $params);
		if ($db->numRows($query)) {
			return true;
		} else {
			return false;
		}
	}

	private static function findBySQL($sql,$params=NULL) {
		global $db;
		$result_set=$db->query($sql,$params);
		$object_array=array();
		while($row=$db->fetchArray($result_set)) {
			$object_array[]=self::instantiate($row);
		}
		return $object_array;
	}
}

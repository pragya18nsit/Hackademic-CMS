<?php
/**
 *
 * Hackademic-CMS/admin/mode/class.ClassMemberships.php
 *
 * Hackademic Class Memberships Model
 * This class is for interacting with the class_memberships table in DB
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

class ClassChallenges {
	public $id;
	public $challenge_id;
	public $class_id;
	public $date_created;

	public static function addMembership($challenge_id,$class_id){
		global $db;
		$date = date("Y-m-d H:i:s");
		$params=array(':challenge_id' => $challenge_id,':class_id' => $class_id,':date_created' => $date);
		$sql="INSERT INTO class_challenges(challenge_id,class_id,date_created)";
		$sql .= " VALUES ( :challenge_id, :class_id, :date_created)";
		$query = $db->query($sql,$params);
		if ($db->affectedRows($query)) {
			return true;
		} else {
			return false;
		}
	}

	public static function getMembershipsOfChallenge($challenge_id) {
		global $db;
		$params=array(':challenge_id' => $challenge_id);
		$sql = "SELECT class_challenges.class_id, classes.name FROM class_challenges";
		$sql .= " LEFT JOIN classes ON class_challenges.class_id = classes.id WHERE";
		$sql .= " class_challenges.challenge_id = :challenge_id";
		$query = $db->query($sql,$params);
		$result_array = array();
		while ($row = $db->fetchArray($query)) {
			array_push($result_array, $row);
		}
		return $result_array;
	}
	
	public static function getChallengesOfClasses($classes) {
	    global $db;
	    $where_clause = "";
	    foreach ($classes as $class) {
		if ($where_clause != "") {
		    $where_clause .= " OR ";
		}
		$id = $class['class_id'];
		$where_clause .= "class_id = $id";
	    }
	    $sql = "SELECT challenge_id FROM class_challenges WHERE $where_clause";
	    $result_array = array();
	    $query = $db->query($sql);
	    while ($row = $db->fetchArray($query)) {
			array_push($result_array, $row);
		}
		return $result_array;
	}

	public static function doesMembershipExist($challenge_id,$class_id) {
		global $db;
		$params=array(':challenge_id' => $challenge_id,':class_id' => $class_id);
		$sql= "SELECT * FROM class_challenges";
		$sql .= " WHERE challenge_id = :challenge_id AND class_id = :class_id";
		$query = $db->query($sql,$params);
		if ($db->numRows($query)) {
			return true;
		} else {
			return false;
		}
	}

	public static function deleteMembership($challenge_id,$class_id){
		global $db;
		$params=array(':challenge_id' => $challenge_id,':class_id' => $class_id);
		$sql="DELETE FROM class_challenges WHERE challenge_id = :challenge_id AND class_id = :class_id";
		$query = $db->query($sql,$params);
		if ($db->affectedRows($query)) {
			return true;
		} else {
			return false;
		}
	}

	public static function deleteAllMemberships($challenge_id){
		global $db;
		$params=array(':challenge_id' => $challenge_id);
		$sql="DELETE FROM class_challenges WHERE challenge_id = :challenge_id";
		$query = $db->query($sql,$params);
		if ($db->affectedRows($query)) {
			return true;
		} else {
			return false;
		}
	}

	public static function deleteAllMembershipsOfClass($class_id){
		global $db;
		$params=array(':class_id' => $class_id);
		$sql="DELETE FROM class_challenges WHERE class_id = :class_id";
		$query = $db->query($sql,$params);
		if ($db->affectedRows($query)) {
			return true;
		} else {
			return false;
		}
	}

	public static function getAllMemberships($class_id) {
		global $db;
		$param=array(':class_id' => $class_id);
		$sql = "SELECT DISTINCT class_challenges.challenge_id, challenges.title FROM class_challenges ";
		$sql .= "LEFT JOIN challenges on class_challenges.challenge_id = challenges.id WHERE ";
		$sql .= "class_challenges.class_id = :class_id";
		$query = $db->query($sql,$param);
		$result_array = array();
		while ($row = $db->fetchArray($query)) {
			array_push($result_array, $row);
		}
		return $result_array;
	}

	public static function isAllowed($challenge_id, $classes) {
		global $db;
		$in_these_classes = '';
		$params=array(':challenge_id' => $challenge_id);
		foreach ($classes as $class) {
			if ($in_these_classes != '') {
				$in_these_classes .= " OR ";
			}
			$in_these_classes .= "class_id = ".$class['class_id'];
		}
		$sql = "SELECT * FROM class_challenges WHERE challenge_id = :challenge_id AND (".$in_these_classes.");";
		$query = $db->query($sql,$params);
		if ($db->numRows($query)) {
			return true;
		} else {
			return false;
		}
	}
}

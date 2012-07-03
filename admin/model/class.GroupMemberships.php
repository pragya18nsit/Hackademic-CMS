<?php
/**
 *
 * Hackademic-CMS/admin/mode/class.GroupMemberships.php
 *
 * Hackademic Group Memberships Model
 * This class is for interacting with the group_memberships table in DB
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

class GroupMemberships {
    public $id;
    public $user_id;
    public $group_id;
    public $date_created;
     
    public static function addMembership($user_id,$group_id){
        global $db;
        $sql="INSERT INTO group_memberships(user_id,group_id)";
	$sql .= "VALUES ('$user_id','$group_id')";
        $query = $db->query($sql);
        if ($db->affectedRows()) {
	    return true;
        } else {
	    return false;
	}
    }
    
    public static function getMembershipsOfUser($user_id) {
        global $db;
        $sql = "SELECT group_memberships.group_id, groups.name FROM group_memberships";
	$sql .= " LEFT JOIN groups ON group_memberships.group_id = groups.id WHERE";
	$sql .= " group_memberships.user_id = $user_id";
        $query = $db->query($sql);
	$result_array = array();
	while ($row = $db->fetchArray($query)) {
	    array_push($result_array, $row);
	}
	return $result_array;
    }
    
    public static function doesMembershipExist($user_id, $group_id) {
        global $db;
        $sql= "SELECT * FROM group_memberships";
        $sql .= " WHERE user_id=$user_id AND group_id=$group_id";
        $query = $db->query($sql);
        if ($db->numRows($query)) {
	    return true;
        } else {
	    return false;
	}
    }
    
    public static function deleteMembership($user_id,$group_id){
        global $db;
	$sql="DELETE FROM group_memberships WHERE user_id=$user_id AND group_id=$group_id";
	$query = $db->query($sql);
	if ($db->affectedRows()) {
	    return true;
	} else {
	    return false;
	}
    }
}
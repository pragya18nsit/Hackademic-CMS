<?php
/**
 *
 * Hackademic-CMS/admin/model/class.Groups.php
 *
 * Hackademic Groups Model
 * This class is for interacting with the Groups table in the DB
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

class Groups {
     
    public $id;
    public $name;
    public $date_created;
    public $archive;
     
    public static function addGroup($groupname, $date_created) {
	global $db;
	$sql = "INSERT INTO groups(name,date_created)";
	$sql .= "VALUES ('$groupname','$date_created')";
	$query = $db->query($sql);
	if ($db->affectedRows()) {
	    return true;
	} else {
	    return false;
	}
    }
     
    public static function getNumberOfGroups($search=null,$category=null) {
	global $db;
        if ($search != null && $category != null) {
        $sql = "SELECT COUNT(*) as num FROM groups WHERE $category LIKE '%$search%'"; 
        } else {
	$sql = "SELECT COUNT(*) as num FROM groups";
        }
	$query = $db->query($sql);
	$result = $db->fetchArray($query);
	return $result['num'];
    }
     
    public static function getAllGroups() {
	global $db;
	$sql = "SELECT * FROM groups";
	$query = $db->query($sql);
	$result_array=self::findBySQL($sql);
        return $result_array;
    }
    
    public static function getNGroups ($start, $limit,$search=null,$category=null) {
        global $db;
        if ($search != null && $category != null) {
        $sql = "SELECT * FROM groups WHERE $category LIKE '%$search%' LIMIT $start, $limit"; 
        } else {
        $sql= "SELECT * FROM groups ORDER BY id LIMIT $start, $limit";
        }
        $result_array=self::findBySQL($sql);
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
    
    public static function deleteGroup($id){
	global $db;
	$sql="DELETE FROM groups WHERE id='$id'";
	$query = $db->query($sql);
	if ($db->affectedRows()) {
	    return true;
	} else {
	    return false;
	}
    }
    
    public static function archiveGroup($id){
	global $db;
        $sql="UPDATE groups SET archive=1 ";
	$sql .="WHERE id='$id'";
        $query = $db->query($sql);
	if ($db->affectedRows()) {
	    return true;
	} else {
	    return false;
	}
    }
}
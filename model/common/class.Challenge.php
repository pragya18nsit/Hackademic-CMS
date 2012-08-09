<?php
/**
 *
 * Hackademic-CMS/model/common/class.Challenge.php
 *
 * Hackademic Challenge Class
 * Class for Hackademic's Challenge Object
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

class Challenge {
    public $id;
    public $title;
    public $date_posted;
    public $pkg_name;
    public $description;
    public $author;
    public $category;
    public $visibility;
    public $publish;
    
    public function doesChallengeExist($name){
	global $db;
	$sql = "SELECT * FROM challenges WHERE pkg_name='$name'";
	$query = $db->query($sql);
	$result = $db->numRows($query);
	if ($result) {
	    return true;
	} else {
	    return false;
	}
    } 
       
    public static function getChallenge($id) {
	global $db;
        $sql = "SELECT * FROM challenges WHERE id='{$id}' LIMIT 1";
        $result_array=self::findBySQL($sql);
        // return !empty($result_array)?array_shift($result_array):false;
        return $result_array;
    }
    
     public static function getChallengesFrontend() {
	global $db;
        $sql = "SELECT * FROM challenges WHERE publish=1";
        $result_array=self::findBySQL($sql);
        // return !empty($result_array)?array_shift($result_array):false;
        return $result_array;
    }
       
    public static function insertId() {
        global $db;
        return $db->insertId();
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
       
    public static function getNchallenges($start, $limit,$search=null,$category=null) {
        global $db;
	if ($search != null && $category != null) {
        $sql = "SELECT * FROM challenges WHERE $category LIKE '%$search%' LIMIT $start, $limit"; 
        } else {
        $sql= "SELECT * FROM challenges LIMIT $start, $limit";
	}
        $result_array=self::findBySQL($sql);
        return $result_array;
    }
    
    public static function getNumberOfChallenges($search=null,$category=null) {
        global $db;
	if ($search != null && $category != null) {
        $sql = "SELECT COUNT(*) as num FROM challenges WHERE $category LIKE '%$search%'"; 
        } else {
        $sql = "SELECT COUNT(*) as num FROM challenges";
	}
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
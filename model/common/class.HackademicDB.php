<?php
/**
 *
 * Hackademic-CMS/model/common/class.HackademicDB.php
 *
 * Hackademic HackademicDB Class
 * Class for Hackademic's DB Object
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

class HackademicDB {
      
    private $connection;
	
    public function openConnection() {
	$this->connection=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	if(!$this->connection) {
	      die("database connection falied".mysql_error());
	} else {
	      $db_select = mysql_select_db(DB_NAME, $this->connection);
	}
	if (!$db_select) {
	      die("Database selection failed: " . mysql_error());
	}
    }
    
    public function __construct() {
	$this->openConnection();
    }
    
    public function query($sql) {
	$result=mysql_query($sql,$this->connection);
	$this->confirmQuery($result);
	return $result;
    }
    
    private function confirmQuery($result_set) {
	if(!$result_set) {
	    $output="database query failed".mysql_error()."<br/>";
	    die($output);
	}
    }
    
    public function fetchArray($result_set) {
	return mysql_fetch_array($result_set);
    }		  
      
    public function numRows($result_set) {
	return mysql_num_rows($result_set);
    }              							   		  

    public function insertId() {
	return mysql_insert_id($this->connection);
    }

    public function affectedRows() {
	return mysql_affected_rows($this->connection);
    }						 

    public function closeConnection() {
	if(isset($this->connection)) {
	    mysql_close($this->connection);
	    unset($this->connection);
	}
    }
}
<?php

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
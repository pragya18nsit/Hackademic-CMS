<?php
/**
 *
 * Hackademic-CMS/admin/controller/class.AddChallengeController.php
 *
 * Hackademic Add Challenge Controller
 * Class for the Add Challenge page in Backend
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
require_once(HACKADEMIC_PATH."admin/model/class.ChallengeBackend.php");
require_once(HACKADEMIC_PATH."admin/controller/class.HackademicBackendController.php");

class AddChallengeController extends HackademicBackendController {
    
     private static function rrmdir($dir) {
        foreach(glob($dir . '/*') as $file) {
            if(is_dir($file)) {
                self::rrmdir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dir);
    }
    
    public function installChallenge($file_to_open,$target,$name) {
        $zip = new ZipArchive();
	$x = $zip->open($file_to_open);
	if ($x === true) {
	    $zip->extractTo($target);
	    $zip->close();
            unlink($file_to_open);#deletes the zip file. We no longer need it.
            if (!file_exists($target."index.php") || !file_exists($target."$name".".xml")) {
                if (!file_exists($target."index.php")) {
		    $this->addErrorMessage("Not a valid challenge! Index.php file doesn't exist");
		} else {
		    $this->addErrorMessage("Not a valid challenge! Can't find XML file.");
		}
                self::rrmdir(HACKADEMIC_PATH."challenges/".$name);
                return false;
            } 
            $xml = simplexml_load_file($target."$name".".xml");
            if ( !isset($xml->title) || !isset($xml->author)|| !isset($xml->description)|| !isset($xml->category)){
                $this->addErrorMessage("The XML file is not valid.");
                self::rrmdir(HACKADEMIC_PATH."challenges/".$name);
                return false;
            }
            $a=array('title'=>$xml->title,'author'=>$xml->author,'description'=>$xml->description,'category'=>$xml->category);
            return $a;
	} else {
	    $this->addErrorMessage("There was a problem. Please try again!");
            return false;
	}
    }
    
    public function go() {
        $this->setViewTemplate('addchallenge.tpl');
        if(isset($_FILES['fupload'])) {
	    $filename = $_FILES['fupload']['name'];
            $source = $_FILES['fupload']['tmp_name'];
	    $type = $_FILES['fupload']['type'];
	    $name = explode('.', $filename); 
	    $target = HACKADEMIC_PATH."challenges/". $name[0] . '/';  
	    if(!isset($name[1])) {
                $this->addErrorMessage("Please select a file");
                return $this->generateView();                        
            }
            if(isset($name[0])) {
                $challenge=ChallengeBackend::doesChallengeExist($name[0]);
                if($challenge==true){
                    $this->addErrorMessage("This file already exists!!");
                    return $this->generateView();
                }
            }
	    $okay = strtolower($name[1]) == 'zip' ? true : false;
	    if(!$okay) {
		$this->addErrorMessage("Please choose a zip file!");
                return $this->generateView();
	    }
	    mkdir($target);
	    $saved_file_location = $target . $filename;
	    if(move_uploaded_file($source, $target . $filename)) {
                $data=$this->installChallenge($saved_file_location,$target,$name[0]);
		if($data==true){
                    $pkg_name =$name[0];
                    $date_posted = date("Y-m-d H-i-s");
                    ChallengeBackend::addchallenge($data['title'],$pkg_name,$data['description'],$data['author'],$data['category'],$date_posted);  
                    $this->addSuccessMessage("Challenge has been added succesfully");
	        } 
            }
        } 
        return $this->generateView();
    }
}

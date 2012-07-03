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
    
    public static function openZip($file_to_open,$target) {
        $zip = new ZipArchive();
	$x = $zip->open($file_to_open);
	if ($x === true) {
	    $zip->extractTo($target);
	    $zip->close();
            unlink($file_to_open);#deletes the zip file. We no longer need it.
            return true;
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
		if(self::openZip($saved_file_location,$target)==true){
                    $this->title =$name[0];
                    $this->date_posted = date("Y-m-d");
                    ChallengeBackend::addchallenge($this->title,$this->date_posted);  
                    $this->addSuccessMessage("Challenge has been added succesfully");
	        } else {
                    $this->addErrorMessage("There was a problem");
	        }
            }
        } 
        return $this->generateView();
    }
}

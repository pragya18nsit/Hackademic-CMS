<?php
/**
 *
 * Hackademic-CMS/controller/class.UserMenuController.php
 *
 * Hackademic User Menu Controller
 * Class for creating the frontend Main Menu
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

class UserMenuController{
    
    public function go() {
        $menu = self::createMainMenu();
	return $menu;
    }
    
    /**
     * Create Main Menu
     */
    protected function createMainMenu() {
	
	
	 Session::isAdmin();
	
    	if(Session::isAdmin()){
	       $link8 = array ('title'=>'Add Article', 'url'=>'admin/pages/addarticle.php');
               $link9 = array ('title'=>'Article Manager', 'url'=>'admin/pages/articlemanager.php');
               $link10 = array ('title'=>'User Manager', 'url'=>'admin/pages/usermanager.php');
	       $link11 = array ('title'=>'Add Challenge', 'url'=>'admin/pages/addchallenge.php');
               $link12 = array ('title'=>'Challenge Manager', 'url'=>'admin/pages/challengemanager.php');
               $link13 = array ('title'=>'Global Configuration', 'url'=>'admin/pages/globalconfiguration.php');
               $link14 = array ('title'=>'Logout', 'url'=>'pages/logout.php');
        
	    $menu = array(
            $link8,
            $link9,
            $link10,
            $link11,
            $link12,
            $link13,
            $link14
        );
	    return $menu;
    }
    elseif(Session::isTeacher()){
	  $link1 = array ('title'=>'Create a new class', 'url'=>'admin/pages/addarticle.php');
          $link2 = array ('title'=>'Add Challenge', 'url'=>'admin/pages/addchallenge.php');
          $link3 = array ('title'=>'See progress of students', 'url'=>'admin/pages/usermanager.php');
	  $link4 = array ('title'=>'Clone Existing Challenge', 'url'=>'admin/pages/addchallenge.php');
        
        $menu = array(
            $link1,
            $link2,
            $link3,
            $link4
        );
	return $menu;
    }
    else{
          $link1 = array ('title'=>'See Your Progress', 'url'=>'admin/pages/addarticle.php');
          $link2 = array ('title'=>'Current Score', 'url'=>'admin/pages/articlemanager.php');
          $link3 = array ('title'=>'Ranking', 'url'=>'admin/pages/usermanager.php');
        
        $menu = array(
            $link1,
            $link2,
            $link3
        );
	return $menu;
    }
    }
}
    

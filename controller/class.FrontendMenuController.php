<?php
/**
 *
 * Hackademic-CMS/controller/class.FrontendMenuController.php
 *
 * Hackademic Frontend Menu Controller
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
require_once(HACKADEMIC_PATH."/controller/class.HackademicController.php");
class FrontendMenuController extends HackademicController{
    
    public function go() {
        $menu = self::createMainMenu();
	self::generateMenu($menu);
    }
    
    /**
     * Create Main Menu
     */
    protected function createMainMenu() {
        
        $link1 = array ('title'=>'Home', 'url'=>'admin/pages/addarticle.php');
        $link2 = array ('title'=>'About us', 'url'=>'admin/pages/articlemanager.php');
        $link3 = array ('title'=>'Login/Logout', 'url'=>'admin/pages/usermanager.php');
	  	
        $link4 = array ('title'=>'Results', 'url'=>'admin/pages/addchallenge.php');
        $link5 = array ('title'=>'Top 100', 'url'=>'admin/pages/challengemanager.php');
        $link6 = array ('title'=>'Download', 'url'=>'admin/pages/globalconfiguration.php');
        $link7 = array ('title'=>'Greek', 'url'=>'pages/logout.php');
        
        $menu = array(
            $link1,
            $link2,
            $link3,
            $link4,
            $link5,
            $link6,
            $link7
        );
        return $menu;
    }
    protected function generateMenu($menu) {
        $this->addToView('main_menu',$menu);        
    }
}
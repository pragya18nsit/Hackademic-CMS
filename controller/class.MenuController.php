<?php
/**
 *
 * Hackademic-CMS/controller/class.MenuController.php
 *
 * Hackademic Menu Controller
 * Class for creating the Main Menu
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
class MenuController{
    
    public function go() {
        $menu = self::createMainMenu();
	return $menu;
       // self::generateMenu($menu);
    }
    
    /**
     * Create Main Menu
     */
    protected function createMainMenu() {
        
        $link1 = array ('title'=>'Add New Article', 'url'=>'admin/pages/addarticle.php');
        $link2 = array ('title'=>'Article Manager', 'url'=>'admin/pages/articlemanager.php');
        $link3 = array ('title'=>'User Manager', 'url'=>'admin/pages/usermanager.php');
	  	
        $link4 = array ('title'=>'Add New Challenge', 'url'=>'admin/pages/addchallenge.php');
        $link5 = array ('title'=>'Challenge Manager', 'url'=>'admin/pages/challengemanager.php');
        $link6 = array ('title'=>'Global Configuration', 'url'=>'admin/pages/globalconfiguration.php');
        $link7 = array ('title'=>'Logout', 'url'=>'pages/logout.php');
        
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
    
    /**
     * Generate Menu
     */
  /*  protected function generateMenu($menu) {
        $this->addToView('main_menu',$menu);        
    }*/
}
<?php
/**
 *
 * Menu Controller
 *
 * Create Hackademic Main Menu
 *
 */
require_once(HACKADEMIC_PATH."/controller/class.HackademicController.php");

class MenuController extends HackademicController {
    
    public function go() {
        $menu = self::createMainMenu();
        self::generateMenu($menu);
    }
    
    /**
     * Create Main Menu
     */
    protected function createMainMenu() {
        
        $link1 = array ('title'=>'Add a new article', 'url'=>'admin/pages/addarticle.php');
        $link2 = array ('title'=>'Article Manager', 'url'=>'admin/pages/articlemanager.php');
        $link3 = array ('title'=>'User Manager', 'url'=>'admin/pages/usermanager.php');
	  	
        $link4 = array ('title'=>'Add a new challenge', 'url'=>'admin/pages/addchallenge.php');
        $link5 = array ('title'=>'Challenge Manager', 'url'=>'admin/pages/challengemanager.php');
        $link6 = array ('title'=>'Global Configuration', 'url'=>'admin/pages/globalconfiguration.php');
        $link7 = array ('title'=>'Add User', 'url'=>'admin/pages/adduser.php');
        $link8 = array ('title'=>'Logout', 'url'=>'admin/pages/logout.php');
        
        $menu = array(
            $link1,
            $link2,
            $link3,
            $link4,
            $link5,
            $link6,
            $link7,
            $link8
        );
        return $menu;
    }
    
    /**
     * Generate Menu
     */
    protected function generateMenu($menu) {
        $this->addToView('main_menu',$menu);        
    }
}
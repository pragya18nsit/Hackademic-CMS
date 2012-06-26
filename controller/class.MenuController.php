<?php
/**
 *
 * Menu Controller
 *
 * Create Hackademic Main Menu
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
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
        
        $link1 = array ('title'=>'Add a new article', 'url'=>'admin/pages/AddArticle.php');
        $link2 = array ('title'=>'Article Manager', 'url'=>'admin/pages/ArticleManager.php');
        $link3 = array ('title'=>'User Manager', 'url'=>'admin/pages/UserManager.php');
	  	
        $link4 = array ('title'=>'Add a new challenge', 'url'=>'admin/pages/AddChallange.php');
        $link5 = array ('title'=>'Challenge Manager', 'url'=>'admin/pages/ChallengeManager.php');
        $link6 = array ('title'=>'Global Configuration', 'url'=>'admin/pages/GlobalConfiguration.php');
        $link7 = array ('title'=>'Add User', 'url'=>'admin/pages/AddUser.php');
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

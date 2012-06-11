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

        $link1 = array ('title'=>'Link 1', 'url'=>'');
        $link2 = array ('title'=>'Link 2', 'url'=>'');
        $link3 = array ('title'=>'Link 3', 'url'=>'');
        $link4 = array ('title'=>'Link 4', 'url'=>'');
        $link5 = array ('title'=>'Link 5', 'url'=>'');
        $link6 = array ('title'=>'Link 6', 'url'=>'');
        $link7 = array ('title'=>'Link 7', 'url'=>'');
        $link8 = array ('title'=>'Link 8', 'url'=>'');

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

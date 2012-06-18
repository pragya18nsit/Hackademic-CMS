<?php
/**
 *
 * Hackademic Backend Controller
 *
 * The parent class of all Hackademic Backend controllers.
 *
 */
require_once(HACKADEMIC_PATH."model/common/class.Session.php");
require_once(HACKADEMIC_PATH."admin/controller/class.MenuController.php");
require_once(HACKADEMIC_PATH."controller/class.HackademicController.php");

class HackademicBackendController extends HackademicController {
    
    public function __construct() {
	HackademicController::__construct();
        // Login Controller, do nothing
        if (get_class($this) == 'LoginController');
        elseif (!$this->isLoggedIn() || !$this->isAdmin()) {
            // Else if not logged in, go to login page
            header('Location: '.SOURCE_ROOT_PATH."admin/pages/login.php");
        } else {
            MenuController::go();
        }
    }
    
    /**
     * Function to set view template
     * @param $tmpl str Template name
     */
    public function setViewTemplate($tmp1) {
        $this->view_template=HACKADEMIC_PATH.'admin/view/'.$tmp1;
    }
}
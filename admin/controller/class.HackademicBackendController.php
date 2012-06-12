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
       public function __construct(){
	HackademicController::__construct();
	if(session::isLoggedIn()){
	    MenuController::go();
	}
       }
    /**
     * Function to set view template
     * @param $tmpl str Template name
     */
	/* public function __construct(){
	 
	  HackademicController::__construct();
	  if(Session::isLoggedIn()){
	  MenuController::go();
	  }
	 }*/
    public function setViewTemplate($tmp1) {
        $this->view_template=HACKADEMIC_PATH.'admin/view/'.$tmp1;
    }
}
<?php
/**
 *
 * hackademic/admin/controller/class.DashboardController.php
 *
 * Controller for backend dashboard
 *
 */

require_once(HACKADEMIC_PATH."model/common/class.Session.php");
require_once(HACKADEMIC_PATH."admin/controller/class.HackademicBackendController.php");
require_once(HACKADEMIC_PATH."controller/class.HackademicController.php");
class DashboardController extends HackademicBackendController {
    
	          public function go() {
               $this->setViewTemplate('admin_logout.tpl');
		       $this->generateView();
		  
    }
    
}
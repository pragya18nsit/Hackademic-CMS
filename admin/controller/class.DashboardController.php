<?php
/**
 *
 * hackademic/admin/controller/class.DashboardController.php
 *
 * Controller for backend dashboard
 *
 */
require_once(HACKADEMIC_PATH."admin/controller/class.HackademicBackendController.php");

class DashboardController extends HackademicBackendController {
    
    public function go() {
        $this->setViewTemplate('dashboard.tpl');
	$this->generateView();
    }
}
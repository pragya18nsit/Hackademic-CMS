<?php
/**
 *
 * hackademic/controller/class.DashboardController.php
 *
 * Controller for frontend dashboard
 *
 */
require_once(HACKADEMIC_PATH."controller/class.HackademicController.php");

class DashboardController extends HackademicController {
    
    public function go() {
        $this->setViewTemplate('user_dashboard.tpl');
	$this->generateView();
    }
}
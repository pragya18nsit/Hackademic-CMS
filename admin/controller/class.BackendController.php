<?php
/**
 *
 * hackademic/admin/controller/class.BackendController.php
 *
 * Default Backend Controller. This is the landing point for backend entry.
 *
 */
require_once(HACKADEMIC_PATH."model/common/class.Session.php");
require_once(HACKADEMIC_PATH."admin/controller/class.HackademicBackendController.php");
require_once(HACKADEMIC_PATH."admin/controller/class.LoginController.php");
require_once(HACKADEMIC_PATH."admin/controller/class.DashboardController.php");

class BackendController extends HackademicBackendController {
    
    public function go() {
        if (Session::isLoggedIn()) {
            // If logged in, we go to DashboardController
            $controller = new DashboardController;
            echo $controller->go();
        } else {
            // If is not logged in, we go to LoginController
            $controller = new LoginController;
            echo $controller->go();
        }
    }
    
}
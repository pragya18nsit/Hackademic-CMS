<?php
/**
 *
 * hackademic/admin/controller/class.LogoutController.php
 *
 * Controller for logging out of backend.
 *
 */
require_once(HACKADEMIC_PATH."model/common/class.Session.php");
require_once(HACKADEMIC_PATH."admin/controller/class.HackademicBackendController.php");

class LogoutController extends HackademicBackendController{

    public function go() {
        Session::logout();
	header('Location:'.SOURCE_ROOT_PATH);
    }

}
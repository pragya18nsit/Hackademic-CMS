<?php
/**
 *
 * hackademic/controller/class.LogoutController.php
 *
 * Controller for logging out of frontend.
 *
 */
require_once(HACKADEMIC_PATH."model/common/class.Session.php");
require_once(HACKADEMIC_PATH."controller/class.HackademicController.php");

class LogoutController extends HackademicController{

    public function go() {
        Session::logout();
	header('Location:'.SOURCE_ROOT_PATH);
    }

}
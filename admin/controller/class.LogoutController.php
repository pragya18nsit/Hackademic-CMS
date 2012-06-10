<?php
require_once(HACKADEMIC_PATH."admin/controller/class.BackendController.php");
require_once(HACKADEMIC_PATH."model/common/class.Session.php");
require_once(HACKADEMIC_PATH."admin/controller/class.HackademicBackendController.php");
class LogoutController extends HackademicBackendController{
              public function go(){
			     Session::logout();
			     $controller = new BackendController();
                 return $controller->go();
     }
	 }
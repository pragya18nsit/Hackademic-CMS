<?php
require_once("../../init.php");
require_once(HACKADEMIC_PATH."admin/controller/class.LogoutController.php");

$controller = new LogoutController();
echo $controller->go();
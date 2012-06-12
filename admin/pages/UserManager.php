<?php
require_once("../../init.php");
require_once(HACKADEMIC_PATH."admin/controller/class.UserManagerController.php");

$controller = new UserManagerController();
echo $controller->go();

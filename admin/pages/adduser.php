<?php
require_once("../../init.php");
require_once(HACKADEMIC_PATH."admin/controller/class.AddUserController.php");

$controller = new AddUserController();
echo $controller->go();

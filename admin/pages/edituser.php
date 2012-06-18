<?php
require_once("../../init.php");
require_once(HACKADEMIC_PATH."admin/controller/class.EditUserController.php");

$controller = new EditUserController();
echo $controller->go();

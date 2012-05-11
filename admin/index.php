<?php
require_once("../init.php");
require_once(HACKADEMIC_PATH."admin/controller/class.BackendController.php");

$controller = new BackendController();
echo $controller->go();
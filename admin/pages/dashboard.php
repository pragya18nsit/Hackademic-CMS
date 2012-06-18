<?php
require_once("../../init.php");
require_once(HACKADEMIC_PATH."admin/controller/class.DashboardController.php");

$controller = new DashboardController();
echo $controller->go();
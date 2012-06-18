<?php
require_once("../../init.php");
require_once(HACKADEMIC_PATH."admin/controller/class.GlobalConfigurationrController.php");

$controller = new GlobalConfigurationrController();
echo $controller->go();

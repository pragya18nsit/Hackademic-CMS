<?php
require_once("../init.php");
require_once(HACKADEMIC_PATH."controller/class.LoginController.php");

$controller = new LoginController();
echo $controller->go();
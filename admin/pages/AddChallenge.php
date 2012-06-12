<?php
require_once("../../init.php");
require_once(HACKADEMIC_PATH."admin/controller/class.AddChallengeController.php");

$controller = new AddChallengeController();
echo $controller->go();

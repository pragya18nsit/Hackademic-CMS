<?php
require_once("../../init.php");
require_once(HACKADEMIC_PATH."admin/controller/class.ChallengeManagerController.php");

$controller = new ChallengeManagerController();
echo $controller->go();

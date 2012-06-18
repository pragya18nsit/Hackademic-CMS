<?php
require_once("../../init.php");
require_once(HACKADEMIC_PATH."admin/controller/class.EditArticleController.php");

$controller = new EditArticleController();
echo $controller->go();

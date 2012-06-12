<?php
require_once("../../init.php");
require_once(HACKADEMIC_PATH."admin/controller/class.AddArticleController.php");

$controller = new AddArticleController();
echo $controller->go();
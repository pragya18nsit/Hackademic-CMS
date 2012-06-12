<?php
require_once("../../init.php");
require_once(HACKADEMIC_PATH."admin/controller/class.ArticleManagerController.php");

$controller = new ArticleManagerController();
echo $controller->go();

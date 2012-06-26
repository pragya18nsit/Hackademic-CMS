<?php
/**
 * This file is the entry point for the application.
 */
$version = explode('.', PHP_VERSION);
if ($version[0] < 5) {
    echo "ERROR: Hackademic requires PHP 5. ";
    echo "The current version of PHP is ".phpversion().".";
    die();
}
require_once('init.php');
// This is only temporary as we are working on our first feature
require_once(HACKADEMIC_PATH."controller/class.LoginController.php");

$controller = new LoginController();
 $controller->go();
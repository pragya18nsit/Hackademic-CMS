<?php
/**
 * This file is the entry point for the application.
 */
require_once('init.php');

$version = explode('.', PHP_VERSION);
if ($version[0] < 5) {
    echo "ERROR: Hackademic requires PHP 5. ";
    echo "The current version of PHP is ".phpversion().".";
    die();
}

// This is only temporary as we are working on our first feature
$location_to_redirect = SOURCE_ROOT_PATH."admin/";
header("Location: $location_to_redirect");
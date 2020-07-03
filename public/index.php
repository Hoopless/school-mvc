<?php

/**
 * THis is expected to the root of the configuration in apache.
 * However, I do not use apache myself so i can not test this.
 */

require_once '../App/Core/autoload.php';
require_once '../App/Core/config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$controller = new RequestController();
$controller->handle();
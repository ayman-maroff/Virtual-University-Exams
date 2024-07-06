<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

/**
 * A simple PHP MVC skeleton
 *
 * @package University
 * @author Panique
 * @link http://www.University.net
 * @link https://github.com/panique/University/
 * @license http://opensource.org/licenses/MIT MIT License
 */

// load the (optional) Composer auto-loader
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}

// load application config (error reporting etc.)
require 'application/config/config.php';

// load application class
require 'application/libs/application.php';
require 'application/libs/controller.php';

// start the application
// echo "1 - index.php";
// echo "i am in the root index : URL = ".URL;
$app = new Application();

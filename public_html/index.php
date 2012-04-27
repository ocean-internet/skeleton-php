<?php
namespace MyFramework\Common;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'stderr');

/**
 * Use the DS to separate the directories in other defines
 */
	if (!defined('DS')) {
		define('DS', DIRECTORY_SEPARATOR);
	}
/**
 * The full path to the directory which holds "MyApp", WITHOUT a trailing DS.
 *
 */
	if (!defined('ROOT')) {
		define('ROOT', dirname(dirname(__FILE__)) . DS . 'lib');
	}
/**
 * The actual directory name for the "MyApp".
 *
 */
	if (!defined('APP_DIR')) {
		define('APP_DIR',       'MyApp');
	}
/**
 * The directory name for "MyFramework"
 */
	if (!defined('FRAMEWORK_DIR')) {
		define('FRAMEWORK_DIR', 'MyFramework');
	}

// Class Auto Loader...
require ROOT . DS . 'doctrine2/common/lib/Doctrine/Common/ClassLoader.php';
$AppLoader       = new \Doctrine\Common\ClassLoader('MyApp',       ROOT);
$FrameworkLoader = new \Doctrine\Common\ClassLoader('MyFramework', ROOT);
$AppLoader->register();
$FrameworkLoader->register();

// Bootstrap the App...
require ROOT . DS . FRAMEWORK_DIR . DS . 'Config' . DS . 'bootstrap.php'; // Framework constants & utility functions/classes
require ROOT . DS . APP_DIR       . DS . 'Config' . DS . 'bootstrap.php'; // App       constants & utility functions/classes

$Request  = new Request($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES, $_ENV);
$Response = new Response;

$FrontController = new FrontController($Request, $Response);

// View object
$View = $FrontController->dispatch();
print $View->render();

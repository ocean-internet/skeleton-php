<?php
namespace MyFramework\Common;
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

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
	if (!defined('APP_NAME')) {
		define('APP_NAME', 'MyApp');
	}
/**
 * The actual directory name for the "MyApp".
 *
 */
	if (!defined('APP_DIR')) {
		define('APP_DIR',       ROOT . DS . APP_NAME);
	}
/**
 * The directory name for "MyFramework"
 */
	if (!defined('FRAMEWORK_DIR')) {
		define('FRAMEWORK_DIR', ROOT . DS . 'MyFramework');
	}

// Bootstrap the App...
require FRAMEWORK_DIR . DS . 'Config' . DS . 'bootstrap.php'; // Framework constants & utility functions/classes
require APP_DIR       . DS . 'Config' . DS . 'bootstrap.php'; // App       constants & utility functions/classes

require SMARTY_DIR . 'Smarty.class.php';

try {
	$Request = new Request($_SERVER, $_POST, $_FILES);
	$Mapper  = new DoctrineMapper($dbCconnectionParams);
	$ControllerFactory  = new ControllerFactory($Request, $Mapper);
	$View    = new View($Request, new SmartyTemplateEngine(new \Smarty));
	$FrontController = new FrontController($Request, $ControllerFactory, $View);
	$FrontController->dispatch();
	$View->render();
} catch(\MyFramework\Exception\PageNotFoundException $exception) {
	header("HTTP/1.0 404 Not Found");
	echo 'Message: ' . $exception->getMessage();
	exit;
} catch (\Exception $exception) {
	header("HTTP/1.0 500 Server Error");
	echo 'Message: ' . $exception->getMessage();
	exit;
}

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo '<!-- Page generated in '.$total_time.' seconds. -->';

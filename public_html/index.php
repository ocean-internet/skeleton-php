<?php
namespace MyFramework\Common;

function pr($stuff) {
	echo '<pre>';
	print_r($stuff);
	echo '</pre>';
}

pr($_SERVER);


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

// Bootstrap the App...
require ROOT . DS . FRAMEWORK_DIR . DS . 'Config' . DS . 'bootstrap.php'; // Framework constants & utility functions/classes
require ROOT . DS . APP_DIR       . DS . 'Config' . DS . 'bootstrap.php'; // App       constants & utility functions/classes

require SMARTY_DIR . 'Smarty.class.php';

$FrontController = new FrontController(new Request($_SERVER), new View(new SmartyTemplateEngine(new \Smarty)));

// View object
$FrontController->dispatch();
$View->render();

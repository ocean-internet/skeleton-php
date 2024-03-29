<?php
namespace MyFramework\Common;
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
		define('ROOT', dirname(dirname(dirname(__FILE__))) . DS . 'lib');
	}
/**
 * The actual directory name for the "MyApp".
 *
 */
	if (!defined('APP_NAME')) {
		define('APP_NAME', 'TestApp');
	}
/**
 * The actual directory name for the "MyApp".
 *
 */
	if (!defined('APP_DIR')) {
		define('APP_DIR', dirname(__FILE__) . DS . APP_NAME);
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

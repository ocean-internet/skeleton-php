<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'stderr');

// Class Auto Loader...
require ROOT . DS . 'doctrine2/common/lib/Doctrine/Common/ClassLoader.php';
$AppLoader       = new \Doctrine\Common\ClassLoader('MyApp',       ROOT);
$FrameworkLoader = new \Doctrine\Common\ClassLoader('MyFramework', ROOT);

$AppLoader->register();
$FrameworkLoader->register();

/**
 * The full path MyApp/tmp directory, WITHOUT a trailing DS.
 *
 */
	if (!defined('TMP_DIR')) {
		define('TMP_DIR', ROOT . DS . APP_DIR . DS . 'tmp');
	}
/**
 * The full path to the directory which holds "smarty", WITH a trailing DS.
 *
 */
	if (!defined('SMARTY_DIR')) {
		define('SMARTY_DIR', ROOT . DS . 'smarty' . DS . 'libs' . DS);
	}
/**
 * The full path to the directory which holds "smarty", WITHOUT a trailing DS.
 *
 */
	if (!defined('TEMPLATES_DIR ')) {
		define('TEMPLATES_DIR', ROOT . DS . APP_DIR . DS . 'View');
	}

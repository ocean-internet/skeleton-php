<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'stderr');

// Class Auto Loader...
require ROOT . DS . 'doctrine2/common/lib/Doctrine/Common/ClassLoader.php';
$AppLoader       = new \Doctrine\Common\ClassLoader(APP_NAME, dirname(APP_DIR));
$FrameworkLoader = new \Doctrine\Common\ClassLoader('MyFramework', ROOT);

$AppLoader->register();
$FrameworkLoader->register();

require FRAMEWORK_DIR . DS . 'Config' . DS . 'functions.php';
require APP_DIR       . DS . 'Config' . DS . 'database.php';

/**
 * The full path MyApp/tmp directory, WITHOUT a trailing DS.
 *
 */
	if (!defined('TMP_DIR')) {
		define('TMP_DIR', APP_DIR . DS . 'tmp');
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
		define('TEMPLATES_DIR', APP_DIR . DS . 'View');
	}

define('CAMEL_BACK', '/^[a-z]+(?:[A-Z][a-z]+)*$/');
define('CAMEL_CASE', '/^[A-Z][a-z]+(?:[A-Z][a-z]+)*$/');
define('UUID',       '/^[a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12}$/i');

<?php
define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);
$config_path = ROOT . 'config.php';
require_once(ROOT . 'core.php');

if (file_exists($config_path)) {
	include_once($config_path);
} else {
	require_once(ROOT . 'install' . DIRECTORY_SEPARATOR . 'index.php');
	exit;
}

?>
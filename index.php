<?php
class RB {
	const ROOT = __DIR__ . DIRECTORY_SEPARATOR;
	const INSTALL = self::ROOT . 'install' . DIRECTORY_SEPARATOR;
	const INC = self::ROOT . 'inc' . DIRECTORY_SEPARATOR;
	const HELPERS = self::INC . 'helpers' . DIRECTORY_SEPARATOR;
	
	protected $config_path = self::ROOT . 'config.php';
	
	public function __construct() {
		require_once(self::ROOT . 'core.php');
		
		if (file_exists($this->config_path)) {
			include_once($this->config_path);
		} else {
			require_once(self::INSTALL . 'index.php');
			return;
		}
	}
}

$rb = new RB();
?>
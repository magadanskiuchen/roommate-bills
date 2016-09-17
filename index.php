<?php
class RB {
	const ROOT = __DIR__ . DIRECTORY_SEPARATOR;
	const INSTALL = self::ROOT . 'install' . DIRECTORY_SEPARATOR;
	const INC = self::ROOT . 'inc' . DIRECTORY_SEPARATOR;
	const HELPERS = self::INC . 'helpers' . DIRECTORY_SEPARATOR;
	
	protected $config_path = self::ROOT . 'config.php';
	protected $install = null;
	
	private function core() {
		// Helpers
		require_once(self::HELPERS . 'RB_Reflection.php');
		require_once(self::HELPERS . 'RB_Templating.php');
		require_once(self::HELPERS . 'RB_Config_Setup.php');
		
		// Init
		require_once(self::INC . 'db' . DIRECTORY_SEPARATOR . 'RB_IDB.php');
		require_once(self::INC . 'db' . DIRECTORY_SEPARATOR . 'RB_MySQL_DB.php');
		require_once(self::INC . 'db' . DIRECTORY_SEPARATOR . 'RB_DB_Factory.php');
	}
	
	public function install() {
		require_once(self::INSTALL . 'index.php');
		
		$this->install = new RB_Install();
	}
	
	public function __construct() {
		if (!file_exists($this->config_path)) {
			$this->core();
			$this->install();
		} else {
			include_once($this->config_path);
			$this->core();
		}
	}
}

global $rb;
$rb = new RB();
?>
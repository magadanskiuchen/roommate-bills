<?php
class RB_Config_Setup {
	const PATH = RB::ROOT . 'config.php';
	const SAMPLE = RB::ROOT . 'config.sample.php';
	
	private function loadConfigAsString() {
		return file_get_contents(self::PATH);
	}
	
	private function saveConfig($config) {
		file_put_contents(self::PATH, $config);
	}
	
	public function __construct() {
		if (!file_exists(self::PATH)) {
			if (file_exists(self::SAMPLE)) {
				copy(self::SAMPLE, self::PATH);
			}
		}
	}
	
	public function updateConfig($class, $config_value) {
		$old = $this->loadConfigAsString();
		
		$new = preg_replace('/^class ' . preg_quote($class) . ' {[^}]+}/ium', $config_value, $old);
		
		if ($new === $old) {
			$new = preg_replace('/^<\?php/ium', "<?php\n{$config_value}", $new);
		}
		
		$this->saveConfig($new);
	}
}
?>
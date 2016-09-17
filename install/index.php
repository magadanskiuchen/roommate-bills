<?php
class RB_Install {
	private $active_db_mods = [];
	private $preferred_db_mods = [];
	private $db_mod = '';
	private $config_setup = null;
	
	private function validateConfig() {
		$input = [];
		$errors = [];
		
		$config_constants = $this->db_mod::getConfigConstants();
		
		foreach ($config_constants as $constant => $options) {
			$input[$constant] = !empty($_POST['config_constants'][$constant]) ? $_POST['config_constants'][$constant] : '';
			
			if ($options['required'] && $input[$constant] === '') {
				$errors[] = "The {$options['label']} field is required";
			}
		}
		
		if (empty($errors)) {
			$this->createConfig($input);
		}
		
		return $errors;
	}
	
	public function createConfig($constants) {
		$this->config_setup = new RB_Config_Setup();
		
		$rb_config  = "class RB_CONFIG {\n" .
				   "	const DB_CLASS = '{$this->db_mod}';\n" .
				   "}";
		
		$this->config_setup->updateConfig('RB_CONFIG', $rb_config);
		
		$db_config_class = strtoupper(str_replace('_DB', '_CONFIG', $this->db_mod));
		
		$db_config = "class {$db_config_class} {\n";
		
		foreach ($constants as $const => $value) {
			$db_config .= "	const {$const} = '{$value}';\n";
		}
		
		$db_config .= "}";
		
		$this->config_setup->updateConfig($db_config_class, $db_config);
	}
	
	public function __construct(string $db_mod = '') {
		if (!isset($_SERVER['HTTP_HOST'])) {
			return;
		}
		
		$this->active_db_mods = RB_DB_Factory::getActiveMods();
		
		if ($db_mod !== '') {
			$this->preferred_db_mods[] = $db_mod;
		}
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['rb_db_module'])) {
			$this->preferred_db_mods[] = $_POST['rb_db_module'];
		}
		
		if (!empty($_GET['rb_db_module'])) {
			$this->preferred_db_mods[] = $_GET['rb_db_module'];
		}
		
		for ($i=0; $i < count($this->preferred_db_mods) && !$this->getDbMod(); $i++) {
			$this->setDbMod($this->preferred_db_mods[$i]);
		}
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['step-2'])) {
			$errors = $this->validateConfig();
		}
		
		if (!$this->db_mod) {
			RB_Templating::getTemplate('install/step-1', ['active_mods' => $this->active_db_mods]);
			return;
		}
		
		$variables = ['rb_db_module' => $this->db_mod, 'config_constants' => $this->db_mod::getConfigConstants()];
		
		if (isset($errors)) {
			if (!empty($errors)) {
				$variables['errors'] = $errors;
			}
		} else {
			RB_Templating::getTemplate('install/step-2', $variables);
			return;
		}
	}
	
	public function getActiveDbMods() {
		return $this->active_db_mods;
	}
	
	public function getDbMod() {
		return $this->db_mod;
	}
	
	public function setDbMod(string $mod) {
		if (in_array($mod, $this->active_db_mods)) {
			$this->db_mod = $mod;
		}
		
		return $this->db_mod === $mod;
	}
}
?>
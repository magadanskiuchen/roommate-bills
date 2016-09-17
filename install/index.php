<?php
class RB_Install {
	private $active_db_mods = [];
	private $db_mod = '';
	
	public function __construct(string $db_mod = '') {
		if (!isset($_SERVER['HTTP_HOST'])) {
			return;
		}
		
		$this->active_db_mods = RB_DB_Factory::getActiveMods();
		
		$preferred_db_mods = [];
		
		if ($db_mod !== '') {
			$preferred_db_mods[] = $db_mod;
		}
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['rb_db_module'])) {
			$preferred_db_mods[] = $_POST['rb_db_module'];
		}
		
		if (!empty($_GET['rb_db_module'])) {
			$preferred_db_mods[] = $_GET['rb_db_module'];
		}
		
		for ($i=0; $i < count($preferred_db_mods) && !$this->getDbMod(); $i++) {
			$this->setDbMod($preferred_db_mods[$i]);
		}
		
		if (!$this->db_mod) {
			RB_Templating::getTemplate('install/step-1', ['active_mods' => $this->active_db_mods]);
		} else {
			RB_Templating::getTemplate('install/step-2', ['config_constants' => $this->db_mod::getConfigConstants()]);
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
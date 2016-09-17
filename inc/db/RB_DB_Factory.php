<?php
abstract class RB_DB_Factory {
	public static function getRbDbs() {
		return RB_Reflection::getClassesThatImplement('RB_IDB');
	}
	
	public static function getActiveMods() {
		$mods_available = self::getRbDbs();
		
		$mods_active = array_filter(
			$mods_available,
			function ($mod) {
				return $mod::isActive();
			}
		);
		
		if (count($mods_active) < 1) {
			throw new Exception('No active DB modules');
		}
		
		return $mods_active;
	}
	
	public static function getMod(string $preferred = '') {
		$mods_active = self::getActiveMods();
		
		// use the first available active module by default
		$class_name = reset($mods_active);
		
		if ($preferred !== '' && in_array($preferred, $mods_active)) {
			$class_name = $preferred;
		} else if (defined('RB_DB_CLASS') && RB_DB_CLASS !== '' && in_array(RB_DB_CLASS, $mods_active)) {
			$class_name = RB_DB_CLASS;
		}
		
		return $class_name;
	}
	
	public static function create(string $preferred = '') {
		$class_name = self::getMod($preferred);
		
		return new $class_name;
	}
}
?>
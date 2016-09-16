<?php
abstract class RB_DB_Factory {
	public static function create($preferred = '') {
		$mods_available = self::getRbDbs();
		
		if (count($mods_available) < 1) {
			throw new Exception('No DB modules available');
		}
		
		// use the first available module by default
		$class_name = reset($mods_available);
		
		if ($preferred !== '' && in_array($preferred, $mods_available)) {
			$class_name = $preferred;
		} else if (defined('RB_DB_CLASS') && RB_DB_CLASS !== '' && in_array(RB_DB_CLASS, $mods_available)) {
			$class_name = RB_DB_CLASS;
		}
		
		return new $class_name;
	}
	
	public static function getRbDbs() {
		return RB_Reflection::getClassesThatImplement('RB_IDB');
	}
}
?>
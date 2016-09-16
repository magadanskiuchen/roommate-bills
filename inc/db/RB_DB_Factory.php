<?php
abstract class RB_DB_Factory {
	public static function create() {
		$mods_available = self::getRbDbs();
		
		if (count($mods_available) < 1) {
			throw new Exception('No DB modules available');
		}
	}
	
	public static function getRbDbs() {
		return RB_Reflection::getClassesThatImplement('RB_IDB');
	}
}
?>
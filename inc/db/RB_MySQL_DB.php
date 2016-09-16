<?php
class RB_MySQL_DB implements RB_IDB {
	public static function is_active() {
		return extension_loaded('mysqli');
	}
	
	public function select() {
		
	}
	
	public function insert() {
		
	}
	
	public function update() {
		
	}
	
	public function delete() {
		
	}
}
?>
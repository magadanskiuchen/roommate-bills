<?php
interface RB_IDB {
	public static function is_active();
	public static function get_config_constants();
	public function insert();
	public function select();
	public function update();
	public function delete();
}
?>
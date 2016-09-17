<?php
interface RB_IDB {
	public static function isActive();
	public static function getConfigConstants();
	public function connect();
	public function insert();
	public function select();
	public function update();
	public function delete();
}
?>
<?php
if (!defined('RB_MYSQL_HOST')) define('RB_MYSQL_HOST', ini_get("mysqli.default_host"));
if (!defined('RB_MYSQL_USER')) define('RB_MYSQL_USER', ini_get("mysqli.default_user"));
if (!defined('RB_MYSQL_PASS')) define('RB_MYSQL_PASS', ini_get("mysqli.default_pw"));
if (!defined('RB_MYSQL_PORT')) define('RB_MYSQL_PORT', ini_get("mysqli.default_port"));
if (!defined('RB_MYSQL_SOCKET')) define('RB_MYSQL_SOCKET', ini_get("mysqli.default_socket"));
if (!defined('RB_MYSQL_DB')) define('RB_MYSQL_DB', '');

class RB_MySQL_DB implements RB_IDB {
	private $mysqli;
	
	public static function is_active() {
		return extension_loaded('mysqli');
	}
	
	public static function get_config_constants() {
		return [
			'RB_MYSQL_HOST' => ['label' => 'Host', 'required' => true, 'default' => RB_MYSQL_HOST],
			'RB_MYSQL_USER' => ['label' => 'User', 'required' => true, 'default' => RB_MYSQL_USER],
			'RB_MYSQL_PASS' => ['label' => 'Password', 'required' => true, 'default' => RB_MYSQL_PASS],
			'RB_MYSQL_DB' => ['label' => 'Database name', 'required' => true, 'default' => RB_MYSQL_DB],
			'RB_MYSQL_PORT' => ['label' => 'Port', 'required' => false, 'default' => RB_MYSQL_PORT],
			'RB_MYSQL_SOCKET' => ['label' => 'Socket', 'required' => false, 'default' => RB_MYSQL_SOCKET],
		];
	}
	
	public function __construct($host = RB_MYSQL_HOST, $user = RB_MYSQL_USER, $pass = RB_MYSQL_PASS, $db = RB_MYSQL_DB, $port = RB_MYSQL_PORT, $socket = RB_MYSQL_SOCKET) {
		@$this->mysqli = new mysqli($host, $user, $pass, $db, $port, $socket);
		
		if ($this->mysqli->connect_error) {
			die('<h1>Cannot connect to MySQL Server</h1>' . $this->mysqli->connect_error);
		}
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
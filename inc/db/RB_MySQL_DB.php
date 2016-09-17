<?php
if (!class_exists('RB_MYSQL_CONFIG')) {
	class RB_MYSQL_CONFIG {
		const HOST = 'localhost';
		const USER = '';
		const PASS = '';
		const PORT = '';
		const SOCKET = '';
		const DB = 'roommate_bills';
	}
}

class RB_MySQL_DB implements RB_IDB {
	private $mysqli;
	
	public static function isActive() {
		return extension_loaded('mysqli');
	}
	
	public static function getConfigConstants() {
		return [
			'RB_MYSQL_HOST' => ['label' => 'Host', 'required' => true, 'default' => RB_MYSQL_CONFIG::HOST],
			'RB_MYSQL_USER' => ['label' => 'User', 'required' => true, 'default' => RB_MYSQL_CONFIG::USER],
			'RB_MYSQL_PASS' => ['label' => 'Password', 'required' => true, 'default' => RB_MYSQL_CONFIG::PASS],
			'RB_MYSQL_DB' => ['label' => 'Database name', 'required' => true, 'default' => RB_MYSQL_CONFIG::DB],
			'RB_MYSQL_PORT' => ['label' => 'Port', 'required' => false, 'default' => RB_MYSQL_CONFIG::PORT],
			'RB_MYSQL_SOCKET' => ['label' => 'Socket', 'required' => false, 'default' => RB_MYSQL_CONFIG::SOCKET],
		];
	}
	
	public function __construct(bool $auto_connect = true) {
		if (!class_exists('RB_MYSQL_CONFIG')) {
			global $rb;
			$rb->install();
		}
		
		if ($auto_connect) {
			$this->connect();
		}
	}
	
	public function connect(
			string $host = RB_MYSQL_CONFIG::HOST,
			string $user = RB_MYSQL_CONFIG::USER,
			string $pass = RB_MYSQL_CONFIG::PASS,
			string $db = RB_MYSQL_CONFIG::DB,
			string $port = RB_MYSQL_CONFIG::PORT,
			string $socket = RB_MYSQL_CONFIG::SOCKET
		) {
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
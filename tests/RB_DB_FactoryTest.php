<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php');

use PHPUnit\Framework\TestCase;

class RB_DB_FactoryTest extends TestCase {
	public function testGetRbDbs() {
		$db = RB_DB_Factory::create();
		
		$this->assertTrue($db instanceof RB_IDB);
	}
}
?>
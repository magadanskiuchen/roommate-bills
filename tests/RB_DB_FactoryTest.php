<?php
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'RB_Reflection.php');
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'RB_DB_Factory.php');

use PHPUnit\Framework\TestCase;

class RB_DB_FactoryTest extends TestCase {
	public function testGetRbDbs() {
		$this->assertEquals([], RB_DB_Factory::getRbDbs());
	}
}
?>
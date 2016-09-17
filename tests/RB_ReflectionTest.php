<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php');

use PHPUnit\Framework\TestCase;

interface RB_Test {
	public function test();
}

class RB_Test_1 implements RB_Test {
	public function test() {
		
	}
}

interface RB_Secondary_Test {
	public function test();
}

class RB_Test_2 implements RB_Secondary_Test {
	public function test() {
		
	}
}

class RB_Test_3 implements RB_Secondary_Test {
	public function test() {
		
	}
}

class RB_Reflection_Test extends TestCase {
	public function testGetClassesThatImplement() {
		$test_implementations = RB_Reflection::getClassesThatImplement('RB_Test');
		$secondary_test_implementations = RB_Reflection::getClassesThatImplement('RB_Secondary_Test');
		
		$this->assertEquals(reset($test_implementations), 'RB_Test_1');
		$this->assertEquals(count($secondary_test_implementations), 2);
	}
}
?>
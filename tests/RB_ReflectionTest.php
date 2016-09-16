<?php
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'RB_Reflection.php');

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

class RB_ReflectionTest extends TestCase {
	public function testGetClassesThatImplement() {
		$test_implementations = RB_Reflection::getClassesThatImplement('RB_Test');
		$secondary_test_implementations = RB_Reflection::getClassesThatImplement('RB_Secondary_Test');
		
		$this->assertEquals(array_pop($test_implementations), 'RB_Test_1');
		$this->assertEquals(count($secondary_test_implementations), 2);
	}
}
?>
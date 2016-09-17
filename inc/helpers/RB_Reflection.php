<?php
abstract class RB_Reflection {
	public static function getClassesThatImplement(string $interface) {
		$classes = [];
		
		if (interface_exists($interface)) {
			$classes = array_filter(
				get_declared_classes(),
				function ($class) use ($interface) {
					return in_array($interface, class_implements($class));
				}
			);
		}
		
		return $classes;
	}
}
?>
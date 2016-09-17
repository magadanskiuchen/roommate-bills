<?php
abstract class RB_Templating {
	const TPL = RB::ROOT . 'tpl' . DIRECTORY_SEPARATOR;
	
	public static function getTemplate(string $file, array $variables) {
		extract($variables);
		
		if (!preg_match('/\.php$/', $file)) {
			$file .= '.php';
		}
		
		$file = str_replace('/', DIRECTORY_SEPARATOR, $file);
		
		include(self::TPL . $file);
	}
}
?>
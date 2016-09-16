<?php
if (!defined('ROOT')) exit;

$active_mods = RB_DB_Factory::getActiveMods();

var_dump($active_mods);
?>
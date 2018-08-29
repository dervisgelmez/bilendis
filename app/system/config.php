<?php 

$config = array();

$config['db'] = [
	'host' => 'localhost',
	'name' => 'bilendis',
	'user' => 'root',
	'pass' => ''
];


define('dir', realpath('.'));
define('controller', dir.'/app/controller');
define('view', dir.'/app/view');
define('url', 'http://'.$_SERVER['SERVER_NAME'].'/plugin');


?>
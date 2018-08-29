<?php 

session_start();
ob_start();

function __autoload($className)
{
	$classFile = realpath('.').'/app/classes/class.'.strtolower($className).'.php';

	if (file_exists($classFile))
	{
		require $classFile;
	}
}

Helper::Load();

//config dosyası
require 'system/config.php';

$db = mysqli_connect($config['db']['host'], $config['db']['user'],$config['db']['pass'],$config['db']['name']);
mysqli_set_charset($db,"utf8");

?>
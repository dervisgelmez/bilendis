<?php 
	require 'app/init.php';
	
	$_url = get('url');
	$_url = array_filter(explode('/', $_url));

	if(isset($_url[0]) && $_url[0] == "anasayfa")
	{
		$_url[0] = 'index';
	}

	if (!isset($_url[0]))
	{
		$_url[0] = 'index';
	}

	if (!file_exists(controller($_url[0])))
	{
		require '404.php';
	}
	else
	{
		require controller($_url[0]);
	}
?>
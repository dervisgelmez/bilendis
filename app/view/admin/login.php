<!DOCTYPE html>
<html>
<head>
	<title>Yönetim</title>
	<link rel="stylesheet" href="<?=asset_url('css/reset.css')?>">
	<style>
		body
		{
			background: #000;
		}
		#loginForm
		{
			display: block;
			width: 300px;
			height: 160px;
			overflow: hidden;
			padding: 20px;
			border-radius: 5px;
			margin:auto;
			margin-top: 200px;
			box-shadow: 0px 0px 50px -5px #555;
			background: #fff; 
		}

		#loginForm input
		{
			display: block;
			float: left;
			width: 90%;
			padding: 10px 5%;
			margin-bottom: 10px;
			border-bottom: 1px solid #ccc;
			background: transparent;
			font-family: sans-serif,Verdana,Tahoma;
			color: #222;
		}
		#loginForm button
		{
			display: block;
			float: right;
			width: 100px;
			height: 40px;
			margin-top: 20px;
			border-radius: 5px;
			font-family: sans-serif;
			font-weight: bold;
			font-size: 15px;
			color: #fff;
			background: #fff;
			color: #222;
			border:1px solid #222;
			line-height: 40px;
			cursor: pointer;
		}
	</style>
</head>
<body>

<div id='loginForm'>
	<form action='' method='POST' >
		<input type='text' name='username' placeholder='kullanıcı adı'>
		<input type='password' name='password' placeholder='parola'>
		<button name='submit' value='1'>giriş</button>
	</form>
</div>


</body>
</html>
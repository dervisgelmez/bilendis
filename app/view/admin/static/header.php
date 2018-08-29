<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
	<meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>
	<title>Yönetim</title>
	<link rel="stylesheet" href="<?=asset_url('css/reset.css')?>">
	<link rel="stylesheet" href="<?=asset_url('css/admin-main.css')?>">
	<link rel="stylesheet" href="<?=asset_url('css/notification.css')?>">
	<script src="<?=asset_url('js/jquery-3.3.1.min.js')?>"></script>
	<script src="<?=asset_url('js/admin-main.js')?>"></script>
	<script type="text/javascript" src="<?= asset_url('js/notification.js') ?>"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>
		tinymce.init({
	  		selector: 'textarea',
	  		height: 220,
	  		theme: 'modern',
	  		plugins: 'preview fullpage autolink fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
	  		toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link image | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
	  		image_advtab: true,
			content_css: [
			    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
			    '//www.tinymce.com/css/codepen.min.css'
			  ]
		 });
	</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
</head>
<body>
<?php 
	require 'static/header.php';
	require 'header.php';
?>
<body>
	<?php echo site_url('app/controller/ajax.php') ?>
	<script>
	function AjaxFunction() 
	{
	    var bilgi = 
	    {
	        id: $('#contentID').val();
	    }

	    $.ajax({
	        type: 'post',
	        url:  "<?=site_url('app/controller/ajax.php') ?>",
	        data: {query: bilgi},
	        success: function(result) {
	            $('#sonuc').html(result);
	        }
	    });
	 
	}
	</script>
	<?php 
		if (url(2) && url(1)) 
		{
			$aid = url(2);
			$ahead = url(1);
			
			$articleQuery = mysqli_query($db,"SELECT * FROM content WHERE id='".$aid."'");
			$arow = mysqli_fetch_row($articleQuery);

			if(permalink($arow[3]) != $ahead && $arow[0]!=$aid)
			{
				header('Location:'.site_url('index'));	
			}
		}

	?>	
	<div id='content'>
		<div class="articleTop">
			<div class="articleHeader"><p><span><?=$arow['4']?></span><?=$arow['3']?></p></div>
			<div class='articleImg' style='background-image: url(<?=asset_url("img/content/".$arow['2'])?>);'></div>
		</div>
		<div class="articleContent"><?=$arow['6']?></div>
	</div>
	<ol class="sharePost">
		<span>+<?=$arow['9']?></span>
		<div id="sonuc">a</div>
		<input type='text' name='contentID' id='contentID' value='10'>
		<li onclick='AjaxFunction()'><i class='fa fa-hand-rock'></i></li>
		<li class='share'><a href=''><i class='fab fa-twitter'></i></a></li>
		<li class='share'><a href=''><i class='fab fa-facebook-f'></i></a></li>
	</ol>
</body>
</html>
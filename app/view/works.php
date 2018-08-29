<?php 
require 'static/header.php';
require 'header.php';
?>

	<div id="content">
		<ol class='workMenu'>
			<li class='select' id='all'>Hepsi</li>
			<li id='design'>Tasarım</li>
			<li id='software'>Yazılım</li>
			<li id='animation'>Video ve Animasyon</li>
			<li id='project'>Proje</li>
		</ol>
		
		<ul class='workContent'>
		<?php 

			$jobQuery = mysqli_query($db,"SELECT * FROM job");
			while ($row = mysqli_fetch_array($jobQuery,MYSQLI_ASSOC))
			{
				echo
				"
					<li class='attach-".typeJob($row['type'])."' title='".$row['company']." ".$row['dates']."'>
						<a target='_blank' href='https://".$row['link']."'>
							<div class='workImg' style='background-image: url(".asset_url('img/job/').$row['image'].");'>
							</div>
						</a>
					</li>
				";
			}

		?>
		</ul>
	
	</div>

<?php require 'static/footer.php' ?>
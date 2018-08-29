<?php 
require 'static/header.php';
require 'header.php';
?>
	<div id="content">
		<ul class='conList'>
			<?php
			
				$queryContent = mysqli_query($db,"SELECT * FROM content");
				while ($crow = mysqli_fetch_array($queryContent,MYSQLI_ASSOC))
				{

					$queryAdmin = mysqli_query($db,"SELECT * FROM users WHERE id='".$crow['authorid']."'");
					$arow = mysqli_fetch_row($queryAdmin);


					echo
					"<li class='".type($crow['type'],0)."'>

						<div class='conAuthor'>
							<div class='authorImg'><img src='".asset_url('img/author/').$arow[7]."')?>' alt=''></div>
							<a href='yönetim/".$arow[1]."'><div class='authorName'>".$arow[2].' '.$arow[3]."</div></a>
						</div>

						<div class='conHeader'>
							<a href='content/".permalink($crow['header'])."/".$crow['id']."'>".$crow['header']."</a>
						</div>

						<div class='conContent'>
							<a href='content/".permalink($crow['header'])."/".$crow['id']."'>".$crow['content']."</a>
						</div>

						<div class='conImg'>
							<a href='content/".permalink($crow['header'])."/".$crow['id']."'>
							<div class='conimg' style='background-image: url(".asset_url('img/content/').$crow['image'].");'></div>
							</a>
						</div>

						<div class='conVideo'>
							<a href='".$crow['url']."'>
							<div style='background-image: url(".asset_url('img/content/').$crow['image'].");'>
							</div>
							<div class='videoShadow'>
								<div class='videoPlay'></div>
								<div class='videoInfo'>
									<span class='videoAuthor'>
										".$arow[2].' '.$arow[3]."
									</span>
									<span class='videoHeader'>
										".$crow['content']."
									</span>
								</div>
							</div>	
							</a>
						</div>

						<div class='conFooter'>
							<span class='cfType'>".type($crow['type'],1)."</span>
							<span class='cfCat'>".strtoupper($crow['category'])."</span>
							<span class='cfDate'>".datetrans($crow['dates'])."</span>
							<p class='cfMore'><a href='content'>".type($crow['type'],2)."</a></p>
						</div>

					</li>";
				}

			?>


		</ul>	
	</div>


<?php require 'static/footer.php' ?>
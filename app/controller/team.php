<?php 
require view('static/header');
require view('header');
?>

	<div id="content">
		<p class="aboutus">
		İstanbul merkezli 2009 doğumlu bir görsel iletişim tasarımı şirketiyiz. İçeriğe göre şekil alıp doğru görsel iletişimi kurmak için çalışıyoruz.
		</p>
		<ul class="team">
		<?php 

			$adminQuery = mysqli_query($db,"SELECT * FROM users");
			while ($row = mysqli_fetch_array($adminQuery,MYSQLI_ASSOC))
			{
				echo 
				"<li>
					<div class='teamImg' style='background-image: url(".asset_url('img/author/').$row['image'].");'></div>
					<div class='teamDesc'>
						<span>".$row['about']."</span>
					</div>	
					<div class='teamInfo' style='background:black'>
						<div class='teamName'>".$row['name']." ".$row['surname']."</div>
						<div class='hr2'></div>
						<div class='teamRelated'>".rankAdmin($row['rank'])."</div>
					</div> ..
				</li>
				";
			}

		?>
		</ul>

		<div class="uswork">
			<p class="aboutus" style='color:#1976D2;font-size: 45px;'>
				Bilendis nasıl işler ? 
			</p>
		</div>
	</div>


<?php require view('static/footer') ?>
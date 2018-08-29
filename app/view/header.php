

	<header> 
		<a href='<?php echo url.'/anasayfa' ?>'><div class="logoSite"></div></a>
		<ol>
			<li><a href='<?php echo url.'/anasayfa' ?>'>İçerik</a></li>
			<li><a href='<?php echo url.'/works' ?>'>Tüm İşler</a></li>
			<li><a href='<?php echo url.'/team' ?>'>Biz</a></li>
			<li><a href='<?php echo url.'/contact' ?>'>İletişim</a></li>	
			<?php 

				if (session('login')) 
				{
					echo "<li style='font-weight:bold;border-color:green;color:#000;'><a href='".url."/admin/index'>Yönetim</a></li>";
				}

			?>
		</ol>
	</header>
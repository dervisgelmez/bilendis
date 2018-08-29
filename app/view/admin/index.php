<?php
require view('admin/static/header');
?>
	
	<div id="ajaxUpload">
		<label for="fileAjax" id='ajaxButton'><i class='fa fa-plus-square'></i>Fotoğraf Yükle</label>
		<input type="file" id="fileAjax" class="ajaxOperation" />
		<div class="ajaxResult">
			<span  onclick="return Kopyala('#Kod')" id='ajaxSpan'> </span>
		</div>
	</div>

	 <script>
    	function Kopyala(element) {
            var $temp = $("<input>")
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
     	};
  	</script>


	<script type="text/javascript">
	$(document).ready(function(){
		
		$('.ajaxOperation').change(function(){
			var _this = $(this);
			
			if ( !_this.val() )
				return false;
			
			var formData = new FormData();    
			formData.append( 'dosyaAdi', _this[0].files[0] );
			
			$.ajax({
				url: "<?=site_url('ajax.php') ?>",
				data: formData,
				processData: false,
				contentType: false,
				type: 'POST',
				success: function(data){
					_this.val('');
					if ( data )
					{
						$('#ajaxSpan').text("assets/img/content/article/"+data);
					} else {
						alert('Yükleme işleminde hata oluştu');
					}
				}
			});
			
			
		});
		
	});
	</script>

	<header>
		<ol>
			<li class='secili'><a href=''><i class=''></i>Content</a></li>
		</ol>
		<a style='float: right;color:yellow;font-family: sans-serif;line-height: 33px;font-size: 13px;padding-right: 10px;' href='<?php echo url."/admin/index/logout" ?>'>çıkış yap</a>
		<a style='float: right;color:lightgreen;font-family: sans-serif;line-height: 33px;font-size: 13px;padding-right: 10px;' href='<?php echo url."/anasayfa" ?>'>siteyi gör</a>
		<span class="date"><?php echo date('d')." ".datemonth(date('m')); ?></span>

	</header>
	<nav>
		<ul>
			<li class='bttn_add_article'>Ekle</li>
			<li class='bttn_edit_article'>Düzenle</li>
		</ul>
	</nav>


	<div id="content">
		
	<?php 

		if (url(2)=="edit")
		{
			$editQuery = mysqli_query($db,"SELECT * FROM content WHERE id='".url(3)."'");
			$row = mysqli_fetch_row($editQuery);
			echo "<div id='form' class='add'>
			<form action='' method='post' enctype='multipart/form-data'>
				<span class='headerForm'>İçerik Türü</span>
				
				<div class='radioCont'>
					<input type='radio' name='type' id='doc' ";

					if($row[1]==0){echo "checked='check'";}

					echo "value='0'>
					<label for='doc'>Döküman</label>

					<input type='radio' name='type' id='video' ";

					if($row[1]==1){echo "checked='check'";}

					echo "value='1'>
					<label for='video'>Video</label>

					<input type='radio' name='type' id='link' ";

					if($row[1]==2){echo "checked='check'";}

					echo "value='2'>
					<label for='link'>Kaynak</label>
				</div>

				<label for='fUpload'>Kapak Fotoğrafı</label>
				<input type='file' id='fUpload' name='upload'>

				<label for='fHeader'>Başlık</label>
				<input type='text' id='fHeader' name='header' value='".$row[3]."'>

				<label for='fCat'>Kategori</label>
				<input type='text' id='fCat' name='category' placeholder='Phton, Java, Teknoloji' value='".$row[4]."'>

				<label for='fLink' class='fLink'>Link</label>
				<input type='text' id='fLink' name='link' placeholder='https://www.medium.com/dervisgelmez/makale-adi' value='".$row[5]."'>
				<label for='fVideo' class='fVideo'>Video URL</label>
				<input type='text' id='fVideo' name='url' placeholder='youtube.com/aSklWe41' value='".$row[5]."'>   

				<div class='editor'>
  					<textarea name='editor'>
  					".$row[6]."
  					</textarea>
  				</div>
				<input type='hidden' name='imgUpload' value='".$row[2]."'>
				<button name='submit' value='2' class='doneButton'>Güncelle</button>
			</form>
		</div>";
		}
	

	?>
		<?php if (url(2)!="edit"): ?>
			
		<div id='form' class='add'>
			<form action='' method='post' enctype='multipart/form-data'>
				<span class='headerForm'>İçerik Türü</span>
				
				<div class='radioCont'>
					<input type='radio' name='type' id='doc' checked='check' value='0'>
					<label for='doc'>Döküman</label>

					<input type='radio' name='type' id='video' value='1'>
					<label for='video'>Video</label>

					<input type='radio' name='type' id='link' value='2'>
					<label for='link'>Kaynak</label>
				</div>

				<label for='fUpload'>Kapak Fotoğrafı</label>
				<input type='file' id='fUpload' name='upload'>

				<label for='fHeader'>Başlık</label>
				<input type='text' id='fHeader' name='header'>

				<label for='fCat'>Kategori</label>
				<input type='text' id='fCat' name='category' placeholder='Phton, Java, Teknoloji'>

				<label for='fLink' class='fLink'>Link</label>
				<input type='text' id='fLink' name='link' placeholder='https://www.medium.com/dervisgelmez/makale-adi'>

				<label for='fVideo' class='fVideo'>Video URL</label>
				<input type='text' id='fVideo' name='url' placeholder='youtube.com/aSklWe41'>   

				<div class='editor'>
  					<textarea name='editor'></textarea>
  				</div>

				<button name='submit' value='1' class='doneButton'>Ekle</button>
			</form>
		</div>
		<?php endif ?>

		<div id="all">
			<ol>
				<?php 

				$queryList = mysqli_query($db,"SELECT * FROM content");
				while ($row = mysqli_fetch_array($queryList,MYSQLI_ASSOC))
				{
					echo 
					"<li>
						<div class='articleNo'>#".$row['id']."</div>
						<div class='articleImg'>
							<img src='".asset_url('img/content/').$row['image']."' alt=''>
						</div>
						<div class='articleHeader'>".$row['header']."</div>
						<div class='articleEdit'>
							<a href='".url.'/admin/index/edit/'.$row['id']."'><i class='fa fa-edit'></i></a>
							<a href='".url.'/admin/index/delete/'.$row['id']."'><i class='fa fa-trash'></i></a>
						</div>
					</li>
					";
				}


				?>
			</ol>
		</div>
	</div>

<?php
require view('admin/static/footer');
?>
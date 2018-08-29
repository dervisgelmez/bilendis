<?php 
if (!session('login') || session('rank')!=1)  
{
	header('Location:'.site_url('index'));
}
else
{
	if (url(2)=="logout")
	{
		session_destroy();
		header('Location:'.site_url('index'));	
	}

	if(url(2)=="delete")
	{
		$deleteQuery = mysqli_query($db,"DELETE FROM content WHERE id='".url(3)."'");
		if($deleteQuery)
		{
			$success = "silindi";
		}
		else
		{
			$error = "silinemedi";
		}
	}

	if(url(2)=="edit")
	{
		$gid = url(3);
		$type = post('type');
		$header = post('header');
		$category = post('category');
		$datec = date('d.m.Y');

		switch ($type) {
			case '1':
				$ttext = post('url');
				break;
			
			default:
				$ttext = post('link');
				break;
		}

		$editor = $_POST['editor'];
		$author = session('userid');

		if ($header!=null && $type!=null && $category!=null && $editor!=" " && $author!=null) 
		{
			$updateQuery = mysqli_query($db,"UPDATE content SET header='".$header."' WHERE id='".$gid."' ");
			if ($updateQuery) 
			{
			    $success = "Gönderi güncellendi.";
			}
		}
		else
		{
			$alert = "Boş alanlar var.";
		}
	}

	if (post('submit')) 
	{
		$type = post('type');
		$header = post('header');
		$category = post('category');
		$datec = date('d.m.Y');

		switch ($type) {
			case '1':
				$ttext = post('url');
				break;
			
			default:
				$ttext = post('link');
				break;
		}

		$editor = $_POST['editor'];
		$author = session('userid');

		if ($header!=null && $type!=null && $category!=null && $editor!=" " && $author!=null) 
		{
			if(isset($_FILES['upload'])){

				$error = $_FILES['upload']['error'];
				
				if($error != 0)
				{
					$error = "Yüklenirken bir hata oluştu";
			   	} 
			    else {

			      $sizeFile = $_FILES['upload']['size'];
			      
			      if($sizeFile > (1024*1024*3))
			      {
			         $alert = 'Dosya 3MB den büyük olamaz.';
			      } 
			      else 
			      {

			         $typeFile = $_FILES['upload']['type'];
			         $nameFile = $_FILES['upload']['name'];
			         $extenFile = explode('.', $nameFile);
			         $extenFile = $extenFile[count($extenFile)-1];

			         if($typeFile != 'image/jpeg' || $extenFile != 'jpg')
			         {
			            $alert = 'Yanlızca JPG dosyaları gönderebilirsiniz.';
			         } 
			         else 
			         {
			            $uploadFile = $_FILES['upload']['tmp_name'];	
			            $nnameFile = session('userid')."mka".date('dmYHis').'.'.$extenFile;
			            $snameFile = dir.'/assets/img/content/'.$nnameFile;
			            copy($uploadFile, $snameFile);

			            if (file_exists($snameFile)) 
			            {
			            	$sqlAdd = "INSERT INTO content(type,image,header,category,url,content,authorid,dates,clap) VALUES('$type','$nnameFile','$header','$category','$ttext','$editor','$author','$datec',0)";
			            	$queryAdd = mysqli_query($db,$sqlAdd);

			            	if ($queryAdd)
			            	{
			            		$success = "Gönderi eklendi.";
			            	}
			            	else
			            	{
			            		$alert = "eklenemedi";
			            	}
			            }
			            else
			            {
			            	$alert = "sorun var.";
			            }
			         }
			      }
			   }
			}
			else
			{
				$alert = "Boş alanlar var.";
			}
		}
		else
		{
			$alert = "Boş alanlar var.";
		}

	}


	require view('admin/index');
	if (isset($alert)){
		echo notif('alert',$alert);
	}
	if (isset($success)) {
		echo notif('success',$success);
	}
}

 ?>
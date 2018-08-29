<?php 
if (url(1)=="send") 
{
	if (post('submit')) 
	{
		if (filter_var(post('cmail'), FILTER_VALIDATE_EMAIL) )
		{ 
			$messageQuery = mysqli_query($db,"INSERT INTO contact(name,subject,mail,content) VALUES('".post('cname')."','".post('csub')."','".post('cmail')."','".post('cmess')."')");
			if ($messageQuery)
			{
				$success = "Mesajınız başarıyla gönderildi.";
			}
			else
			{
				$alert = "Bir sorun oluştu";
			}
		} 
		else 
		{
			$alert = "Girdiğiniz e-posta geçersizdir.";
		}
	}
	else
	{
		header('Location:'.site_url('contact'));
	}
}

	require view('contact');

	if (isset($alert)){
		echo notif('alert',$alert);
	}
	if (isset($success)) {
		echo notif('success',$success);
	}
?>
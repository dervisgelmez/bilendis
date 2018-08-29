<?php 

if (session('login'))
{
	header('Location:'.site_url('admin/index'));
}
else
{
	if (post('submit')) 
	{
		$username = post('username');
		$password = md5(post('password'));

		if (!$username || !$password) 
		{
			$error = 'Tüm alanları doldurun';
		}
		else{

			$queryCheck = mysqli_query($db,"SELECT * FROM users WHERE username='$username' AND password='$password'");
			if (mysqli_num_rows($queryCheck))
			{
				while ($userdb = mysqli_fetch_array($queryCheck,MYSQLI_ASSOC)) 
				{
					session('login', true);
					session('userid', $userdb['id']);
					session('username', $userdb['username']);
					session('rank', $userdb['rank']);
					if (session('login'))
					{
						header('Location:'.site_url('admin/index'));
					}
				}
			}
			else
			{
				echo "bilgiler yanlış";
			}

		}
	}
	else
	{
		require view('admin/login');
	}
}

?>
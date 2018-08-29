<?php 

function controller($name)
{
	return controller.'/'.$name.'.php';
}

function view($name)
{
	return view.'/'.$name.'.php';
}

function type($rank,$why)
{
	if ($why >2) {
		return false;
	}
	else
	{
		switch ($rank) {

			case '0':
				$result[0] = "document";
				$result[1] = "TEXT";
				$result[2] = "Read More";
				break;

			case '1':
				$result[0] = "video";
				$result[1] = "VIDEO";
				$result[2] = "Watch Video";
				break;
			
			default:
				$result[0] = "source";
				$result[1] = "SOURCE";
				$result[2] = "Open Source";
				break;
		}

		return $result[$why];	
	}
}

function datemonth($val)
{
	$getsmonth = array(
		1=>"Ocak",
		2=>"Şubat",
		3=>"Mart",
		4=>"Nisan",
		5=>"Mayıs",
		6=>"Haziran",
		7=>"Temmuz",
		8=>"Ağustos",
		9=>"Eylül",
		10=>"Ekim",
		11=>"Kasım",
		12=>"Aralık"
	);

	if ($val<10) 
	{
		$val = substr($val, 1,1);
	}

	return $getsmonth[$val];
}

function datetrans($val){

	$val = explode('.', $val);
	return datemonth($val[1]).' '.$val[2];
}

function rankAdmin($val)
{
	switch ($val) {
		case '1':
			return "Kurucu Ortağı ve Yazılımcı";
			break;
		
		default:
			return "Yönetici";
			break;
	}
}

function typeJob($val)
{
	switch ($val) {
		case '1':
			return "design";
			break;
		
		default:
			return "design";
			break;
	}
}

?>
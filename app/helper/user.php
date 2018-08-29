<?php

function session($name, $value = null)
{
	if (isset($_SESSION[$name])) {

		return $_SESSION[$name];
	}
	if ($value){
		
		$_SESSION[$name] = $value;
	}
}


function notif($type,$val)
{
	return 
	"
	<div id='notificationBox' class='".$type."'>
		<i class='fa fa-exclamation'></i>
		<span>".$val."</span>
		<div class='closeNot'><i class='fa fa-times'></i></div>
	</div>
	";

	
}

?>
<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');

	include_once("../../../class/_class.php");
	
	if (isset($_GET['callback']))
	{
		$callback = filter_var($_GET['callback'], FILTER_SANITIZE_STRING);
	}

	$obj = new Operations();
	$ccm_id = $obj->get_ccm();
	//echo $obj->get_ccm();

	echo $callback. '('.json_encode($ccm_id).');';
?>
<?php
header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');

	include("../../../class/_class.php");

	if (isset($_GET['callback']))
	{
		$callback = filter_var($_GET['callback'], FILTER_SANITIZE_STRING);
	}
	$obj = new Operations();
	//echo $callback. '('.json_encode($obj->get_ccm()).');';
	echo $callback. '('.json_encode($obj->get_ccm($_REQUEST["shop_code"])).');';
?>
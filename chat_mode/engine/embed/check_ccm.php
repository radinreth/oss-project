<?php
	//echo $_Post['com_id'];
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
	header('Content-Type: application/json; charset=utf8');

	include("../../../class/_class.php");

	if (isset($_GET['callback']))
	{
		$callback = filter_var($_GET['callback'], FILTER_SANITIZE_STRING);
	}
	$obj = new Operations();
	//echo $callback. '('.json_encode($obj->get_ccm()).');';
	echo $callback. '('.json_encode($obj->get_ccm($_GET["com_id"])).');';
?>
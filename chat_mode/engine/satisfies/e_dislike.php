<?php
	
	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');

	include_once("../../../class/_class.php");
	if(session_id() == '') {
		session_start();
	}

	if (isset($_GET['callback']))
	{
		$callback = filter_var($_GET['callback'], FILTER_SANITIZE_STRING);
	}
	
	$opt = new Operations();
	$dislike_success = $opt->dislike($_SESSION['vis_id']);
	
	echo $callback. '('.json_encode($dislike_success).');';
?>
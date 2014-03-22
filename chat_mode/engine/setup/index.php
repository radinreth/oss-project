<?php

	//header('Access-Control-Allow-Origin: *');
	//header('Content-type: application/json');

	include_once("../../../class/_class.php");

	if(session_id() == '') {
		session_start();
	}
	
	// if (isset($_GET['callback']))
	// {
	// 	$callback = filter_var($_GET['callback'], FILTER_SANITIZE_STRING);
	// }

	$opt = new Operations();
	$_SESSION['vis_id'] = $opt->save_user($_REQUEST['name'], $_REQUEST['email']);
	session_write_close();
	
	//echo $_SESSION['vis_id'];
	//echo json_encode($_SESSION['vis_id']);
	//----------------------

	//echo $callback. '('.json_encode(array('a'=>1, 'b' => 2)).');';
	//echo $callback. '('.json_encode($_SESSION['vis_id']).');';
	//echo $callback. '('.json_encode($_SESSION['vis_id']).');';
	echo json_encode($_SESSION['vis_id']);
?>
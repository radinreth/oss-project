<?php


	include_once("../../../class/_class.php");
	if(session_id() == '') {
			session_start();
	}
	
	

	$opt = new Operations();
	$like_success = $opt->like($_SESSION['vis_id']);
	
	echo json_encode($like_success);
?>
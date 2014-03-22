<?php

	include_once("../../../class/_class.php");
	if(session_id() == '') {
		session_start();
	}

	
	$opt = new Operations();
	$dislike_success = $opt->dislike($_SESSION['vis_id']);
	
	echo json_encode($dislike_success);
?>
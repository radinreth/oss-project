<?php
include_once("../../../class/_class.php");
session_start();
session_write_close();

$obj = new Operations();

if($_POST['type']=='reject'){
	$result = $obj->request_reject($_POST['swq_id']);
	//echo $result;
	if($result==1)
		echo "Request rejected!";
	else
		echo "Rejected fail!";
}else if($_POST['type']=='accept'){
	$result = $obj->request_accept($_POST['swq_id'], $_POST['vis_id'], $_POST['swq_requester'], $_POST['swq_responder']);
	//echo $result;
	if($result==1)
		echo "Request accept!";
	else
		echo "Accept fail!";
}else{
	$responder = $_POST['responder'];
	//$obj->return_array("*","tbl_switching_requests", "where responder = '$responder' and swq_status=0");
	
	//$query = $obj->return_array("*","tbl_switching_requests", "where swq_status <> -1 and swq_responder = '".$_SESSION['ccm_id']."'");
	$query = $obj->return_array("*","tbl_switching_requests", "where swq_status = 0 and swq_responder = '".$_SESSION['ccm_id']."'");
	sleep(1);
	$arr = array();
	$i = 0;
	
		while($row = mysql_fetch_assoc($query)){
			$arr[$i] = array();
			
			$arr[$i]['swq_id'] = $row['swq_id'];
			$arr[$i]['swq_requester'] = $row['swq_requester'];
			$arr[$i]['vis_id'] = $row['vis_id'];
			$arr[$i]['swq_responder'] = $row['swq_responder'];
			$arr[$i]['swq_memo'] = $row['swq_memo'];
			
			$i++;
		}
	
	echo json_encode($arr);
}
?>
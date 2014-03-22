<?php
include_once("../../../class/_class.php");

$requester = $_POST['requester'];
$vis_id = $_POST['vis_id'];
$responder = $_POST['responder'];
$memo = $_POST['memo'];
$status = $_POST['status'];

$obj = new Operations();
//echo "requester: {$requester}, responder: {$responder}, memo: {$memo}, status: {$status}";
$result = $obj->send_request($requester,$vis_id,$responder,$memo,$status);

if($result == 1)
	echo "Request sent!";
else
	echo "Fail to sent request!";
?>
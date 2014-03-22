<?php
include '../class/class.php';
if(isset($_POST['txtemail'])){
	$text_email=$_POST['txtemail'];
	$txtpass=$_POST['txtpassword'];
	$position=$_POST['RadioGroup1'];
	$obj->login($text_email,$txtpass,$position);
}
if(isset($_POST['txtfullname'])){
	$text_fulname=$_POST['txtfullname'];
	$txtemail=$_POST['txtemail_sig'];
	$password=$_POST['txtpassword_sig'];
	$package=$_POST['txt_package'];
	$obj->Buy_now($text_fulname,$txtemail,$password,$package);
}
?>
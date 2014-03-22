<?php 
include '../../class/class.php';
if(isset($_POST['txt_brandname'])){
	$txt_brandname=$obj->clean($_POST['txt_brandname']);
	$txt_phone=$obj->clean($_POST['txt_phone']);
	$txt_website=$obj->clean($_POST['txt_website']);
	$txt_email=$obj->clean($_POST['txt_email']);
	$txt_description=$obj->clean($_POST['txt_description']);
	$txt_address=$obj->clean($_POST['txt_address']);
	$com_logo=$_SESSION['shop_logo'];
	$user_id=$_SESSION['id_operator'];
	$latitude=$obj->clean($_POST['latitude']);
	$longitude=$obj->clean($_POST['longitude']);
	$sql="Insert into ".TABLE_COMPANY."(com_id,user_id,com_logo,com_website,com_branch,com_describtion,com_address,late,longitued,com_email,com_phone,com_enabled) values('','$user_id','$com_logo','$txt_website','$txt_brandname','$txt_description','$txt_address','$latitude','$longitude','$txt_email','$txt_phone','1')";
	//echo $sql;
	$obj->Runsql($sql);
}
if(isset($_POST['txt_brandname_update'])){
	$txt_brandname=$obj->clean($_POST['txt_brandname_update']);
	$txt_phone=$obj->clean($_POST['txt_phone']);
	$txt_website=$obj->clean($_POST['txt_website']);
	$txt_email=$obj->clean($_POST['txt_email']);
	$txt_description=$obj->clean($_POST['txt_description']);
	$txt_address=$obj->clean($_POST['txt_address']);
	$com_logo=$_SESSION['shop_logo'];
	$user_id=$_SESSION['id_operator'];
	$latitude=$obj->clean($_POST['latitude']);
	$longitude=$obj->clean($_POST['longitude']);
	if($com_logo!=''){
	$sql="Update ".TABLE_COMPANY." set com_logo='$com_logo',com_website='$txt_website',com_branch='$txt_brandname',com_describtion='$txt_description',com_address='$txt_address',late='$latitude',longitued='$longitude',com_email='$txt_email',com_phone='$txt_phone' where user_id='$user_id'";
	}else{
		$sql="Update ".TABLE_COMPANY." set com_website='$txt_website',com_branch='$txt_brandname',com_describtion='$txt_description',com_address='$txt_address',late='$latitude',longitued='$longitude',com_email='$txt_email',com_phone='$txt_phone' where user_id='$user_id'";
	}
	//echo $sql;
	$obj->Runsql($sql);
}
if(isset($_POST['txt_description_pro'])){
	$promotion_img=$_SESSION['shop_promotion'];
	$promotion_des=$_POST['txt_description_pro'];
	$opt_id=$_SESSION['id_operator'];
	//echo $opt_id;
	$company_id=$obj->convert_idto_other(TABLE_COMPANY,'user_id','com_id',$opt_id);
	$sql="Insert into ".TABLE_PROMOTION."(prm_id,prm_image,describtion,prm_status,com_id) values('','$promotion_img','$promotion_des','1','$company_id')";
	//echo $sql;
	$obj->Runsql($sql);
}
if(isset($_POST['confirm_btn'])){
	$user_id=$_POST['user_id'];
	$sql="update ".TABLE_USER." set status='1' where user_id='$user_id'";
	$obj->Runsql($sql);
}
if(isset($_POST['disable_btn'])){
	$user_id=$_POST['user_id'];
	$sql="update ".TABLE_USER." set status='2' where user_id='$user_id'";
	$obj->Runsql($sql);
}
if(isset($_POST['remove_pro_btn'])){
	$pormotion_id=$_POST['pormotion_id'];
	$sql="update ".TABLE_PROMOTION." set prm_status='0' where prm_id='$pormotion_id'";
	$obj->Runsql($sql);
}
?>
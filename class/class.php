<?php
//if(session_id() == '') {
session_start();
ob_start();
//}
include 'define.php';
 class Mycls{
           public function Mycls(){
                 $this->Openconnection(); 
           }
           function Openconnection(){
                  mysql_connect(HOST,SERVER,PASSWORD) or die("Error while connect to server!");
                  mysql_select_db(DATABASE) or die("Error while connect to database!");
           }
		   function check_email($email){// new function
			   $query=mysql_query("Select user_email from ".TABLE_USER." where user_email='$email'");
			   //echo "Select user_email from ".TABLE_USER." where user_email='$email'";
			   $num_row=mysql_num_rows($query);
			   return $num_row;
		   }
           function clean($str) {
                    $str = @trim($str);
                    if(get_magic_quotes_gpc()) {
                        $str = stripslashes($str);	
                    }
					$str=addslashes($str);
					$str=strip_tags($str);
                    return mysql_real_escape_string($str);
            }
			
           function Buy_now($name,$email,$pass,$package){
                        $fullname= $this->clean($name);  
                        $email=$this->clean($email);
                        $password=md5($this->clean($pass));

						$ip_addr=$_SERVER['REMOTE_ADDR'];
						if($package!=0){
							$status='0';
							$expired_date=date('Y-m-d', strtotime(date('Y-m-d') . " +365 days"));
						}else{
							$status='1';
							$expired_date=date('Y-m-d', strtotime(date('Y-m-d') . " +60 days"));
							
						}
                        //$confrimCode=md5(uniqid(rand()));
                        $sql="Insert into ".TABLE_USER."(user_id,user_name,user_email,password,package,expired_date,user_phone,ip_address,user_type,photo,status) 
						values('','$fullname','$email','$password','$package','$expired_date','000000000','$ip_addr','admin','defaul_photo.png',$status)";

                        if (mysql_query($sql)){
							$_SESSION['new_reg']='1';
							echo 'true';
							// $message="Your comfirme link\r\n";
//                                $message.="Click your link below to active your account!";
//                                $message.="http://beta.thmey365.com/include/All/confirm.php?passkey=$confrimCode";
//                                $sendemail=mail($email,'Registation Comfirmation',$message);
//                             if($sendemail){
//                                    echo 'true';
//                             }else{
//                                   
//                                    $sql="Delete from ".TABLE_MEMBER." where comfirm_key='$confrimCode'";
//                                    mysql_query($sql);
//									echo $sql;
//                                	echo 'false';
//                             }

                        }else{
                            echo $sql.mysql_error();
                        }
           }
		   function return_single($field, $table, $condition){
			   $sql = "select * from $table where $condition";
			   $query = mysql_query($sql);
			   $fetch = mysql_fetch_array($query);
			   return $fetch[$field];
		   }
           public function login($email,$pass,$position){ 
						//echo $position;
                     	$email=$this->clean($email);
                     	$pass=md5($this->clean($pass));
                     	$position=$this->clean($position);
						//echo $position;echo $email;echo $pass;
						//exit();
						if($position=='1'){
							//echo $_SESSION['id_counter'];
							if(!isset($_SESSION['id_system']) && !isset($_SESSION['id_operator']) && !isset($_SESSION['id_counter']) ){
							//echo "counter";
							 $sql1="Select * from ".TABLE_COUNTER." where ccm_email='$email' and password='$pass'";
							 $result1=mysql_query($sql1);
							 $num=mysql_num_rows($result1);
							 if($num>0){
								 
								 $sql="Select * from ".TABLE_COUNTER." where ccm_email='$email' and password='$pass' and ccm_status='1' and chat_status='1'" ;
								 $result=mysql_query($sql);
								 $num=mysql_num_rows($result);
								 if($num>0){
									 		$row=mysql_fetch_array($result);
											
									 		$sql2="update ".TABLE_COUNTER." set online_status='1' where ccm_id='".$row['ccm_id']."'";
											mysql_query($sql2);
											$sql_online = "Select * from ".TABLE_COUNTER." where ccm_email='$email' and password='$pass' and ccm_status='1' and chat_status='1' and online_status='1'" ;
											$query_online = mysql_query($sql_online);
											$fetch_online = mysql_fetch_array($query_online);
											$_SESSION['ccm_id'] = $fetch_online['ccm_id'];
										   //$result=mysql_query($sql);
										   $now_dat=date("Y-m-d H:i:s");
										   $ccm_id=$row['ccm_id'];
										   $sql4="Insert into ".TRACTCOUNTER."(log_id,ccm_id,login_date) values('','$ccm_id','$now_dat')";
										   mysql_query( $sql4);
										   
										   $_SESSION['id_counter']=$row['ccm_id'];
										   //$_SESSION['ccm_id'] = $row['ccm_id'];
										   $_SESSION['name']=$row['ccm_name'];
										   $_SESSION['photo']=$row['photo'];
										   $_SESSION['position_counter']='1';
										   $_SESSION['package']='0';
										   echo 'true';
										   
								 }else{
									 //disable account
									 $_SESSION['atemp_log']=$_SESSION['atemp_log']+1;
									 echo 'status';
								 }
							 }else{
								 $_SESSION['atemp_log']=$_SESSION['atemp_log']+1;
								 echo 'pass';
							 }
						
							}else{
								echo "exist";
							}
						}
						
						else if($position=='3'){
							
							
							if(!isset($_SESSION['id_counter']) && !isset($_SESSION['id_operator']) && !isset($_SESSION['id_system'])){
							$username=$email;
								//echo "Admin system";
							 $sql1="Select * from ".TABLE_ADMIN." where sys_username='$username' and sys_password='$pass'";//email=username for admin 
							 $result1=mysql_query($sql1);
							 $num=mysql_num_rows($result1);
							 if($num>0){
								 $sql="Select * from ".TABLE_ADMIN." where sys_username='$username' and sys_password='$pass' and sys_status='1'" ;
								 //echo 'sql: '.$sql; exit();
								 $result=mysql_query($sql);
								 $num=mysql_num_rows($result);
								 if($num>0){
									 
										   $result=mysql_query($sql);
										   $row=mysql_fetch_array($result);
										   $_SESSION['id_system']=$row['sys_id'];
										   $_SESSION['name']=$row['sys_fname'];
										   $_SESSION['photo']=$row['sys_photo'];
										   $_SESSION['position']='3';
										   $_SESSION['package']='0';
										   echo 'true';
										   
								 }else{
									 //disable account
									 $_SESSION['atemp_log']=$_SESSION['atemp_log']+1;
									 echo 'status';
								 }
							 }else{
								 $_SESSION['atemp_log']=$_SESSION['atemp_log']+1;
								 echo 'pass';
							 }
						
							}else{
								echo "exist";
							}
						}
						
						else{
							if(!isset($_SESSION['id_counter']) && !isset($_SESSION['id_system']) && !isset($_SESSION['id_operator'])){
							//echo "operater";
							 $sql1="Select * from ".TABLE_USER." where user_email='$email' and password='$pass'"; 
							 $result1=mysql_query($sql1);
							 $num=mysql_num_rows($result1);
							 if($num>0){
								 $sql="Select * from ".TABLE_USER." where user_email='$email' and password='$pass' and status='1'" ;
								 $result=mysql_query($sql);
								 $num=mysql_num_rows($result);
								 if($num>0){
									 
										   $result=mysql_query($sql);
										   $row=mysql_fetch_array($result);
										   $_SESSION['id_operator']=$row['user_id'];
										   $_SESSION['name']=$row['user_name'];
										   $_SESSION['photo']=$row['photo'];
										   $_SESSION['position_opterator']='2';
										   $_SESSION['package']=$row['package'];

										   $_SESSION['expired_date']=$row['expired_date'];
										   $_SESSION['reg_date']=$row['register_date'];

										   echo 'true';
										   
								 }else{
									 //disable account
									$_SESSION['atemp_log']=$_SESSION['atemp_log']+1;
									 echo 'status';
								 }
							 }else{
								 $_SESSION['atemp_log']=$_SESSION['atemp_log']+1;
								 echo 'pass';
							 }
						
						
							}else{
								echo "exist";
							}
						}
           }
           public function logout(){
			   //==add =======
			   session_start();
			   ob_start();
			   //====end add=====
			   if($_SESSION['position_counter']=='1'){
				   	$sql="Update ".TABLE_COUNTER." set online_status='0' where ccm_id='".$_SESSION['id_counter']."'";
				   	mysql_query($sql);
					$now_dat=date("Y-m-d H:i:s");
					
					$last_ccm_record = mysql_query("SELECT max(log_id) FROM tbl_trackcounter WHERE ccm_id='".$_SESSION['id_counter']."'");
					$fetch_last_ccm_record = mysql_fetch_array($last_ccm_record);
					$sql="Update ".TRACTCOUNTER." set logout_date='$now_dat' where ccm_id='".$_SESSION['id_counter']."' and log_id='".$fetch_last_ccm_record["max(log_id)"]."'";
				   	mysql_query($sql);
					
				   	session_destroy();
			   }else if($_SESSION['position_opterator']=='2'){
				   	session_destroy();
			   }else{
				   	session_destroy();
			   }
               return 'true';
           }
           public function Runsql($sql){
                 if(mysql_query($sql)){
                     echo 'true';
                 }else{
                     echo 'false'.mysql_error();
                 }
               
           }
		   //-------------Report ------------
		   function Total_counter_chate_monthly($count_id){
			   
			   $dat_now=date('Y-m-d');
			   $timestamp = strtotime($dat_now);
			   $month=date("m", $timestamp)-1;

			   for($i=$month;$i>=0;$i--){
				   
				    $current_month=date('m');
    				$current_year=date('Y');
					$lastmonth=$current_month-$i;
					$firstdate= $current_year."-".$lastmonth."-01";
    				$lastdateofmonth=date('t',$lastmonth);
    				$lastdate=$current_year."-".$lastmonth."-".$lastdateofmonth ;
					$month_arr[]=$firstdate." ".$lastdate;
					
			  	}
			   $multiple_arraya=array(array("Month","Chated","Missed"));
			   $k=1;
			   for($j=0;$j<=count($month_arr)-1;$j++){
				   
				   $date=explode(" ",$month_arr[$j]);
				   $start_date=$date[0];
				   $end_date=$date[1];
					//all shop register
					$sql="Select DISTINCT vis_id from ".TABLE_CHART." where add_datetime>='$start_date' and add_datetime<'$end_date' and ccm_id='$count_id' and reply_status='0'";
					//echo $sql;
					$result=mysql_query($sql);
					$count_missed=mysql_num_rows($result);
					//shop free register;
					$sql="Select DISTINCT vis_id from ".TABLE_CHART." where add_datetime>='$start_date' and add_datetime<'$end_date' and ccm_id='$count_id' and reply_status='1'";
					
					$result=mysql_query($sql);
					$count_chated=mysql_num_rows($result);
					
					$total_missed=$total_missed+$count_missed;
					$total_chated=$total_chated+$count_chated;
					$total=$total_missed+$total_chated;
					if($total_missed==0)
						$avg_quality = 0 ;
					else
						$avg_quality=$total_chated/$total_missed;
					$total_quality=$avg_quality+$total_quality;
					
					$month_count[]=date('M', mktime(0, 0, 0, $j+1, 1, 2000));
					$month_count[]=$count_chated;
					$month_count[]=$count_missed;
					$_SESSION['avg_miss']=round(($total_missed/($j+1)),2);
					
					if($total==0)
						$_SESSION['avg_quality'] = 0;
					else
						$_SESSION['avg_quality']=($total_chated/$total/($j+1))*100;
					
					$multiple_arraya[]=$month_count;
					
					unset($month_count);
					
			   }
			 // print_r($multiple_arraya);
			   return $multiple_arraya;

		   }
		   function Total_coulnter_chated_miss($counter_id,$type){
			   $sql="Select DISTINCT vis_id from ".TABLE_CHART." where ccm_id='$counter_id' and reply_status='$type'";
			   //echo $sql;
					$result=mysql_query($sql);
					$count_chated=mysql_num_rows($result);
					return $count_chated;
		   }
		   
		   function Total_counter_register_monthly(){
			   
			   $dat_now=date('Y-m-d');
			   $timestamp = strtotime($dat_now);
			   $month=date("m", $timestamp)-1;

			   for($i=$month;$i>=0;$i--){
				   
				    $current_month=date('m');
    				$current_year=date('Y');
					$lastmonth=$current_month-$i;
					$firstdate= $current_year."-".$lastmonth."-01";
    				$lastdateofmonth=date('t',$lastmonth);
    				$lastdate=$current_year."-".$lastmonth."-".$lastdateofmonth ;
					$month_arr[]=$firstdate." ".$lastdate;
					
			  	}
			   $multiple_arraya=array(array("Month","Free","Premiume","Golden"));
			   $k=1;
			   for($j=0;$j<=count($month_arr)-1;$j++){
				   
				   $date=explode(" ",$month_arr[$j]);
				   $start_date=$date[0];
				   $end_date=$date[1];
					//all shop register
					$sql="Select *from ".TABLE_USER." where register_date>='$start_date' and register_date<'$end_date' and package='0'";
					//echo $sql;
					$result=mysql_query($sql);
					$count_free=mysql_num_rows($result);
					//shop free register;
					$sql="Select *from ".TABLE_USER." where register_date>='$start_date' and register_date<'$end_date' and package='1'";
					$result=mysql_query($sql);
					$count_premium=mysql_num_rows($result);
					
					$sql="Select *from ".TABLE_USER." where register_date>='$start_date' and register_date<'$end_date' and package='2'";
					$result=mysql_query($sql);
					$count_golden=mysql_num_rows($result);
					
					$month_count[]=date('M', mktime(0, 0, 0, $j+1, 1, 2000));
					$month_count[]=$count_free;
					$month_count[]=$count_premium;
					$month_count[]=$count_golden;
					$total_month=$count_free+$count_premium+$count_golden;
					$total_opt=$total_opt+$total_month;
					$_SESSION['total_opt']=$total_opt;
					$multiple_arraya[]=$month_count;
					
					unset($month_count);
					
			   }
			 // print_r($multiple_arraya);
			   return $multiple_arraya;

		   }
		   function Total_chat_report_yearly($count_id){
			  // $shop_id=$_SESSION['shop_id'];
			   
			   $dat_now=date('Y-m-d');
			   $timestamp = strtotime($dat_now);
			   $year_now=date("Y", $timestamp);
			   
			  	// $register_shop=$this->convert_id_toAll(TABLE_SHOP,sh_id,register_date,$shop_id);
			   //$timestamp_shop = strtotime($register_shop);
			   
			   $year_reg='2014-01-01';
			   $during_date=$year_now-$year_reg;
			   
			   for($i=0;$i<=$during_date;$i++){
				   	$year_show=$year_now-$i;
					$firstdate= $year_show."-01-01";
    				$lastdate=$year_show."-12-31";
					$year_arr[]=$firstdate." ".$lastdate;	
			  	}
			  $multiple_arraya=array(array("Year","Chated","Missed"));
			   for($j=count($year_arr)-1;$j>=0;$j--){
				   
				   $date=explode(" ",$year_arr[$j]);
				   $start_date=$date[0];
				   $timestamp_shop = strtotime($start_date);
			   	   $year_data=date("Y", $timestamp_shop);
				   
				   $end_date=$date[1];
				   
				   $sql="Select DISTINCT vis_id from ".TABLE_CHART." where add_datetime>='$start_date' and add_datetime<'$end_date' and ccm_id='$count_id' and reply_status='0'";
					//echo $sql;
					$result=mysql_query($sql);
					$count_missed=mysql_num_rows($result);
					//shop free register;
					$sql="Select DISTINCT vis_id from ".TABLE_CHART." where add_datetime>='$start_date' and add_datetime<'$end_date' and ccm_id='$count_id' and reply_status='1'";
					$result=mysql_query($sql);
					$count_chated=mysql_num_rows($result);
					
					
					//echo $sql;
					$year_count[]=$year_data;
					
					$year_count[]=$count_chated;
					$year_count[]=$count_missed;
					
					$multiple_arraya[]=$year_count;
					unset($year_count);
                    unset($date);
					
			   }
			 // print_r($multiple_arraya);
			   return $multiple_arraya;

		   }
		   function get_shop_detial($shop_id){
			   $sql="select *from ".TABLE_COMPANY." where com_id='$shop_id'";
			   $query=mysql_query($sql);
			   return mysql_fetch_array($query);
		   }
		   function Total_counter_finace_monthly(){
			   $dat_now=date('Y-m-d');
			   $timestamp = strtotime($dat_now);
			   $month=date("m", $timestamp)-1;

			   for($i=$month;$i>=0;$i--){
				    $current_month=date('m');
    				$current_year=date('Y');
					$lastmonth=$current_month-$i;
					$firstdate= $current_year."-".$lastmonth."-01";
    				$lastdateofmonth=date('t',$lastmonth);
    				$lastdate=$current_year."-".$lastmonth."-".$lastdateofmonth ;
					$month_arr[]=$firstdate." ".$lastdate;
					
			  	}
			   $multiple_arraya=array(array("Month","Premium","Golden"));
			   $k=1;
			   for($j=0;$j<=count($month_arr)-1;$j++){
				   
				   $date=explode(" ",$month_arr[$j]);
				   $start_date=$date[0];
				   $end_date=$date[1];
				   
					//shop free register;
					$sql="Select *from ".TABLE_USER." where register_date>='$start_date' and register_date<'$end_date' and package='1'";
					$result=mysql_query($sql);
					$count_premium=mysql_num_rows($result);
					
					$sql="Select *from ".TABLE_USER." where register_date>='$start_date' and register_date<'$end_date' and package='2'";
					$result=mysql_query($sql);
					$count_golden=mysql_num_rows($result);
					//echo $sql;
					//echo $count_golden;
					//$total_inc=$count_premium+$count_golden;
					$month_count[]=date('M', mktime(0, 0, 0, $j+1, 1, 2000));
					$month_count[]=$count_premium*39;
					$month_count[]=$count_golden*55;
					
					$total_month=$count_premium*39+$count_golden*55;
					$total=$total+$total_month;
					$_SESSION['total_income']=$total;
					$multiple_arraya[]=$month_count;
					
					unset($month_count);
					
			   }
			 // print_r($multiple_arraya);
			   return $multiple_arraya;

		   }
		   function Total_active_account(){
			$sql="Select *from ".TABLE_USER." where status='1'";
			$result=mysql_query($sql);
			$active_reg=mysql_num_rows($result);
			return $active_reg;
		   }
		   function Total_disactive_account(){
			$sql="Select *from ".TABLE_USER." where status='0'";
			$result=mysql_query($sql);
			$active_reg=mysql_num_rows($result);
			return $active_reg;
		   }
           
            /*++++++++++++++++leang+++++++++++++++++*/
           function l_saveUsers($con='insert',$condition=''){                
               $user_id='';
               $user_name=$this->user_name;
			   $opt_id=$this->opt_id;
               $user_gender=$this->user_gender;
               $user_phone=$this->user_phone;
               $user_email=$this->user_email;
			   $password=$this->password;
               $photo=$this->photo;
               $status=$this->status;
               $register_date=$this->register_date=date('Y-m-d H:m:s');
               $chat_status=$this->chat_status;
			   
               $table=TABLE_COUNTER;
                  if($con=='insert'){

                  		$sql="insert into ".$table."(ccm_id,user_id,ccm_name,gender,ccm_phone,ccm_email,password,

											   photo,ccm_status,add_datetime,chat_status)
                          values('".$user_id."',
								'".$opt_id."',
                                '".$user_name."',
                                '".$user_gender."',
                                '".$user_phone."',
                                '".$user_email."',
                                '".$password."',
								 '".$photo."',
                                '".$status."',
								'".$register_date."',
                                '".$chat_status."'
								)";
                                //echo $sql;
								$num_row=$this->check_new_opt($_SESSION['id_operator']);
		   							if($_SESSION['package']==0){
			   							if($num_row<3){
                    						mysql_query($sql);
										}else{
											echo "Your maximum to create";
											exit();
										}
									}
									if($_SESSION['package']==1){
			   							if($num_row<10){
                    						mysql_query($sql);
										}else{
											echo "Your maximum to create";
											exit();
										}
									}
									if($_SESSION['package']==2){
			   							if($num_row<20){
                    						mysql_query($sql);
										}else{
											echo "Your maximum to create";
											exit();
										}
									}
						
                }
                if($con=='delete'){
                    $sql="delete from ".$table." ".$condition;
                    mysql_query($sql);
					header("loccation:./");
                }
                if($con=='update'){
					if($photo!=""){
						
							$sql="update ".$table." set
									ccm_name='$user_name',
									gender='$user_gender',
									ccm_phone='$user_phone',
									ccm_email='$user_email',
									photo='$photo',
									ccm_status='$status',
									add_datetime='$register_date',
									chat_status='$chat_status' ".$condition."";
					}else{
						
							$sql="update ".$table." set
									ccm_name='$user_name',
									gender='$user_gender',
									ccm_phone='$user_phone',
									ccm_email='$user_email',
									ccm_status='$status',
									add_datetime='$register_date',
									chat_status='$chat_status' ".$condition."";	
					}
                            //echo $sql;
                            //exit;
                            mysql_query($sql);
                }

               
            }
    //-- for general upload
    	   function l_upload($str_tem_name,$str_name,$str_path){
			if($str_name!=""){
				$new_name=date("dmYHis").$str_name;//day month year hour minute second
				move_uploaded_file($str_tem_name,$str_path.$new_name);
				return $new_name;
			}
		
    }
    function l_returnSingle($field,$table,$condition){
        $str_sql="select ".$field." from ".$table." ".$condition;
        $sql=mysql_query($str_sql);
        if(!empty($sql)){
            $row=mysql_fetch_array($sql);
            return $row[0];
        }
    }
    //-- to return signle field from database
    function l_returnBoolean($field,$table,$condition){
        $str_sql="select ".$field." from ".$table." ".$condition;
        $sql=mysql_query($str_sql);
        if(!empty($sql)){
            $row=mysql_fetch_array($sql);
            return ($row[0]!=''?'true':'false');
        }else{
            return 'false';    
        }
    }
    //-- to return how result from mysql_query
    function l_returnArray($field,$table,$condition){
        $str_sql="select ".$field." from ".$table." ".$condition;
        //echo $sql;
        $sql=mysql_query($str_sql);
        if(!empty($sql)){
            return $sql;
        }
    }
    //-- to return array of one row record
    function l_returnArrayRow($field,$table,$condition){
        $str_sql="select ".$field." from ".$table." ".$condition;
        $sql=mysql_query($str_sql);
        //echo $str_sql;
        //exit();
        if(!empty($sql)){
            $row=mysql_fetch_array($sql);
            return $row;
        }
    }
	function convert_idto_other($table,$field_id,$fied_return,$value_id){
		$sql="Select ".$fied_return." from ".$table." where ".$field_id."='$value_id'";
		$query=mysql_query($sql);
		$num_row=mysql_num_rows($query);
		if($num_row>0){
			$result=mysql_fetch_array($query);
			return $result[$fied_return];
		}else{
			return 'None';
		}
	}
	//==============valeak=====
	function SendEmail($fullname,$email,$subject,$message,$to='voleakvoeun@gmail.com'){
				$greeting='Hi '.$fullname;
				$message=$greeting."\n".$message;
				if(mail($to,$subject,$message)) {
				     $_SESSION["error_message"]="Email sent successfully!";
				} else {
					$_SESSION["error_message"]="Failure Email was not sent!";
				}
	}
	public function ReturnArray($sql){
             // echo $sql;
              $result=mysql_query($sql);
              //$num=mysql_num_rows($result);
              if(!empty($result)){
                $arr=mysql_query($sql);
              }else{
                $arr='';
              }
              return $arr;
   }
   function get_satify($count_id){
	   $sql="select *from ".SATISFIES." where ccm_id='$count_id' and sat_like='1'";
	   $query=mysql_query($sql);
	   $num_row=mysql_num_rows($query);
	   return $num_row;
   }
   //update function 22-03-2014
   function check_new_opt($opt_id){
	   $sql="Select *from ".TABLE_COUNTER." where user_id='$opt_id'";
	   $query=mysql_query($sql);
	   $num_row=mysql_num_rows($query);
	   return $num_row;
   }
   function check_new_company($opt_id){
	   $sql="Select *from ".TABLE_COMPANY." where user_id='$opt_id'";
	   $query=mysql_query($sql);
	   $num_row=mysql_num_rows($query);
	   return $num_row;
   }
   function check_expird_date($opt_id){
	   $now=date("Y-m-d");
	   $sql="Select expired_date from ".TABLE_USER." where user_id='$opt_id' and expired_date >='$now'";
	   $query=mysql_query($sql);
	   $num_row=mysql_num_rows($query);
	   return $num_row;
   }
   function ccm_available($ccm_id){
	   $sql="Select *from ".TRACTCOUNTER." where ccm_id='$ccm_id' and logout_date!='0000-00-00 00:00:00'";
	   $query=mysql_query($sql);
	   $num_row=mysql_num_rows($query);
	   if($num_row>0){
		   $diff=0;
		   while($counter=mysql_fetch_array($query)){
			   
			   $diff += abs(strtotime($counter['logout_date']) - strtotime($counter['login_date']));
			   
			   
		   }
		   		
		   		$hour = floor($diff/3600);
			   $minute = floor(($diff-($hour*3600))/60);
			   $second = $diff - ($hour*3600) - ($minute*60);
		   return  "$hour H $minute Mn $second s";
	   }else{
		   return 0;
	   }
   }

	//==============end vorleak===========
 }
 $obj=new Mycls();
?>
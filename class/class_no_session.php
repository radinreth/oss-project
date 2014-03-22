<?php


include 'define.php';
 class Mycls{
           public function Mycls(){
                 $this->Openconnection(); 
           }
           function Openconnection(){
                  mysql_connect(HOST,SERVER,PASSWORD) or die("Error while connect to server!");
                  mysql_select_db(DATABASE) or die("Error while connect to database!");
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
			function clean_comment($str) {
                    $str = @trim($str);
                    if(get_magic_quotes_gpc()) {
                        $str = stripslashes($str);	
                    }
                    return mysql_real_escape_string($str);
            }
           public function Rigister($firstname,$lastname,$email,$pass,$gender){
                        $firstname= $this->clean($firstname);
                        $lastname= $this->clean($lastname);
                        
                        $email=$this->clean($email);
                        $password=md5($this->clean($pass));
                        $gender=$this->clean($gender); 
                        $register_date=date("Y-m-d");
						
                        $status='0';
                        $confrimCode=md5(uniqid(rand()));
                        $sql="Insert into ".TABLE_MEMBER."(member_id, member_firstname,member_lastname, member_gender,member_email,member_password,register_date,comfirm_key,status)
                                values('','$firstname','$lastname','$gender','$email','$password','$register_date','$confrimCode',$status)";
                        if (mysql_query($sql)){
							
                                $message="Your comfirme link\r\n";
                                $message.="Click your link below to active your account!";
                                $message.="http://beta.thmey365.com/include/All/confirm.php?passkey=$confrimCode";
                                $sendemail=mail($email,'Registation Comfirmation',$message);
                             if($sendemail){
                                    echo 'true';
                             }else{
                                    echo 'false';
                                    $sql="Delete from ".TABLE_MEMBER." where comfirm_code='$confrimCode'";
                                    mysql_query($sql);
                               
                             }
                        }else{
                            echo $sql.mysql_error();
                        }
           }
           public function login($email,$pass){ 

                    
                     $email=$this->clean($email);
                     $pass=md5($this->clean($pass));
                     
                         $sql1="Select * from ".TABLE_MEMBER." where member_email='$email' and member_password='$pass'"; 
                         $result1=mysql_query($sql1);
                         $num=mysql_num_rows($result1);
                         //echo $sql1;
                         if($num>0){
                             $sql="Select * from ".TABLE_MEMBER." where member_email='$email' and member_password='$pass' and status='1'" ;
                             $result=mysql_query($sql);
                             $num=mysql_num_rows($result);
                             if($num>0){
                                 
                                       $result=mysql_query($sql);
                                       $row=mysql_fetch_array($result);
                                       $_SESSION['id']=$row['member_id'];
                                       $_SESSION['firstname']=$row['member_firstname'];
                                       $_SESSION['lastname']=$row['member_lastname'];
                                       $_SESSION['member_photo']=$row['member_photo'];
                                       
                                       echo 'true';
                                       
                             }else{
                                 //disable account
                                 echo 'status';
                             }
                         }else{
                             //incorrect password and email
							 //echo $email
                             echo 'pass';
                         }
                     
           }
           public function logout(){
               unset($_SESSION['id']);
			   unset($_SESSION['firstname']);
			   unset($_SESSION['lastname']);
			   unset($_SESSION['member_photo']);
               return 'true';
           }
           public function Runsql($sql){
                 if(mysql_query($sql)){
                     echo 'true';
                 }else{
                     echo 'false';
                 }
               
           }
		   public function Runsql_form($sql){
                 if(mysql_query($sql)){
                     return 'true';
                 }else{
                     return 'false';
                 }
               
           }
		   public function Creat_shop($sql){
                 if(mysql_query($sql)){
                     return 'true';
                 }else{
                     return 'false';
                 }
               
           }
           public function Get_row($sql){
                  $result=mysql_query($sql);
                  $num=mysql_num_rows($result);
                  
                  if($num>0){
                      $row=mysql_fetch_array($result);
                      return $row;
                  }else{
					  return 0;
				  }
               
           }
           public function check_mail($sql){
                $result=mysql_query($sql);
                  $num=mysql_num_rows($result);
                  if($num>0){
                      echo 'true';
                      return true;
                  }else{
                      echo 'false';
                      return false;
                  }
           }
		   public function check_exist($sql){
                $result=mysql_query($sql);
                  $num=mysql_num_rows($result);
                  if($num>0){
                      echo 'true';
                  }else{
                      echo 'false';   
                  }
           }
		   public function checkfollow($sql){
                $result=mysql_query($sql);
                  $num=mysql_num_rows($result);
                  if($num>0){
                      return 'true';
                  }else{
                     
                      return 'false';
                  }
           }
		   
           public function forget_password($sql,$email){
                 $value=$this->check_mail($sql);
                // echo $value;
                 if($value){
                     $confrimCode=md5(uniqid(rand()));
                     $sql="Update ".TABLE_MEMBER." set comfirm_key='$confrimCode' where member_email='$email'";
                      //echo $sql;
                      if(mysql_query($sql)){
                      $message="Your comfirme Code:\r\n";
                                $message.="Your Email:".$email."";
                                $message.="Key code:".$confrimCode."";
                                $sendemail=mail("$email",'Reset Password Comfirmation',"$message");
                             if($mail){
                                    echo 'true';
                             }else{
                                    echo 'false';
                             }
                      }else{
                          echo 'false';
                      }
                 }else{
                     echo 'false';
                 }
                 
           }
           public function strUpper($str){
                 $strupper=strtoupper($str);
                 return $strupper;
           }
           public function convert_id_toOther($table,$field_id_name,$fiel_return,$id_value){//work with Ajax with this function
               $sql="Select * from ".$table." where ".$field_id_name."='".$id_value."'";
               $query=mysql_query($sql);
               //echo $sql;
               $row=mysql_fetch_array($query);
               echo $row[$fiel_return];
               return $row[$fiel_return];
           }
		   public function convert_id_toLocation($table,$field_id_name,$fiel_return,$id_value){
               $sql="Select * from ".$table." where ".$field_id_name."='".$id_value."'";
               $query=mysql_query($sql);
               //echo $sql;
               $row=mysql_fetch_array($query);
               //echo $row[$fiel_return];
               return $row[$fiel_return];
           }
		   public function convert_id_toAll($table,$field_id_name,$fiel_return,$id_value){//no Ajax with this function
               $sql="Select ".$fiel_return." from ".$table." where ".$field_id_name."='".$id_value."'";
               $query=mysql_query($sql);
               //echo $sql;
               $row=mysql_fetch_array($query);
               //echo $row[$fiel_return];
               return $row[$fiel_return];
           }
		   public function convert_id_toImage($table,$field_id_name,$fiel_return,$id_value){
               $sql="Select * from ".$table." where ".$field_id_name."='".$id_value."'";
               $query=mysql_query($sql);
               //echo $sql;
               $row=mysql_fetch_array($query);
               return $row[$fiel_return];
               
           }
           public function Getfirst_image($pro_code){
               $sql="Select *from ".TABLE_GALLERY." where pro_code='$pro_code' limit 1";
			   
               $result=mysql_query($sql);
               $num=mysql_num_rows($result);
               if($num>0){
                   $row=mysql_fetch_array($result);
                   $photo1=$row["photo1"];
				   $photo2=$row["photo2"];
				   $photo3=$row["photo3"];
				   $photo4=$row["photo4"];
				   $photo5=$row["photo5"];
				   if($photo1!=''){
					    return $photo1;
				   }else{
					    if($photo2!=''){
							return $photo2;
						}else{
							if($photo3!=''){
							   return $photo3;
							}else{
								if($photo4!=''){
							         return $photo4;
								}else{
									return $photo5;
								}
							}
						}
				   }
                  
               }
               
           }
           function Search_product($title){
               
               unset($_SESSION['condiction_scroll']);
               if($title!=""){
                   $condiction="Where pro_code like '%$title%' Or pro_name like '%$title%' order by pro_id desc limit 3";
                   //if want to when search have title and don't show result more when scoll';
                   $condiction_scroll="and (pro_code like '%$title%' Or pro_name like '%$title%')"; // when scrool take this condiction
                   $_SESSION['condiction_scroll']= $condiction_scroll; //session for get condiction when scrool downd
               }else{
                   $condiction="order by pro_id desc limit 5";
                   $condiction_scroll=""; // when scrool take this condiction
                   $_SESSION['condiction_scroll']= $condiction_scroll;//session for get condiction when scrool downd
               }
               $sql="Select *from ".TABLE_PRODUCT." ".$condiction."";
               //echo $sql;
               $result=mysql_query($sql);
               return $result;
           }
		  function Search_byPromotion(){
			   unset($_SESSION['condiction_scroll']);
               $sql="Select *from ".TABLE_PRODUCT." where discount> '0' order by pro_id desc limit 4";
               $result=mysql_query($sql);
			   $_SESSION['condiction_scroll']="and discount>0";
               return $result;
           }
		   function Search_byHots(){
			   unset($_SESSION['condiction_scroll']);
               $sql="Select *from ".TABLE_PRODUCT." order by pro_id desc limit 4";
               $result=mysql_query($sql);
			   $_SESSION['condiction_scroll']=" ";
               return $result;
           }
		   
		   function Search_byPopular(){
			   unset($_SESSION['condiction_scroll']);
               $sql="Select *from ".TABLE_PRODUCT." Where counter_view >1000 order by pro_id desc limit 4";
               $result=mysql_query($sql);
			   $_SESSION['condiction_scroll']="and discount>1000";
               return $result;
           }
		   
           function Search_byCategory($category_id){
			   unset($_SESSION['condiction_scroll']);
               $sql="Select *from ".TABLE_PRODUCT." where cat_id=".$category_id." order by pro_id desc limit 4";
               $result=mysql_query($sql);
			   $_SESSION['condiction_scroll']="and cat_id='$category_id'";
               return $result;
           }
           function Search_bySubcategory($subcategory_id){
			   unset($_SESSION['condiction_scroll']);
               $sql="Select *from ".TABLE_PRODUCT." where sub_id=".$subcategory_id." order by pro_id desc limit 4";
               $result=mysql_query($sql);
			   $_SESSION['condiction_scroll']="and sub_id=".$subcategory_id."";
               return $result;
           }
		   function Search_bySub_Subcategory($subsub_category_id){
			   unset($_SESSION['condiction_scroll']);
               $sql="Select *from ".TABLE_PRODUCT." where sub_subcat_id=".$subsub_category_id." order by pro_id desc limit 4";
               $result=mysql_query($sql);
			   $_SESSION['condiction_scroll']="and sub_subcat_id=".$subsub_category_id."";
               return $result;
           }
		   function Search_by_price($start,$end){
			   unset($_SESSION['condiction_scroll']);
               $sql="Select *from ".TABLE_PRODUCT." where pro_price>='$start' and pro_price<='$end' order by pro_id desc limit 4";
               $result=mysql_query($sql);
			   $_SESSION['condiction_scroll']="and (pro_price>='$start' and pro_price<='$end')";
               return $result;
           }
           function related_prduct($pro_code,$subcategory_id,$path=""){
                //$sub_cat=$_SESSION['sub_id'];
                $sql="Select *from ".TABLE_PRODUCT." where sub_id='$subcategory_id' and pro_code<>'$pro_code' order by pro_id desc limit 0,4";
                //echo $sql;
                $result=mysql_query($sql);
                 $num=mysql_num_rows($result);
                 if($num>0){
                    
                     while($relate_pro=mysql_fetch_array($result)){
                        // $i=$i+1;
                ?> 

                    <div class="pop_related_pro_cont" id="<?php echo $relate_pro['pro_id']; ?>">
                        <div class="pop_related_pro_cont_alert_cont">
                            <div class="pop_related_pro_cont_alert">New</div>
                        </div>
                        <div class="pop_related_pro_cont_img getDetailp" id="<?php echo $relate_pro['pro_code']; ?>"><img src="<?php echo $path; ?>images/product/<?php echo $this->convert_id_toOther(TABLE_GALLERY,gallery_id,photo1,$relate_pro['pro_id']) ?>"></div>
                        <div class="pop_related_pro_cont_text">
                            <span class="code"><?php echo $relate_pro['pro_code']; ?></span>
                            <span class="price">$<?php echo $relate_pro['pro_price']; ?></span>
                        </div>
                    </div>
               		
                 <!--javascript -->
                  
                 <?php
                    }
                    //echo $i;
                  }else{
                      echo "no items";
                  }
           }
           function related_prduct_second($product_code,$relative_last_pro_id,$subcategory_id,$path=""){
                //$sub_cat=$_SESSION['sub_id'];
                //$relative_last_pro_id=$_GET['relat_last_pro_id'];
                //echo "hello";
                $sql="Select *from ".TABLE_PRODUCT." where pro_id < '$relative_last_pro_id' and (sub_id='$subcategory_id' and pro_code<>'$product_code') order by pro_id desc limit 4";
                //echo $sql;
                $result=mysql_query($sql);
                 $num=mysql_num_rows($result);
                 if($num>0){
                     while($relate_pro=mysql_fetch_array($result)){
                ?> 
                    <div class="pop_related_pro_cont" id="<?php echo $relate_pro['pro_id']; ?>">
                    	<?php
						if($relate_pro['discount']>0){
						?>
                        <div class="alert pop_related_pro_cont_alert"><?php echo $relate_pro['discount']; ?>%<span class="alert_txt">Off</span></div>
                        <?php
						}
						?>
                        <div class="pop_related_pro_cont_price show"><?php echo $this->Calculat_discount($relate_pro['pro_price'],$relate_pro['discount']); ?>$</div>
                         <?php
					   if(!empty($_SESSION['id'])){
						   
                            if($this->check_user_collect($relate_pro['pro_code'],2)>=1){
                        ?>
                        <div class="collect show p_collect<?php echo $relative_last_pro_id;?> <?php echo "collect".$relate_pro['pro_code'];?>" c_active="" pro_cod="<?php echo $relate_pro['pro_code']; ?>">  
                                      
					  
                            <img src="images/commons/colect_icon_active.png" />
                        <?php
                            }else{
                        ?> 
                            <img src="images/commons/colect_icon.png"/>
                        <?php
                            }
                        ?>
                        </div> 
                        
                        <div class="collect_cont">
                            <div class="inner">
                                <strong>Collection Title</strong>
                            </div>
                            <div class="inner">
                               
                                <div class="pop_collection">
                                   <!--this is use ajax-->
                                </div>
                                <div class="btn_cont">
                                    <div class="btn btn_collect<?php echo $relative_last_pro_id;?>" collect_pro_cod="<?php echo $relate_pro['pro_code'];?>" shop_id="<?php echo $relate_pro['sh_id']; ?>">Collect</div>
                                </div>
                            </div>
                            
                            <div class="point_down"><img src="images/commons/point_down.png" /></div>
                        </div>                       
						<?php
                            if($this->check_user_collect($relate_pro['pro_code'],1)>=1){
                        ?>
                        	<div class="heart re_heart<?php echo $relative_last_pro_id;?> show <?php echo "edite".$relate_pro['pro_code'];?>" lik_pro_code="<?php echo $relate_pro['pro_code'];?>" shop_id="<?php echo $relate_pro['sh_id'];?>" like="1">
                            <img src="images/commons/heart_icon_active.png" /> </div>
                        <?php
                            }else{	
                        ?> 
                        <div class="heart re_heart<?php echo $relative_last_pro_id;?> show <?php echo "edite".$relate_pro['pro_code'];?>" lik_pro_code="<?php echo $relate_pro['pro_code'];?>" shop_id="<?php echo $relate_pro['sh_id']; ?>" like="">
                             <img src="images/commons/heart_icon.png" />
                        </div>
                        <?php
                            }
					   	}
                        ?>
                        
                        <div class="social1 show"><a href="//pinterest.com/pin/create/button/?url=http://www.google.com&media=http://pcss.sd8.bc.ca/wp-content/uploads/2013/01/homework.gif&description=The description of image" data-pin-do="buttonPin" data-pin-config="above" target="_blank"><img src="<?php echo $path; ?>images/commons/pinterest_icon.png" /></a></div>
                        <div class="social2 show"><a href="#" 
                                              onclick="
                                                window.open(
                                                  'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('http:www.google.com'), 
                                                  'facebook-share-dialog', 
                                                  'width=626,height=436'); 
                                                return false;">  
                                             <img src="<?php echo $path; ?>images/commons/facebook_icon.png" />
                                            </a></div>
                        <div class="social3 show"> 
                        <a href="https://twitter.com/share"  data-url="http://www.google.com" data-text="hello" data-via="sobothsim" data-size="large" data-count="none"><img src="<?php echo $path; ?>images/commons/twitter_icon.png" /></a>
                       
						</div>
                        
                        <div class="social4 show"><a href="https://plus.google.com/share?url={beta.thmey365.com/web/}" onClick="javascript:window.open(this.href,
                                  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img
                                  src="<?php echo $path; ?>images/commons/google_plus_icon.png" alt="Share on Google+"/></a></div>
                        
                        
                        <div class="pop_related_pro_cont_img getDetailp<?php echo $relative_last_pro_id; ?>" id="<?php echo $relate_pro['pro_code']; ?>">
                        <img src="<?php echo $path;?>images/product/<?php echo $this->Getfirst_image($relate_pro['pro_code']);?>" alt="<?php echo $relate_pro['pro_name']; ?>" title="<?php echo $relate_pro['pro_name']; ?>" />
                        </div>
					</div>
                 <?php
                    }
                  }else{
                     // echo "no items";
                  }
           }
           function mapImages($x=11.562107524194511,$y=104.919433593750000,$zoom=16,$size="780x300",$sensor='true'){
            $maphttp="http://maps.google.com.kh/maps?";
            $aMap=$maphttp."ll=".$x.",".$y."&z=".$zoom."&t=m&q=".$x.",".$y;
            
            $mapImghttp="http://maps.google.com/maps/api/staticmap?";
            $mapImg=$mapImghttp."center=".$x.",".$y."&zoom=".$zoom."&size=".$size."&markers=".$x.",".$y."&sensor=".$sensor;
            
            $map .=<<<EOL
        <a href="{$aMap}" target="new">
        <img src="{$mapImg}" border="0" title="Click to see on google mape" alt="Click to see on google mape">
        </a>
EOL;

       return $map; 
        }
           function follow_shop($sql){
                
                 if(mysql_query($sql)){
                     echo 'true';
                 }else{
					 
                     echo 'false';
                 }
            }
           function follow_part($path=""){
			   ?>
               <div class="pop_site_bare_innercont">
               <div class="title">Shop to Follow</div>
               <?php
                  $sql="Select * from ".TABLE_FOLLOW." where member_id='".$_SESSION['id']."'";
				  //echo $sql;
                  $result=mysql_query($sql);
                  $num=mysql_num_rows($result);
                  $arraystring='';
                  if($num>0){
                    
                    while($follow=mysql_fetch_array($result)){
                         $arraystring.=" sh_id <> ". $follow['sh_id']. " and ";
                    }
                    if($arraystring!=''){
                      $arraystring=substr($arraystring,0,-4);
                      $arraystring="WHERE ".$arraystring;  
                    }
                    else{
                      $arraystring='';  
                    }  
                  }
                  $sql="Select * from ".TABLE_SHOP." ".$arraystring." limit 3";
                  //echo $sql;
                  $result=mysql_query($sql);
                  $num=mysql_num_rows($result);
                  if($num>0){
                      while($shop=mysql_fetch_array($result)){
                ?>
			
                 <div class="pop_contaner_follow <?php echo $shop['sh_id']; ?>" >
                        <div class="elements">
                            <div class="img"><img src="<?php echo $path; ?>images/shop_logo/<?php echo ($shop['sh_logo']!='')?$shop['sh_logo']:'shop-img.png';?>" /></div>
                            <div class="title"><a href="javascript:;"><?php echo $shop['sh_name'];?></a></div>
                            <div class="follow follow_shops <?php echo $shop['sh_id'];?>" id="<?php echo $shop['sh_id'];?>"><a href="javascript:;">Follow</a></div>
                        </div>
                  </div>
                 
                 <?php
                     }
                 ?>
                         </div>
                         	<?php
						 	if($path!=''){
						 	?>
                        		<script type="text/javascript" src="../js/All/followed.js"></script>
                        	<?php
				  			}else{
							?>
                            	<script type="text/javascript" src="<?php echo $path;?>js/home/followed.js"></script>
                            <?php
							}
							?>
                <?php
                }
            }
		   function check_shop_account($shop_id,$member_id){
			   $shop_id=mysql_real_escape_string($shop_id);
			   $member_id=mysql_real_escape_string($member_id);
			   $sql="Select *from ".TABLE_SHOP." where sh_id='$shop_id' and member_id='$member_id'";
			   $query=mysql_query($sql);
			   $numrow=mysql_num_rows($query);
			   if($numrow>0){
				   return 'true';
			   }else{
				   return 'false';
			   }
		   }//check the shop it the owner of account that login or not
		   function view_product($memeber_id,$shop_id){
			   $sql="Select *from ".TABLE_COUNTVIEW." where member_id='$memeber_id' and shop_id='$shop_id'";
			   $resutl=mysql_query($sql);
			   $numrow=mysql_num_rows($resutl);
			   return $numrow;
		   }///count the number of view product that member view the product of shop
		   function location($location_id_select){
			  $sql="Select *from ".TABLE_LOCATION."";
			  $result=mysql_query($sql);
			  $num_row=mysql_num_rows($result);
			  if($num_row>0){
				  while($location=mysql_fetch_array($result)){
			  ?>
				<option value="<?php echo $location['location_id'];?>" <?php echo ($location['location_id']==$location_id_select)?'selected':'' ?>>
				<?php echo $location['location_name'];?></option>
				<?php
				  }
			  }
		   }
		   function Calculat_discount($cost,$discount){
				$value_dis=($cost*$discount)/100;
				$value_sell=$cost-$value_dis;
				return $value_sell;
		   }
		   function shop_follower($shop_id){
			   $sql="Select *from ".TABLE_FOLLOW." where sh_id='$shop_id'";
			   $resutl=mysql_query($sql);
			   $numrow=mysql_num_rows($resutl);
			   return $numrow;
		   }
		   function check_user_collect($pro_code,$event){
			   $user_id=$_SESSION['id'];
			   $sql="Select *from ".TABLE_ACTIVITY." where user_id='$user_id' and pro_code='$pro_code' and event='$event'";
			   $result=mysql_query($sql);
			   $num_roww=mysql_fetch_array($result);
			   if($num_roww>0){
				   return $num_roww;
			   }else{
				   return 0;
			   }
			   
		   }
		   function check_alert($user_id,$pro_code,$condict_id){
			   $sql="Select alert_id from ".TABLE_ALERT." where user_id='$user_id' and pro_code='$pro_code' and condiction_id='$condict_id'";
			   $query_result=mysql_query($sql);
			   $numrow=mysql_num_rows($query_result);
			   if($numrow>0){
				   return 'true';
			   }else{
				   return 'false';
			   }
		   }
		   function count_product_like_weekly_shop($shop_code){
			   $shop_id=$_SESSION['shop_id'];
			   //$shop_id=$this->convert_id_toAll(TABLE_SHOP,shop_code,sh_id,$shop_code);
			   $dat_now=date('Y-m-d');
			   $timestamp = strtotime($dat_now);
			   $day=date("d", $timestamp);
			   $month=date("m", $timestamp);
			   $year=date("Y", $timestamp);
			   $reslut=$day-7;
			   $end_date="";
			   for($i=1;$i<=5;$i++){
				   
				   if($reslut<=1){
						$d = new DateTime($dat_now);
						$d->modify('first day of this month');
						$date_start=$d->format('Y-m-d');
						$date_end=$start_date;
						$week[]=$date_start."&".$date_end;
						//echo $date_start;
//						echo $date_end;
						break;
					   
				   }else{
					   	$end_date=($i==1?$dat_now:$start_date);
						
					   	$dd = mktime(0,0,0,$month,$reslut,$year);
						$start_date = date("Y-m-d",$dd);
						
						$reslut=$reslut-7;
						$week[]=$start_date."&".$end_date;
						//echo $start_date;
//						echo $end_date. "--";
				   }
			   }
			   $multiple_array=array(array("Week","Like","Collect","Follow"));
			   $i=1;
			   
			   //foreach($week as $value){
			   for($j=count($week)-1;$j>=0;$j--){
				   $date=split("&",$week[$j]);
				   $start_date=$date[0];
				   $end_date=$date[1];
				   //echo  $start_date."-".$end_date;
				   $sql="Select * from ".TABLE_ACTIVITY." where (shop_code='$shop_code' and event='1') and
				    (activity_date>='$start_date' and activity_date<'$end_date')";
					$result=mysql_query($sql);
					$count_like=mysql_num_rows($result);
					
					$sql="Select * from ".TABLE_ACTIVITY." where (shop_code='$shop_code' and event='2') and
				    (activity_date>='$start_date' and activity_date<'$end_date')";
					$result=mysql_query($sql);
					$count_collect=mysql_num_rows($result);
					
					$sql="Select * from ".TABLE_FOLLOW." where sh_id='$shop_id' and
				    (follow_date>='$start_date' and follow_date<'$end_date')";
					$result=mysql_query($sql);
					$count_follow=mysql_num_rows($result);
					
					$timestamp = strtotime($start_date);
				    $day=date("d", $timestamp);
					
				   $timestamp1 = strtotime($end_date);
				   $day1=date("d", $timestamp1);
				   $day_next= $day+1;
				   $month1=date("m", $timestamp1);
				   $year1=date("Y", $timestamp1);
					if($i==1){
					$week_count[]=$day."-".$day1.",".$month1.",".$year1;
					}else{
					$week_count[]=$day_next."-".$day1.",".$month1.",".$year1;
					}
					$week_count[]=$count_like;
					$week_count[]=$count_collect;
					$week_count[]=$count_follow;
					
					$multiple_array[]=$week_count;
					unset($week_count);
					$i=$i+1;
			   }
			   return $multiple_array;

		   }
		   
 		   function count_product_like_monthly_shop($shop_code){
			   $shop_id=$_SESSION['shop_id'];
			   
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
					$month_arr[]=$firstdate."&".$lastdate;
					
					
			  	}
			   $multiple_arraya=array(array("Month","Like","Collect","Follow"));
			   
			   $k=1;
			   for($j=0;$j<=count($month_arr)-1;$j++){
				   
				   $date=split("&",$month_arr[$j]);
				   $start_date=$date[0];
				   $end_date=$date[1];
				  
				   $sql="Select * from ".TABLE_ACTIVITY." where (shop_code='$shop_code' and event='1') and
				    (activity_date>='$start_date' and activity_date<'$end_date')";
					$result=mysql_query($sql);
					$count_like=mysql_num_rows($result);
					
					$sql="Select * from ".TABLE_ACTIVITY." where (shop_code='$shop_code' and event='2') and
				    (activity_date>='$start_date' and activity_date<'$end_date')";
					$result=mysql_query($sql);
					$count_collect=mysql_num_rows($result);
					
					$sql="Select * from ".TABLE_FOLLOW." where sh_id='$shop_id' and
				    (follow_date>='$start_date' and follow_date<'$end_date')";
					$result=mysql_query($sql);
					$count_follow=mysql_num_rows($result);
					//echo $sql;
					$month_count[]=date('M', mktime(0, 0, 0, $j+1, 1, 2000));
					$month_count[]=$count_like;
					$month_count[]=$count_collect;
					$month_count[]=$count_follow;
					
					$multiple_arraya[]=$month_count;
					unset($month_count);
					
			   }
			 // print_r($multiple_arraya);
			   return $multiple_arraya;

		   }
		   function count_product_like_Yearly_shop($shop_code){
			   $shop_id=$_SESSION['shop_id'];
			   
			   $dat_now=date('Y-m-d');
			   $timestamp = strtotime($dat_now);
			   $year_now=date("Y", $timestamp);
			   $register_shop=$this->convert_id_toAll(TABLE_SHOP,sh_id,register_date,$shop_id);
			  
			   $timestamp_shop = strtotime($register_shop);
			   $year_reg=date("Y", $timestamp_shop);
			   $during_date=$year_now-$year_reg;
			   
			   for($i=0;$i<=$during_date;$i++){
				   	$year_show=$year_now-$i;
					$firstdate= $year_show."-01-01";
    				$lastdate=$year_show."-12-31";
					$year_arr[]=$firstdate."&".$lastdate;	
			  	}
			   $multiple_arraya=array(array("Year","Like","Collect","Follow"));
			   for($j=count($year_arr)-1;$j>=0;$j--){
				   
				   $date=split("&",$year_arr[$j]);
				   $start_date=$date[0];
				   $timestamp_shop = strtotime($start_date);
			   	   $year_data=date("Y", $timestamp_shop);
				   
				   $end_date=$date[1];
				   
				   
				   $sql="Select * from ".TABLE_ACTIVITY." where (shop_code='$shop_code' and event='1') and
				    (activity_date>='$start_date' and activity_date<'$end_date')";
					$result=mysql_query($sql);
					$count_like=mysql_num_rows($result);
					
					$sql="Select * from ".TABLE_ACTIVITY." where (shop_code='$shop_code' and event='2') and
				    (activity_date>='$start_date' and activity_date<'$end_date')";
					$result=mysql_query($sql);
					$count_collect=mysql_num_rows($result);
					
					$sql="Select * from ".TABLE_FOLLOW." where sh_id='$shop_id' and
				    (follow_date>='$start_date' and follow_date<'$end_date')";
					$result=mysql_query($sql);
					$count_follow=mysql_num_rows($result);
					
					//echo $sql;
					$year_count[]=$year_data;
					$year_count[]=$count_like;
					$year_count[]=$count_collect;
					$year_count[]=$count_follow;
					
					$multiple_arraya[]=$year_count;
					unset($year_count);
					
			   }
			 // print_r($multiple_arraya);
			   return $multiple_arraya;

		   }
		   function check_collect_product($user_id,$pro_code,$board_code){
			   $sql="Select *from ".TABLE_ACTIVITY." where (user_id='$user_id' and pro_code='$pro_code') and (event='2' and path_event='$board_code')";
			   $query=mysql_query($sql);
			   $numrow=mysql_num_rows($query);
			   if($numrow>0){
				   return true;
			   }else{
				   return false;
			   }
		   }
		   function check_user_click($sql){
			   $result=mysql_query($sql);
			   $numrow=mysql_num_rows($result);
			   if($numrow>0){
				   return $numrow;
			   }else{
				   return 0;
			   }
			   
		   }
		   function check_user_comment($comment_id,$user_id){
			   $sql="Select *from ".TABLE_COMMENT." where member_id='$user_id' and comment_id='$comment_id'";
			   $query=mysql_query($sql);
			   $row_num=mysql_num_rows($query);
			   if($row_num>0){
				   return $row_num;
			   }else{
				   return 0;
			   }
		   }
           function shop_follower_amount($shop_id){
               
        	   $sql="Select *from ".TABLE_FOLLOW." where sh_id='$shop_id'";
			   $query=mysql_query($sql);
			   $row_num=mysql_num_rows($query);
			   if($row_num>0){
				   return $row_num;
			   }else{
				   return 0;
			   }
               
		   }
       
 }
 $obj=new Mycls();
?>
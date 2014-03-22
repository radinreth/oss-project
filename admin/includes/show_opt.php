<?php
include '../../class/class.php';
$user_id=$_POST['user_id'];
//echo $user_id;
$sql="select *from ".TABLE_COMPANY." where user_id='$user_id'";
//echo $sql;
$query1=mysql_query($sql);
$num_row=mysql_num_rows($query1);
if($num_row>0){
	while($company=mysql_fetch_array($query1)){
?>

<div class="operator-profile">
            	  				<div class="operator-image"><img src="../../images/company_logo/<?php echo $company['com_logo'];?>" width="77px" height="77px"></div>
            	  				<div class="operator-content">
                                    <div class="operator-name"><?php echo $company['com_branch'];?> Company</div>
                                    <div class="operator-email">Email:<?php echo $company['com_email'];?></div>
                                    <div class="operator-phone">Tel: <?php echo $company[' 	com_phone'];?></div>
                                    <div class="operator-address">
                                        Address<br>
                                        <div class="font-normal">© 2013 GoChat corporation, Cambodia </div>
                                        <div class="font-normal"><?php echo $company['com_describtion'];?> </div>
                                        <div class="font-normal"><?php echo $company['com_address'];?></div>
                                    </div>
                                </div>

            	  			</div>
<div class="operator-maps"> 
            <div id="mapCanvas" style="height:200px;"><a target="new" href="http://maps.google.com.kh/maps?ll=11.57724313747634,104.91891860961914&z=16&t=m&q=<?php echo $company['late'];?>,<?php echo $company['longitued'];?>"><img src="../images/control-operator/operator-maps.png" style="cursor:pointer;" title="Please click to see shop location" title="Please click to see shop location"/></a></div></div>
<div class="operator-feature">
                                <div class="feature-title">Shop </div>
                                <!--/*<div id="feature-list">
                                    <?php
                                        //i=1;
                                        //while ($i <= 10) {                                                                                
                                    ?>
                                    <div class="feature-text"><input type="checkbox" >Confirm</div>   
                                    <?php
                                           //$i++;
                                       // }
                                    ?>                                 
                                </div>*/-->

                            </div>
<?php
}}
?>
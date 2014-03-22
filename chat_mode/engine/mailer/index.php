<?php
if(session_id() == '') {
		session_start();
	}
	
include_once("../../../class/_class.php");

$obj = new Operations();

echo 'ccm_id: '.$_SESSION['ccm_id'];
echo 'vis_id: '.$_POST['vis_id'];

$counter = $obj->get_name($_SESSION['ccm_id'], 'tbl_counter_companies','ccm_id='.$_SESSION['ccm_id']);
$visitor = $obj->get_name($_POST['vis_id'], 'tbl_visitors','vis_id='.$_POST['vis_id']);

$first_chat_date = $obj->chat_date($_POST['vis_id'],$_SESSION['ccm_id'],"ASC");
$last_chat_date = $obj->chat_date($_POST['vis_id'],$_SESSION['ccm_id'],"DESC");
$message = '<html><body>';
$message .= '<h1 style="text-align:center;">Chat Summary</h1>
<h4 style="text-align:center;margin:0; padding:0;">between</h4>
<h2 style="text-align:center;">&quot; '.$counter['ccm_name'].' and '.$visitor['vis_name'].' &quot;</h2>
<hr />
<label>First chat: '.$first_chat_date.'</label><br />
<label>Last chat: '.$last_chat_date.'</label>

<fieldset>
<table rules="rows" frame="sides" style="width:100%;">
    <legend>10 last messages</legend>';

	$message_query = $obj->get_message($_POST['vis_id'],$_SESSION['ccm_id'], "LIMIT 10");
	//echo mysql_num_rows($message_query);
	
	while($rows = mysql_fetch_array($message_query)){
		$chm_who = '';
		if($rows['chm_who'] == 1){
			$record = $obj->get_name(1, 'tbl_visitors','vis_id=1');
			$chm_who = $record['vis_name'];
		}else{
			$record = $obj->get_name(1, 'tbl_counter_companies','ccm_id='.$_SESSION['ccm_id']);
			$chm_who = $record['ccm_name'];
		}

		$chm_msg = ($rows['chm_msg'] != '') ? $rows['chm_msg'] : $rows['chm_file'];

		$message .= '<tr>
						<td style="width: 100px;">'.$chm_who.'</td>
						<td><p style="margin:0; padding:0">: '.$chm_msg.'</p></td>
					</tr>&nbsp;';
	}

 $total_count = $obj->get_message($_POST['vis_id'],$_SESSION['ccm_id']);
 $diff = abs(strtotime($last_chat_date) - strtotime($first_chat_date));
 $years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

 $message.='</table>
 </fieldset>
 <div style="text-align:right;">
 	<a href="#" style="display:none;">view all</a>
 </div>
<label>Total chat messages: '.mysql_num_rows($total_count).'</label><br />
<label>Duration: '.$diff.'s</label>';

$message .= "</body></html>";

$visitor = $obj->return_row("*", "tbl_visitors", "vis_id=".$_POST['vis_id']);
			
$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i"; 
if (preg_match($pattern, trim(strip_tags($visitor['vis_email'])))) { 
	$cleanedFrom = trim(strip_tags($visitor['vis_email'])); 
} else { 
	return "The email address you entered was invalid. Please try again!"; 
}
			
$to = $visitor['vis_email'];
			
$subject = 'Website Change Reqest';

$headers = "From: " . $cleanedFrom . "\r\n";
$headers .= "Reply-To: ". strip_tags($visitor['vis_email']) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
		
//echo $to.'|||'.$subject.'|||'.$message.'|||'.$headers;
if (mail($to, $subject, $message, $headers)) {
  echo 'Your message has been sent to '.$to.'.';
} else {
  echo 'There was a problem sending the email.';
}

?>
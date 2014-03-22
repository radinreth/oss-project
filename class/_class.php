<?php
/*if(session_id() == '') {
		session_start();
	}*/
	require('_sql.php');
	class Connection{
		function Connection(){
			$this->conn();	
		}
		private function conn(){
			$link = mysql_connect(HOST,USERNAME,PASSWORD) or die(mysql_error());
			$db	=	mysql_select_db(DATABASE) or die(mysql_error());
		}
		protected function conn_close () {
			mysql_close();
		}
	}
	class Operations extends Connection {
		function Operations() {
			$con = new Connection();
			//$con->shared();
			//echo $con;
		}
		function save_user($name, $email){
			
			$sql = "INSERT INTO tbl_visitors (vis_name, vis_email, vis_status, vis_ip, add_datetime) values ('" . $name . "', '" . $email . "', 1, '".$_SERVER['REMOTE_ADDR']."', CURRENT_TIMESTAMP)";

			if(mysql_query($sql)){
				$_SESSION['vis_id'] = mysql_insert_id();
				return $_SESSION['vis_id'];
			}else{
				return 'save fail!';	
			}
			
		}
		function chat_date ($vis_id, $ccm_id, $order_by){
			$sql = "SELECT * FROM tbl_chat_message WHERE vis_id=$vis_id and ccm_id=$ccm_id ORDER BY ADD_DATETIME $order_by LIMIT 1";	
			$sql_query = mysql_query($sql);
			$sql_fetch = mysql_fetch_array($sql_query);
			return $sql_fetch['add_datetime'];
		}
		function get_message ($vis_id, $ccm_id,$count='') {
			$sql = "SELECT * FROM tbl_chat_message WHERE vis_id=$vis_id and ccm_id=$ccm_id ORDER BY ADD_DATETIME DESC $count";
			$query = mysql_query($sql);
			return $query;
		}
		function get_name($id, $table, $condition){
			$sql = "select * from $table where $condition ";
			$sql_query = mysql_query($sql);
			$sql_fetch = mysql_fetch_array($sql_query);
			return $sql_fetch;
		}

		function get_ccm(){
			$com_record = $this->return_row("*", "company_profiles", "com_id='".$_REQUEST["shop_code"]."'");

			$chat_message = mysql_query("select * from tbl_chat_message");
			if(mysql_num_rows($chat_message)==0) {
				$ccm_id_sql = mysql_query(
								"SELECT * from  tbl_counter_companies ccm
									WHERE ccm.ccm_status = 1 
										AND ccm.chat_status = 1 
										AND ccm.user_id = '".$com_record['user_id']."' 
										AND ccm.online_status = 1
									ORDER BY ccm.ccm_id ASC LIMIT 1 ");
			}else{
				$ccm_id_sql = mysql_query(
								"	SELECT count(*) as num, chm.ccm_id
							  	FROM tbl_chat_message chm INNER JOIN tbl_counter_companies ccm
								WHERE chm.ccm_id = ccm.ccm_id 
									AND ccm.ccm_status = 1 
									AND ccm.chat_status = 1 
									AND ccm.user_id = '".$com_record['user_id']."' 
									AND ccm.online_status = 1
								GROUP BY chm.ccm_id
								ORDER BY num ASC LIMIT 1 "
								);
			}


			if(mysql_num_rows($ccm_id_sql)==0){
				return -1;
			}else{
				$ccm_id_array = mysql_fetch_array($ccm_id_sql);
				return $ccm_id_array['ccm_id'];
			}
		
			//return '--> '.(mysql_num_rows($ccm_id_sql)==0);
		}
		function return_row($field, $table, $condition){
			$sql = "select $field from $table where $condition";
			$query = mysql_query($sql);
			return mysql_fetch_array($query);
		}
		function return_array($field, $table, $condition=""){
			$sql = "select $field from $table $condition";
			return mysql_query($sql);
			//return $sql;
		}
		function get_visitors($ccm_id=0){
			$sql = "SELECT * FROM `tbl_chat_message` WHERE (ccm_id =$ccm_id or switch_id = $ccm_id) group by vis_id";
			return mysql_query($sql);
		}
		function has_chat_message($ccm_id=0){
			$sql = "SELECT * FROM `tbl_chat_message` where (ccm_id=$ccm_id or switch_id=$ccm_id)";
			return mysql_query($sql);
		}
		function send_file_info($vis_id, $chm_who, $name, $size, $ccm_id) {
			$sql = "insert into tbl_chat_message(chm_id, vis_id, chm_who, chm_file, chm_filesize, ccm_id, add_datetime) values (uuid(), '$vis_id', '$chm_who', '$name', '$size', '$ccm_id', CURRENT_TIMESTAMP)";
			return mysql_query($sql);
			//echo $sql;
		}
		function send_request($requester, $vis_id, $responder, $memo, $status){
			$sql = "insert into  tbl_switching_requests values ('', '$requester', $vis_id, $responder, '$memo', $status, CURRENT_TIMESTAMP)";
			return mysql_query($sql);
			//return ($sql);
		}
		function request_reject($swq_id){
			$sql = "update tbl_switching_requests set swq_status = -1 where swq_id = '$swq_id'";
			return mysql_query($sql);
			//return $sql;
		}
		/*TABLE SATISFIES*/
		function like($vis_id){
			$row = $this->return_row("*","tbl_chat_message","vis_id='$vis_id'");
			$ccm_id = $row['ccm_id'];
			
			$sql_current = "select * from tbl_satisfies where vis_id='$vis_id' and ccm_id = '$ccm_id'";
			$current = mysql_query($sql_current);
			if( mysql_num_rows($current) > 0 ){
				$sat_dislike = mysql_fetch_array($current);
				if( $sat_dislike['sat_dislike'] == -1 ){
					$sql_update = "update tbl_satisfies set sat_dislike=0, sat_like=1 where vis_id='$vis_id' and ccm_id = '$ccm_id'";
					mysql_query($sql_update);
				}
			}else{
				$sql = "insert into  tbl_satisfies values ('', '$vis_id', '$ccm_id', 1, 0, CURRENT_TIMESTAMP)";
				return mysql_query($sql);
			}
		}
		function dislike($vis_id){
			//update | insert
			
			$row = $this->return_row("*","tbl_chat_message","vis_id='$vis_id'");
			$ccm_id = $row['ccm_id'];
			
			$sql_current = "select * from tbl_satisfies where vis_id='$vis_id' and ccm_id = '$ccm_id'";
			$current = mysql_query($sql_current);
			if( mysql_num_rows($current) > 0 ){
				$sat_like = mysql_fetch_array($current);
				if( $sat_like['sat_like'] == 1 ){
					$sql_update = "update tbl_satisfies set sat_like=0, sat_dislike=-1 where vis_id='$vis_id' and ccm_id = '$ccm_id'";
					mysql_query($sql_update);
				}
			}else{
				$sql = "insert into  tbl_satisfies values ('', '$vis_id', '$ccm_id', 0, -1, CURRENT_TIMESTAMP)";
				return mysql_query($sql);
			}
		}
		
		function request_accept($swq_id, $vis_id, $swq_requester, $swq_responder){
			// before action, swq_status by default is set to 0
			// so after accept the request, swq_status will be set to 1
			// then update chat table -> get all messages for visitor that is requested by current counter to new counter
			$sql = "update tbl_switching_requests set swq_status = 1 where swq_id = '$swq_id'";
			// update table chat
			
			$query_switch = mysql_query($sql);
			
			$sql_chat = "update tbl_chat_message set 
												switch_id = '$swq_responder', 
												process_id = '$swq_requester', 
												ccm_id = 0 where vis_id = $vis_id";
												
			
			$query_chat = mysql_query($sql_chat);
			
			//return $sql.' - '.$sql_chat;
			if(($query_switch==1) && ($query_chat==1))
				return 1;
			else
				return 0;
		}
		function block_ip($ip) {

			$deny = array("111.111.111", "222.222.222", "333.333.333");
			if (in_array ($_SERVER['REMOTE_ADDR'], $deny)) {
			   header("location: http://www.google.com/");
			   exit();
			}
		}
		
		// The function to get the visitor's IP.
		function getUserIP(){
			//check ip from share internet
			if (!empty($_SERVER['HTTP_CLIENT_IP'])){
			  $ip=$_SERVER['HTTP_CLIENT_IP'];
			}
			//to check ip is pass from proxy
			elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
			  $ip=$_SERVER['REMOTE_ADDR'];
			}
			return $ip;
		}
		private function receive_chat() {
			echo 'receive msg';
		}
		private function send_chat() {
			echo 'send msg';
		}
	}

?>
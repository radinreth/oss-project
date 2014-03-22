<?php

	session_start();
	session_write_close();
	include("../../class/_defines.php");
	
	/*echo json_encode(array(
				'HOST' => HOST,
				'USERNAME' => USERNAME,
				'PASSWORD' => PASSWORD,
				'DATABASE' => DATABASE
			));
	*/
	
	class Chatter{
		//change this according to your database setup
		protected $server = HOST;
		protected $username = USERNAME;
		protected $password = PASSWORD;
		protected $database = DATABASE; //chatter
		
		//leave this as our database connection later
		protected $connection = null;
	
		public function __construct(){
			$this->connection = @mysql_connect($this->server, $this->username, $this->password);
			if($this->connection){
				if(!mysql_select_db($this->database)) die('database not found');
			}
			else die('database connection failed. Check your setup');
			
			$mode = $this->fetch('mode');
			
			switch($mode){
				case 'get':
					$this->getMessage();
					break;
				case 'post':
					$this->postMessage();
					break;
				default:
					$this->output(false, 'Wrong mode.');
					break;
			}
			
			return;
		}
				
		protected function getMessage(){
			$endtime = time() + 20;
			$lasttime = $this->fetch('lastTime');
			$vis_id = $this->fetch('vis_id');
			$curtime = null;

			$sql = "
					SELECT *
					FROM tbl_chat_message 
					WHERE chm_msg <> '' 
					ORDER BY add_datetime desc
				   ";
			if($vis_id != '') {
				$sql = "
						SELECT *
						FROM tbl_chat_message
						WHERE (chm_file <> '' or chm_msg <> '') and vis_id = ".$vis_id." 
						ORDER BY add_datetime desc
					   ";
			}else{
				$this->output(true, '');	
			}
					
			while(time() <= $endtime){
				$rs = mysql_query($sql);
				
				if($rs){
					$messages = array();
					
					while($row = mysql_fetch_array($rs)){
						$messages[] = array(
							'chm_msg' => $row['chm_msg'],
							'chm_who' => $row['chm_who'],
							'chm_file' => $row['chm_file'],
							'add_datetime' => $row['add_datetime']
						);
					}
					
					$curtime = strtotime($messages[0]['add_datetime']);
				}
				
				if(!empty($messages) && $curtime != $lasttime){
					$this->output(true, '', array_reverse($messages), $curtime);
					break;
				}
				else{
					sleep(1);
				}
			}
		}
		
		protected function postMessage(){
			$visitor = $this->fetch('visitor');
			$text = $this->fetch('text');
			
			if(!empty($text)){
				$rs = mysql_query("
					INSERT INTO tbl_chat_message(
						chm_id,
						vis_id,
						chm_who,
						chm_msg,
						ccm_id,
						add_datetime
					)
					VALUES(
						uuid(),
						'$visitor',
						2,
						'$text',
						".$_SESSION['ccm_id'].",
						CURRENT_TIMESTAMP
					)
				");
				
				if($rs){
					$this->output(true, '');
				}
				else{
					$this->output(false, 'Chat posting failed. Please try again.');
				}
			}
		}
		
		protected function fetch($name){
			$val = isset($_POST[$name]) ? $_POST[$name] : '';
			return mysql_real_escape_string($val, $this->connection);
		}
		
		protected function output($result, $output, $message = null, $latest = null){

			echo json_encode(array(
				'result' => $result,
				'message' => $message,
				'output' => $output,
				'latest' => $latest
			));
		}
	}

	new Chatter();
?>
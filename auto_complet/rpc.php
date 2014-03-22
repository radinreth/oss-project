<p id="searchresults">
<?php
	// PHP5 Implementation - uses MySQLi.
	// mysqli('localhost', 'yourUsername', 'yourPassword', 'yourDatabase');
	
	//$db = new mysqli('mysql7.000webhost.com', 'a7987138_oss', '@radin', 'a7987138_oss');

	//$db = new mysqli('localhost', 'root', '', 'oss_db');

	$db = new mysqli('localhost', 'root', '', 'oss_db');
	
	if(!$db) {
		// Show error if we cannot connect.
		echo 'ERROR: Could not connect to the database.';
	} else {
		// Is there a posted query string?
		if(isset($_POST['queryString'])) {
			$queryString = $db->real_escape_string($_POST['queryString']);
			
			// Is the string length greater than 0?
			if(strlen($queryString) >0) {
				$query = $db->query("SELECT * FROM company_profiles  WHERE com_branch LIKE '%" . $queryString . "%' ORDER BY com_id LIMIT 4");
				
				if($query) {
					// While there are results loop through them - fetching an Object.
					
					// Store the category id
					$catid = 0;
					while ($result = $query ->fetch_object()) {
						
						?>
                        <a href="company_profile/?shop_code=<?php echo $result->com_id; ?>" style="padding-top:10px;">
	         			<img src="images/company_logo/<?php echo $result->com_logo; ?>" alt="" width="47" height="47" />
	         			 <span style="text-align:left; font-size:14px; padding-top:10px;"><?php echo $result->com_branch; ?></span><br /><br />
                         <span style="font-size:10px;"><?php echo $result->com_address; ?></span>
                         </a>
                        <?php
	         			

	         		}
	         		
				} else {
					echo 'ERROR: There was a problem with the query.';
				}
			} else {
				// Dont do anything.
			} // There is a queryString.
		} else {
			echo 'There should be no direct access to this script!';
		}
	}
?>
</p>
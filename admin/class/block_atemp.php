<?php

if(!isset($_SESSION['id_counter']) && !isset($_SESSION['id_system']) && !isset($_SESSION['id_operator'])){
	header("Location:../log_in/");
}
?>
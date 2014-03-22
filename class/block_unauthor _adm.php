<?php
    if(!isset($_SESSION['adm_code']) || !isset($_SESSION['adm_user_name']) || !isset($_SESSION['adm_fullname']) || !isset($_SESSION['adm_gender'])){
      header("Location:log/");
    }
?>
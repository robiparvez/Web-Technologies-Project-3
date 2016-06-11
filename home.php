<?php

require_once("connect.php");
checkLogin();

if($_SESSION['user_type']==0) header("Location: ahome.php");
if($_SESSION['user_type']==1) header("Location: fhome.php");
if($_SESSION['user_type']==2) header("Location: shome.php");

?>

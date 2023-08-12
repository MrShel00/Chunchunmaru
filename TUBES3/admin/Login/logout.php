<?php 
session_start();
$_SESSION["authenticated"] = "";
session_destroy();
header("Location: login.php");
?>
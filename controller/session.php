<?php
session_start();

if(isset($_SESSION["memberID"]) == false || $_SESSION["memberID"] == ""){
	header("Location: ../index.php");	
}
?>
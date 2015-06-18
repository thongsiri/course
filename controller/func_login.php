<?php
require_once("connect.php");

$username = $_POST['username'];
$password = $_POST['password'];
$mode = $_GET['mode'];

$sql = "SELECT * FROM cms_members WHERE username = '".$username ."' AND password = '".md5($password)."'";

if($mode == "check"){
	  
	$data = $db->fetch($sql);  
	
	if($data[0][0] != "empty" && $data[0][0] != "e"){
		echo true;
	}else{
		echo false;	
	}
	
}else{
	
	$data = $db->fetch($sql);  
	
	if($data[0][0] != "empty" && $data[0][0] != "e"){
		session_start();
		$_SESSION["memberID"] = $data[0]["ID"];
		$_SESSION["username"] = $data[0]["username"];
		$_SESSION["firstname"] = $data[0]["firstname"];
		$_SESSION["roleID"] = $data[0]["roleID"];
		
		header("Location: ../view/list_course.php");
	}else{
		header("Location: ../index.php");
	}
}


?>
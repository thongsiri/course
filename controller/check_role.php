<?php
session_start();
$memberID = $_SESSION["memberID"];
$roleID = $_SESSION["roleID"];

if($roleID == "1"){
	header("Location: list_course.php");
	exit;
}else{
	$mode = $_GET["mode"];
	
	if($mode == "edit"){
		$create_by = $_GET["create_by"];
		if($memberID != $create_by){
			header("Location: list_course.php");
			exit;
		}
	}else if ($mode=="create"){
		return true;
	}else{
		header("Location: ../view/list_course.php");
	}
}

?>
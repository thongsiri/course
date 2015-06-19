<?php
session_start();
require_once("connect.php");

$memberID = $_SESSION["memberID"];
$username = $_SESSION["username"];
$roleID = $_SESSION["roleID"];

$mode = $_GET['mode'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$nickname = $_POST['nickname'];
$birthday_day = $_POST['birthday_day'];
$birthday_month = $_POST['birthday_month'];
$birthday_year = $_POST['birthday_year'];

$birthday = $birthday_year."-".$birthday_month."-".$birthday_day;

switch($mode){
	case "create":
							$db->query("INSERT INTO cms_members (roleID, username, password, firstname, lastname, nickname, birthday) VALUES ('".$roleID."', '".$username."', '".$password."', '".$firstname."', '".$lastname."', '".$nickname."', '".$birthday."')");
							header("Location: ../view/list_course.php");
							exit;
	break;
	
	case "edit":
						$courseID = $_GET['courseID'];
						$db->query("UPDATE cms_members SET firstname = '".$firstname."', lastname = '".$lastname."', nickname = '".$nickname."', birthday = '".$birthday."' WHERE ID = '".$memberID."' AND username = '".$username."'");
						header("Location: ../view/list_course.php");
						exit;
	break;
}
?>
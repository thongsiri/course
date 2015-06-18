<?php
session_start();
require_once("connect.php");

$memberID = $_SESSION["memberID"];
$mode = $_GET['mode'];
$course_categories = $_POST['course_categories'];
$course_name = $_POST['course_name'];
$course_description = $_POST['course_description'];
$course_number = $_POST['course_number'];

$start_day = $_POST['start_day'];
$start_month = $_POST['start_month'];
$start_year = $_POST['start_year'];
$start_hour = $_POST['start_hour'];
$start_minute = $_POST['start_minute'];

$end_day = $_POST['end_day'];
$end_month = $_POST['end_month'];
$end_year = $_POST['end_year'];
$end_hour = $_POST['end_hour'];
$end_minute = $_POST['end_minute'];

$date_from = $start_year."-".$start_month."-".$start_day;
$date_to = $end_year."-".$end_month."-".$end_day;

$time_from = $start_hour.":".$start_minute;
$time_to = $end_hour.":".$end_minute;

switch($mode){
	case "create":
							$db->query("INSERT INTO cms_courses (course_cateID, create_by_member, name, description, date_from, date_to, time_from, time_to, number, `status`, `create`) VALUES ('".$course_categories."', '".$memberID."', '".$course_name."', '".$course_description."', '".$date_from."', '".$date_to."', '".$time_from."', '".$time_to."', '".$course_number."', '1', '".date("Y-m-d H:m:s")."')");
							header("Location: ../view/list_course.php");
							exit;
	break;
	
	case "edit":
						$courseID = $_GET['courseID'];
						$db->query("UPDATE cms_courses SET course_cateID = '".$course_categories."', name = '".$course_name."', description = '".$course_description."', date_from = '".$date_from."', date_to = '".$date_to."', time_from = '".$time_from."', time_to = '".$time_to."', number = '".$course_number."' WHERE ID = '".$courseID."' AND create_by_member = '".$memberID."'");
						header("Location: ../view/list_course.php");
						exit;
	break;
	
	case "delete":
						$courseID = $_GET['courseID'];
						$db->query("DELETE FROM cms_courses WHERE ID = '".$courseID."' AND create_by_member = '".$memberID."'");
						exit;
	break;
}
?>
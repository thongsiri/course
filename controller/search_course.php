<?php
session_start();
header("Content-Language:th");  
header("Content-type:text/html; charset=tis-620");          
header("Cache-Control: no-store, no-cache, must-revalidate");               
header("Cache-Control: post-check=0, pre-check=0", false); 

require_once("../model/data_course.php");    
$data_course = new data_course();

$memberID	= $_SESSION["memberID"];
$roleID 		= $_SESSION["roleID"];

$course_name = $_GET['course_name'];
$start_day = $_GET['start_day'];
$start_month = $_GET['start_month'];
$start_year = $_GET['start_year'];
$end_day = $_GET['end_day'];
$end_month = $_GET['end_month'];
$end_year = $_GET['end_year'];

$date_from = $start_year."-".$start_month."-".$start_day;
$date_to = $end_year."-".$end_month."-".$end_day;

if($roleID == "2"){
	$instructor = "AND create_by_member = '".$memberID."'";
}
$sql = "SELECT c.*, cate.name AS category FROM cms_courses AS c, cms_course_categories AS cate WHERE c.course_cateID = cate.ID ".$instructor." AND c.name LIKE '%".$course_name."%' AND ((c.date_from BETWEEN '".$date_from."' AND '".$date_to."') OR (c.date_to BETWEEN '".$date_from."' AND '".$date_to."')) ORDER BY c.`create` DESC";

return $data_course->list_course_name($sql , $memberID , $roleID);

?>
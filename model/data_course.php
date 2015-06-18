<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />

<?php

session_start();
$memberID = $_SESSION["memberID"];
$roleID = $_SESSION["roleID"];
$create_by = $_GET["create_by"];


require_once("../controller/connect.php");


$mode = $_GET['mode'];

if($mode != ""){
	
	$courseID = $_GET['ID'];
	
	switch($mode){
			
		case "edit":
					$sql = "SELECT * FROM cms_courses WHERE ID = '".$courseID."' AND create_by_member = '".$memberID."'";
					
					$course = $db->fetch($sql);
					
					if($course[0][0] != "empty" && $course[0][0] != "e"){	
						$date_from = split("-", $course[0]['date_from']);
						$time_from = split(":", $course[0]['time_from']);
						$date_to = split("-", $course[0]['date_to']);
						$time_to = split(":", $course[0]['time_to']);
						
						$course[0]['start_day'] 	= $date_from[2];
						$course[0]['start_month'] 	= $date_from[1];
						$course[0]['start_year'] 	= $date_from[0];
						$course[0]['start_hour'] 	= $time_from[0];
						$course[0]['start_minute'] 	= $time_from[1];
						
						$course[0]['end_day'] 		= $date_to[2];
						$course[0]['end_month'] 	= $date_to[1];
						$course[0]['end_year'] 		= $date_to[0];
						$course[0]['end_hour'] 		= $time_to[0];
						$course[0]['end_minute'] 	= $time_to[1];
					}else{
						
						?>
                        <script type="text/javascript">
							window.location = "../view/list_course.php";
						</script>
                        <?php
					}
		
		break;
		
		case "create":
					$course[0]['name'] 			= "";
					$course[0]['description'] 	= "";
					
					$course[0]['start_day'] 	= date("d");
					$course[0]['start_month'] 	= date("m");
					$course[0]['start_year'] 	= date("Y");
					$course[0]['start_hour'] 	= "";
					$course[0]['start_minute'] 	= "";
					
					$course[0]['end_day'] 		= date("d");
					$course[0]['end_month'] 	= date("m");
					$course[0]['end_year'] 		= date("Y");
					$course[0]['end_hour'] 		= "";
					$course[0]['end_minute'] 	= "";
					
					$course[0]['number'] 		= "0";
		
		break;
		
	}
}

class data_course{
	
	public function course_categories($typeID , $cateID){
	
		$db = new dq();
	
		switch($typeID){
			case "select":
						$sql = "SELECT * FROM cms_course_categories ORDER BY name ASC";  
						$categories = $db->fetch($sql);  
						
						echo "<select class='inputBox'  id='course_categories' name='course_categories'>";
						
						if($categories[0][0] != "empty" && $categories[0][0] != "e"){
							
							foreach($categories as $c){
								
								
								if($c['ID'] == $cateID){
									
									echo "<option value='".$c['ID']."' selected='selected'>".$c['name']."</option>";
								}else{
									echo "<option value='".$c['ID']."'>".$c['name']."</option>";
								}
							}
						}else{
							echo "<option value='0'>*ไม่มีประเภทวิชา</option>";
						}
						
						echo "</select>";
			break;
		}
	}
	
	public function select_course_name($memberID , $roleID){
		
		$data_course = new data_course();
		
		if($roleID == "2"){
			$instructor = "AND create_by_member = '".$memberID."'";
		}
		
		$sql = "SELECT c.*, cate.name AS category FROM cms_courses AS c, cms_course_categories AS cate WHERE c.course_cateID = cate.ID ".$instructor." ORDER BY `create` DESC";
		
		return $data_course->list_course_name($sql , $memberID , $roleID);
		
	}
	
	public function list_course_name($sql , $memberID , $roleID){
		
		$db = new dq();
		
		$data = $db->fetch($sql);  
						
		if($data[0][0] != "empty" && $data[0][0] != "e"){
			
			$i=0;
			foreach($data as $d){
				
				$i++;
				if($roleID == "2") $button = "<a href='course.php?mode=edit&ID=".$d['ID']."&create_by=".$d['create_by_member']."'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> แก้ไขวิชา</a> | <a href='#' id='delete-".$d['ID']."' class='delete-course'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> ลบ</a>";
				
				echo"
					<div class='list_course_name panel-body'>
					<div class='col-md-8'>
						<div><h3 id='course-".$d['ID']."'> ".$d['name']." (".$d['category'].")</h3></div>
						<div>".$d['description']."</div>
						<br/><b>ตั้งแต่ </b>".groupDate($d['date_from'])."<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เวลา ".$d['time_from']."<br/> <b>จนถึง</b> ".groupDate($d['date_to'])."<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เวลา ".$d['time_to']."
						<br/><b>จำนวน </b>".$d['number']." คน
					</div>
					<div class='col-md-4' style='padding-top:20px'>".$button."</div>
					</div>";
	
			}
			echo "<div align='center'>ทั้งหมด ".$i." วิชา</div>";
		}else{
			echo "<div class='list_course_name panel-body' align='center'><h3>ไม่มีข้อมูล</h3></div>";	
		}
		
		return $rows;
	}
}

function groupDate($date){
	$thaiweek=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัส","ศุกร์","เสาร์");
	$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม"," มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	
	$d = split("-", $date);

	return $thaiweek[date("w", strtotime(date($date)))]." ".$d[2]." ". $thaimonth[$d[1]-1]." ".($d[0]+543);
}
?>
<?php
require_once("../controller/session.php");
require_once("../controller/check_role.php");
require_once("../model/data_course.php");
require_once("../model/date_time.php");

$data_course = new data_course();
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  

<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/my_theme.css" rel="stylesheet" /> 
<script type="text/javascript" src="../js/jquery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="../js/function.js"></script>      
<script src="../css/bootstrap/js/bootstrap.min.js"></script>  

<title>My Course</title>

</head> 
<body>
<div class="container">
	<div class="row">

        <div class="col-xs-12 col-md-12 navbar-header header-link">
            <div class="col-xs-3 col-md-4" align="center"><a href='../view/list_course.php'><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a></div>
            <div class="col-xs-6 col-md-4" align="center">My Course</div>
            <div class="col-xs-3 col-md-4" align="center"><a href='#' id="logoutButton" title="ออกจากระบบ"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></div>
        </div>
        
        <div class="col-xs-12">
        	<br/>            
        		<div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> วิชาเรียน</h3>
                  </div>
                  <div class="panel-body">
                  	<form id="form_course_Instructor" name="form_course_Instructor" method="post" action="../controller/func_course.php?mode=<?php echo $mode; ?>&courseID=<?php echo $courseID; ?>"> 
                        <table class="table">
                            <tr>
                                <td colspan="2">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1">ประเภทวิชา</span>
                                      <?php $data_course->course_categories("select" , $course[0]['course_cateID']); ?>
                                    </div>	
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon2">ชื่อวิชาเรียน</span>
                                      <input type="text" class="form-control" name="course_name" id="course_name" value="<?php echo $course[0]['name']; ?>" placeholder="วิชาเรียน" aria-describedby="basic-addon2">
                                    </div>	
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon3">รายละเอียด</span>
                                      <input type="text" class="form-control" name="course_description" id="course_description" value="<?php echo $course[0]['description']; ?>" placeholder="รายละเอียด" aria-describedby="basic-addon3">
                                    </div>	
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="input-group">
                                      	<span class="input-group-addon" id="basic-addon4">เริ่ม&nbsp;</span>
                                      	<select id="start_day" name="start_day"><?php $date_time->day($course[0]['start_day'], $course[0]['start_month'], $course[0]['start_year']); ?></select>
                                        <select id="start_month" name="start_month"><?php $date_time->month($course[0]['start_month']); ?></select>
                                        <select id="start_year" name="start_year"><?php $date_time->year($course[0]['start_year']); ?></select>
                                    </div>
                                    <div class="input-group">
                                      	<span class="input-group-addon" id="basic-addon5">เวลา</span>
                                        <select id="start_hour" name="start_hour"><?php $date_time->hour($course[0]['start_hour']); ?></select> :
                    					<select id="start_minute" name="start_minute"><?php $date_time->minute($course[0]['start_minute']); ?></select>
                                    </div>	
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="input-group">
                                      	<span class="input-group-addon" id="basic-addon6">จบ&nbsp;&nbsp;</span>
                                      	<select id="end_day" name="end_day"><?php $date_time->day($course[0]['end_day'], $course[0]['end_month'], $course[0]['end_year']); ?></select>
                                        <select id="end_month" name="end_month"><?php $date_time->month($course[0]['end_month']); ?></select>
                                        <select id="end_year" name="end_year"><?php $date_time->year($course[0]['end_year']); ?></select>
                                    </div>
                                    <div class="input-group">
                                      	<span class="input-group-addon" id="basic-addon7">เวลา</span>
                                        <select id="end_hour" name="end_hour"><?php $date_time->hour($course[0]['end_hour']); ?></select> :
                                        <select id="end_minute" name="end_minute"><?php $date_time->minute($course[0]['end_minute']); ?></select>
                                    </div>
                                </td>
                            </tr>
                           	<tr>
                                <td colspan="2">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon8">จำนวนนักเรียน</span>
                                      <input type="text" class="form-control" name="course_number" id="course_number" value="<?php echo $course[0]['number']; ?>" placeholder="จำนวน" aria-describedby="basic-addon8">
                                    </div>	
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                <button type="submit" id="submit-course-Instructor" class="btn btn-success btn-block">บันทึกข้อมูล</button></td>
                            </tr>
                        </table>
                    </form>
                  </div><!-- /panel-body -->
                </div><!-- /panel -->
       
        </div><!----- [END] contain col -->
    </div><!----- [END] row --> 
 </div><!----- [END] container -->
</body>
</html>  

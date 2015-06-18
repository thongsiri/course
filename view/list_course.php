<?php
require_once("../controller/session.php");
require_once("../model/data_course.php");
require_once("../model/date_time.php");

$memberID 	= $_SESSION["memberID"];
$roleID 	= $_SESSION["roleID"];

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
<link href="../css/my_theme.css" rel="stylesheet"/>
<script type="text/javascript" src="../js/jquery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="../js/function.js"></script>      
<script src="../css/bootstrap/js/bootstrap.min.js"></script>  

<title>My Course</title>

</head> 
<body>
<nav class="navbar navbar-default">


<div class="container">




	<div class="row">
        <div class="col-xs-12 col-md-12 navbar-header header-link">
            <div class="col-xs-3 col-md-4" align="center"><a href='../view/profile.php?mode=edit' title="แก้ไขข้อมูลส่วนตัว"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></div>
            <div class="col-xs-6 col-md-4" align="center">My Course</div>
            <div class="col-xs-3 col-md-4" align="center"><a href='#' id="logoutButton" title="ออกจากระบบ"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></div>
        </div>
        <div class="col-xs-12 page-spacing">
            
            <div class="panel panel-default">
             	<div class="panel-heading">
                	<h3 class="panel-title">ค้นหา</h3>
              	</div>
          		<div class="panel-body">
              	<table class="table">
                    <tr><td colspan="2">
                        <div class="input-group">เริ่ม<br/>
                            <select id="start_day" name="start_day"><?php $date_time->day("1", "01", date("Y")); ?></select>
                            <select id="start_month" name="start_month"><?php $date_time->month("01"); ?></select>
                            <select id="start_year" name="start_year"><?php $date_time->year(date("Y")); ?></select>
                        </div>
                    </td></tr>
                    <tr><td colspan="2">
                        <div class="input-group">สิ้นสุด<br/>
                            <select id="end_day" name="end_day"><?php $date_time->day(date("d"), date("m"), date("Y")); ?></select>
                            <select id="end_month" name="end_month"><?php $date_time->month(date("m")); ?></select>
                            <select id="end_year" name="end_year"><?php $date_time->year(date("Y")); ?></select>
                        </div>
                    </td></tr>
                    <tr><td colspan="2">
                    	<div class="input-group">
                          <input type="text" class="form-control inputBox" id="search_course_name" name="search_course_name" placeholder="ค้นหาวิชาเรียน">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="searchButton">ค้นหา</button>
                          </span>
                        </div>
                    </td></tr>
             	</table>
           		</div><!-- /panel-body -->
            </div><!-- /panel -->
            
            <div align="right" style="margin-bottom:5px"><?php if($roleID == "2"){ ?><a href='../view/course.php?mode=create'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> สร้างวิชาเรียน</a><?php } ?></div>
            
            <div id="course_name" class="panel panel-default"><?php $course_name = $data_course->select_course_name($memberID , $roleID); ?></div>
			     
        </div><!----- [END] contain col -->
    </div><!----- [END] row --> 
 </div><!----- [END] container -->
</nav>
</body>
</html>  

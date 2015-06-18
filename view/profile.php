<?php

require_once("../controller/session.php");
require_once("../model/data_profile.php");
require_once("../model/date_time.php");

$memberID = $_SESSION["memberID"];
$username = $_SESSION["username"];

$data_profile = new data_profile();

$profile = $data_profile->profile($memberID , $username);

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
                <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ข้อมูลส่วนตัว</h3>
              </div>
              <div class="panel-body">
                <form id="form_profile" name="form_profile" method="post" action="../controller/func_profile.php?mode=<?php echo $mode; ?>&memberID=<?php echo $memberID; ?>">
                    <table class="table">
                        <tr>
                            <td colspan="2">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">ชื่อจริง&nbsp;</span>
                                  <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $profile['firstname']; ?>" placeholder="รหัสผ่าน" aria-describedby="basic-addon1">
                                </div>	
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon2">นามสกุล</span>
                                  <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $profile['lastname']; ?>" placeholder="รหัสผ่าน" aria-describedby="basic-addon2">
                                </div>	
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon3">ชื่อเล่น&nbsp;</span>
                                  <input type="text" class="form-control" name="nickname" id="nickname" value="<?php echo $profile['nickname']; ?>" placeholder="รหัสผ่าน" aria-describedby="basic-addon3">
                                </div>	
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="input-group">วันเกิด<br/>
                                  	<select id="birthday_day" name="birthday_day"><?php $date_time->day($profile['birthday_day'], $profile['birthday_month'], $profile['birthday_year']); ?></select>
                        			<select id="birthday_month" name="birthday_month"><?php $date_time->month($profile['birthday_month']); ?></select>
                       			 	<select id="birthday_year" name="birthday_year"><?php $date_time->birthday_year($profile['birthday_year']); ?></select>
                                </div>	
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                            <button type="submit" id="submit-profile" class="btn btn-success btn-block">บันทึกข้อมูล</button></td>
                        </tr>
                        <tr>
                            <td colspan="2"><div id="feedback"></div></td>
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

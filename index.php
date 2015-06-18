<?php
session_start();

require_once("view/login_form.php");
$login_form = new login_form();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/my_theme.css" rel="stylesheet"/>
<script type="text/javascript" src="js/jquery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/function.js"></script>      
<script src="css/bootstrap/js/bootstrap.min.js"></script>  

<title>My Course</title>  
</head>  
  
<body>
<div class="container">
	<div class="row">
        <div class="col-xs-16 login-content" >
        	<?php $login_form->form($_SESSION); ?>
        </div><!----- [END] contain col -->
    </div><!----- [END] row --> 
 </div><!----- [END] container -->
</body>  
</html>  

<?php
class login_form{ 
	public function form($_SESSION) {
		if(isset($_SESSION["memberID"]) == false || $_SESSION["memberID"] == ""){
			login();
		}else{
			show();
		}
	}
}
?>

<?php	function login(){		?>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">เข้าสู่ระบบ</h3>
  </div>
  <div class="panel-body">
    <form id="form_login" name="form_login" method="post" action="controller/func_login.php">
        <table class="table">
            <tr>
                <td colspan="2">
                		<div class="input-group">
                          <span class="input-group-addon" id="basic-addon1" >ชื่อผู้ใช้งาน</span>
                          <input type="text" class="form-control" name="username" id="username" placeholder="ชื่อผู้ใช้งาน" aria-describedby="basic-addon1" s>
                        </div>	
				</td>
            </tr>
            <tr>
                <td colspan="2">
                		<div class="input-group">
                          <span class="input-group-addon" id="basic-addon2" style="padding-right:25px">รหัสผ่าน</span>
                          <input type="password" class="form-control" name="password" id="password" placeholder="รหัสผ่าน" aria-describedby="basic-addon2">
                        </div>	
				</td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                <button type="submit" id="loginButton" class="btn btn-primary btn-block">เข้าสู่ระบบ</button></td>
            </tr>
            <tr>
                <td colspan="2"><div id="feedback"></div></td>
            </tr>
        </table>
    </form>
  </div>
</div>
    
<?php	}	?>

<?php	function show(){		?>
<div class="panel panel-primary">
	<div class="panel-body">
		<h3>ยินดีต้อนรับ, <?php  echo "".$_SESSION["firstname"]; ?></h3>
        <br/><a href="view/list_course.php" class="btn btn-primary btn-block">ดูวิชา</a>
        <br/><!--<button id="logoutButton" class="btn btn-danger btn-block">ออกจากระบบ</button>-->
        <a href='#' id="logoutMainButton" class="btn btn-danger btn-block">ออกจากระบบ</a>
 	</div>
</div>
<?php	}	?>
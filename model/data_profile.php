<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />

<?php
session_start();

require_once("../controller/connect.php");

$mode = $_GET['mode'];

class data_profile{
	
	public function profile($memberID , $username){
	
		$db = new dq();
		$sql = "SELECT * FROM cms_members WHERE ID = '".$memberID."' AND username = '".$username."'";

		$profile = $db->fetch($sql);
					
		if($profile[0][0] != "empty" && $profile[0][0] != "e"){
			
			$birthday = split("-", $profile[0]['birthday']);
			$profile[0]['birthday_day'] 	= $birthday[2];
			$profile[0]['birthday_month']	= $birthday[1];
			$profile[0]['birthday_year'] 	= $birthday[0];
			
			return $profile[0];
			
		}else{
						
			?>
			<script type="text/javascript">
				window.location = "../course/index.php";
			</script>
			<?php
		}
	}
	
}

?>
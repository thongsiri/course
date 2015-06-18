<meta http-equiv="Content-Language" content="th">

<?php
if( ! ini_get('date.timezone') )
{
	date_default_timezone_set('Asia/Bangkok');
}

class date_time{ 
	private $day;
	private $month;
	private $year;
	
	public function day($current_day, $month , $year) {

		$day = date( "t", strtotime($year."-".$month."-01") );

		for($d=1 ; $d <= $day ; $d++){
			
			if($current_day == $d){
				echo "<option value='".$d."' selected='selected'>".$d."</option>";
			}else{
				echo "<option value='".$d."'>".$d."</option>";
			}
			
		}
	}
	
	public function month($current_month) {
		
		if($current_month == "01") $year .= "<option value='01' selected='selected'>�.�.</option>"; 		else $year .= "<option value='01'>�.�.</option>";
		if($current_month == "02") $year .= "<option value='02' selected='selected'>�.�.</option>"; 	else $year .= "<option value='02'>�.�.</option>";
		if($current_month == "03") $year .= "<option value='03' selected='selected'>��.�.</option>"; 		else $year .= "<option value='03'>��.�</option>";
		if($current_month == "04") $year .= "<option value='04' selected='selected'>��.�.</option>"; 		else $year .= "<option value='04'>��.�.</option>";
		if($current_month == "05") $year .= "<option value='05' selected='selected'>�.�.</option>"; 		else $year .= "<option value='05'>�.�.</option>";
		if($current_month == "06") $year .= "<option value='06' selected='selected'>��.�.</option>"; 	else $year .= "<option value='06'>��.�.</option>";
		if($current_month == "07") $year .= "<option value='07' selected='selected'>�.�.</option>"; 		else $year .= "<option value='07'>�.�.</option>";
		if($current_month == "08") $year .= "<option value='08' selected='selected'>�.�.</option>"; 		else $year .= "<option value='08'>�.�.</option>";
		if($current_month == "09") $year .= "<option value='09' selected='selected'>�.�.</option>"; 		else $year .= "<option value='09'>�.�.</option>";
		if($current_month == "10") $year .= "<option value='10' selected='selected'>�.�.</option>"; 		else $year .= "<option value='10'>�.�.</option>";
		if($current_month == "11") $year .= "<option value='11' selected='selected'>�.�.</option>"; 	else $year .= "<option value='11'>�.�.</option>";
		if($current_month == "12") $year .= "<option value='12' selected='selected'>�.�.</option>"; 		else $year .= "<option value='12'>�.�.</option>";
		
		echo $year;
	}
	
	public function year($year) {

		for($y=$year-1 ; $y <= $year+2 ; $y++){

			
			if($y == $year){
				echo "<option value='".$y."' selected='selected'>".($y+543)."</option>";
			}else{
				echo "<option value='".$y."'>".($y+543)."</option>";
			}
			
		}
	}
	
	public function birthday_year($year) {


		for($y=$year-10 ; $y <= $year+10 ; $y++){

			
			if($y == $year){
				echo "<option value='".$y."' selected='selected'>".($y+543)."</option>";
			}else{
				echo "<option value='".$y."'>".($y+543)."</option>";
			}
			
		}
	}
	
	public function hour($hour) {

		for($h=1 ; $h <= 24 ; $h++){

			if($h == $hour){
			 	echo "<option value='".str_pad($h, 2, "0", STR_PAD_LEFT)."' selected='selected'>".str_pad($h, 2, "0", STR_PAD_LEFT)."</option>";
			}else{
				echo "<option value='".str_pad($h, 2, "0", STR_PAD_LEFT)."'>".str_pad($h, 2, "0", STR_PAD_LEFT)."</option>";
			}
		}
	}
	
	public function minute($minute) {

		$m=0;
		while($m <= 60){

			if($m == $minute){
			 	echo "<option value='".str_pad($m, 2, "0", STR_PAD_LEFT)."' selected='selected'>".str_pad($m, 2, "0", STR_PAD_LEFT)."</option>";
			}else{
				echo "<option value='".str_pad($m, 2, "0", STR_PAD_LEFT)."'>".str_pad($m, 2, "0", STR_PAD_LEFT)."</option>";
			}
			$m = $m+10;
			
		}
	}

}

$date_time = new date_time();
?>
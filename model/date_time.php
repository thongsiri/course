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
		
		if($current_month == "01") $year .= "<option value='01' selected='selected'>ม.ค.</option>"; 		else $year .= "<option value='01'>ม.ค.</option>";
		if($current_month == "02") $year .= "<option value='02' selected='selected'>ก.พ.</option>"; 	else $year .= "<option value='02'>ก.พ.</option>";
		if($current_month == "03") $year .= "<option value='03' selected='selected'>มี.ค.</option>"; 		else $year .= "<option value='03'>มี.ค</option>";
		if($current_month == "04") $year .= "<option value='04' selected='selected'>เม.ย.</option>"; 		else $year .= "<option value='04'>เม.ย.</option>";
		if($current_month == "05") $year .= "<option value='05' selected='selected'>พ.ค.</option>"; 		else $year .= "<option value='05'>พ.ค.</option>";
		if($current_month == "06") $year .= "<option value='06' selected='selected'>มิ.ย.</option>"; 	else $year .= "<option value='06'>มิ.ย.</option>";
		if($current_month == "07") $year .= "<option value='07' selected='selected'>ก.ค.</option>"; 		else $year .= "<option value='07'>ก.ค.</option>";
		if($current_month == "08") $year .= "<option value='08' selected='selected'>ส.ค.</option>"; 		else $year .= "<option value='08'>ส.ค.</option>";
		if($current_month == "09") $year .= "<option value='09' selected='selected'>ก.ย.</option>"; 		else $year .= "<option value='09'>ก.ย.</option>";
		if($current_month == "10") $year .= "<option value='10' selected='selected'>ต.ค.</option>"; 		else $year .= "<option value='10'>ต.ค.</option>";
		if($current_month == "11") $year .= "<option value='11' selected='selected'>พ.ย.</option>"; 	else $year .= "<option value='11'>พ.ย.</option>";
		if($current_month == "12") $year .= "<option value='12' selected='selected'>ธ.ค.</option>"; 		else $year .= "<option value='12'>ธ.ค.</option>";
		
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
<?php
$dbi = array();
$dbi['server'] = "localhost";
$dbi['name'] = "db_course";
$dbi['user'] = "root";
$dbi['password'] = "Admin123";

mysql_connect($dbi['server'], $dbi['user'], $dbi['password']) or die("Cannot connect the Server");
mysql_select_db($dbi['name']) or die ("Cannot select database");
mysql_query("SET character_set_results=tis620");
mysql_query("SET character_set_client='tis620'");
mysql_query("SET character_set_connection='tis620'");
mysql_query("collation_connection = tis620_general_ci");
mysql_query("collation_database = tis620_general_ci");
mysql_query("collation_server = tis620_general_ci");

class dq { 
	
	private $result;
	private $rows;
	
	public function query($q) {
		$q = mysql_query($q);

		return $q;
	}
	
	public function fetch($q) {
		if (mysql_query($q)) {

			$query = mysql_query($q);

			if (mysql_num_rows($query) > 0) {

				while ($f = mysql_fetch_array($query)) {
					$rows[] = $f;
				}
			} else {
				$rows = array("empty");
			}
		} else {
			$rows = array("empty");
		}
			
		return $rows;
	}
}

$db = new dq();
?>
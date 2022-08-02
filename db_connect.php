<?php 
class DB_CONNECT {

	function connect(){
		define('DB_USER',"root");
		define('DB_PASSWORD',"");
		define('DB_DATABASE',"youmade");
		define('DB_SERVER',"localhost");
		$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
		return $con;
	}
}	
?>

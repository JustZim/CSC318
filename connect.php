<!-- Connection to Database -->
<?php

	$user = 'root';
	$host= 'localhost';
	$pass ='';

	$connect = mysqli_connect($host,$user,$pass);
	$dbname ='indiefitness';

	$seldb = mysqli_select_db($connect,$dbname);

	if(session_status() === PHP_SESSION_NONE)
	{
		session_start();
	}
	
	if(!isset($_SESSION["rank"])) {
		$_SESSION["rank"] = 0;
	}
	
?>
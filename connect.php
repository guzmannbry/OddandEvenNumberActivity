<?php
	$number = $_POST['number'];
	function db(){
		return new PDO ("mysql:host=localhost; dbname=mynumbersdb;", "root","");
	}
	function add($number){
		$db=db();
		$sql = "INSERT INTO myrecords(evennum) VALUES (?)";
		$s = $db -> prepare ($sql);
		$s -> execute (array($number));
		$db=null;
	}
	if(($number % 2 ) != 0){
		$myfile = fopen ("mynumber.txt","a") ;
		$num = " " .$number;
		fwrite($myfile, $num);
		echo "ODD NUMBER SUCCESSFULLY";
		fclose($myfile);
	}
	else
	{
		if($number != 0){
			add($number);
			echo "EVEN NUMBER SUCCESSFULLY";
		}
	}
?>

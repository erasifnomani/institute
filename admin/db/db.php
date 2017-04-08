<?php 
	session_start();
	
	
	function getConnection(){
		$dbh=new PDO('mysql:host=localhost;dbname=obdst4rz_arshadtutorial','obdst4rz_arshad','arshad@123');
		$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $dbh;
	}


$connect = @mysql_connect("localhost","obdst4rz_arshad","arshad@123") or die ("error");

$database = @mysql_select_db("obdst4rz_arshadtutorial") or die("error");
	
	
	@mysql_connect('localhost','obdst4rz_arshad','arshad@123');
        @mysql_select_db('obdst4rz_arshadtutorial');

$con = mysqli_connect("localhost","obdst4rz_arshad","arshad@123","obdst4rz_arshadtutorial");
	
	
	$DB_Server = "localhost"; 
	$DB_Username = "obdst4rz_arshad";    
	$DB_Password = "arshad@123";                
	$DB_DBName = "obdst4rz_arshadtutorial"; 
	$table = ""; 
	
	
	
function getTokenMessage($token){
	$message="";
	if(strnatcasecmp($token,"success")==0){
		$message="<div class='validateTips' style='background:#4EF572;  color:black;'  >Message: Record Saved Successfully!</div>";
	}else if(strnatcasecmp($token,"fail")==0){
		$message="<div class='validateTips' style='background:#F56F4E; '>Message: Record Could Not Be Saved!</div>";
	}else if(strnatcasecmp($token,"exists")==0){
		$message="<div class='validateTips' style='background:#4E9CF5; '>Message: Record Already Exists!</div>";
	}else if(strnatcasecmp($token,"EDIT_OK")==0){
		$message="<div class='validateTips' style='background:#4EF572; ' >Message: Record Edited Successfully!</div>";
	}else if(strnatcasecmp($token,"EDIT_FAIL")==0){
		$message="<div class='validateTips' style='background:#F56F4E; '>Message: Record Could Not Be Edited!</div>";
	}else if(strnatcasecmp($token,"DELETE_OK")==0){
		$message="<div class='validateTips' style='background:#4EF572; ' >Message: Record Deleted Successfully!</div>";
	}else if(strnatcasecmp($token,"DELETE_FAIL")==0){
		$message="<div class='validateTips' style='background:#F56F4E; '>Message: Record Could Not Be Deleted!</div>";
	}else if(strnatcasecmp($token,"EMPTY")==0){
		$message="<div class='validateTips' style='background:#FC21F4; '>Message: Record Could Not Be Saved. Please Enter Required Fields!</div>";
	}	
	return $message;
}
	

?>
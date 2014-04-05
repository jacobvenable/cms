<?php
	//start session
	session_start();
	
	//ONLINE CHECK
	
	//CAPTICHA CHECK
	
	//variables entered
	$email	= $_POST["username"];	//email
	$puid	= $_POST["puidPass"];	//PUID
	$fname	= $_POST["fNamePass"];	//first name
	$lname	= $_POST["lNamePass"];	//last name
	
	$login = $fname[0].$lname;
	
	//CHECK IF EMPTY
	if( (empty($email)) || (empty($puid)) || (empty($fname)) || (empty($lname)) )
	{
		//errormessage = "xxx";
		header("Location: index.php");
		exit;
	}
	else
	{
		//errormsg = ""
	}
	
	//OPEN DBCONN
	include("Includes/openDBConn.php");

	//FIND USER	
	$sql = "SELECT Username FROM tblpeople WHERE Username='".$login."'";
	
	//search
	$result = mysql_query($sql);
	
	if(empty($result))
		$num_results = 0;
	else
		$num_results = mysql_num_rows($result);
	
	//
	if($num_results = 0)
	{
		//errormessage = "You do not have an account!  Please register for an account or contact a system Administrator"
		header("Location: index.php");
		exit;
	}
	else
	{
		//errormessage = "";
	}
	
	//RANDOM PASSWORD GENERATION
	function randomPassword()
	{
		$alphabet= "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array();
		$alphaLength = strlen($alphabet)-1;
		for($i = 0; $i<8; $i++)
		{
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[n];	
		}
		return implode($pass);
	}
	
	$newPass = randomPassword();
	
	//UPDATE TBLPEOPLE
	for($i=0; $i<$num_results; $i++)
	{
		//fetch user from tblpeople
		$row = mysql_fetch_array($result);
		
		//sql statement to update user password
		$sql2 = "UPDATE tblpeople SET Password='".$newPass."'";
		
		$result2 = mysql_query($sql2);
	}//end Update tblPeople */
	
	//EMAIL NEW PASSWORD TO USER
	if(mysql_num_rows($result))
	{
		//SUBJECT
		$subject = "Your New Cogent Account Information";
		
		//Email Message
		$message	=	"Hello ". $fname ." ".$lname. ","; 
		$message 	.=	"Here is your new login credentials:";
		$message 	.=	"Username:  ".$login;
		$message 	.=	"Password:  ".$newPass;
		
		mail($email, $subject, $message);
		header("Location: index.php");
		exit;
	}
	
?>


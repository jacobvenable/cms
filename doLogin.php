<?php
	//START SESSION
	session_start();
	
	//online check

	//VARIABLES FROM FORM
	$userID		= $_POST["username"];
	$password 	= $_POST["pass"];
		
	//CHECK FOR EMPTY VARIABLES
	if( ($userID=="") || ($password=="") )
	{
		//sesseion errormessage="Please enter your information";
		header("Location: index.php");
		exit;
	}
	else
	{
		//sessionerrormessage = "";	
	}
		
	//OPEN DBCONN
	include("Includes/openDBConn.php");
	
	//CHECK TO SEE IF USER EXISTS
	$sql = "SELECT * FROM tblpeople WHERE Username='".$userID."' AND Password='".$password."'";
	
	//select value from table
	$row = mysql_fetch_array($result);
	
	$result = mysql_query($sql);
	
	if(empty($result))
	{
		$num_records = 0;
	}
	else
	{
		$num_records = mysql_num_rows($result);
	}
	
	if($num_records != 0)
	{
		//session values online = "1";
		$_SESSION["User"] = $userID;
		$_SESSION["BankAccountId"] = $row["BankAccountId"];
		header("Location: home.php");
	}
	else
	{
		//sesseion errormessage="Please enter your information";
		$userID		= "";
		$passWord	= "";
		header("Location: index.php");
		exit;
	}
	
	//PULL VALUES FROM TBL
	
	//CLOSE DBCONN
	include("Includes/closeDBConn.php");
	
	//NEXT PAGE
	
?>
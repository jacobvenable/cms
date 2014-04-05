<?php

	session_start();
	
	//CHECK IF ONLINE
	
	//VARABLES
	$eMail	=	$_POST["email"];		//email address
	$pWord	=	$_POST["passWord"];		//Password
	$cPWord	=	$_POST["conPass"];		//Confirm Password
	$PUID	=	$_POST["puid"];			//PUID
	$fName	=	$_POST["fName"];		//first name
	$lname	=	$_POST["lName"];		//last name
	
	$login_UP 	= 	$fName[0].$lname;		//login username
	$login =  strtolower($login_UP);
	echo $login;
	
	include("includes/openDBConn.php");
	//$sql_Email = "SELECT EMail FROM tblpeople";
	//$result_Email = mysql_query($sql_Email);
	//echo $result_Email;
	//$sql_PUID = "SELECT PUID FROM tblpeople";
	//$result_PUID = mysql_query($sql_PUID);
	include("includes/closeDBConn.php");
	//header("Location: test.php");
	//EMPTY FIELD CHECK
	if(($eMail=="") || ($pWord=="") || ($cPWord=="") || ($PUID=="") || ($fName=="") || ($lname=="") )
	{
		//session error = "Please completely fill out form";
		//redirect to register form
		//header("Location: index.php");
		exit;
	}
	else if($pWord != $cPWord) //Passwords don't match
	{
		//session error = "Passwords do not match";
		//redirect to php header with everything filled with what they posted except both password fields
		exit;
	}
	//else if(($eMail ))
	//{
	//}
	else
	{
		//OPEN DBCONN
		
		
		//SEARCH FOR USER
		$sql = "SELECT Username FROM tblpeople WHERE Username='".$login."'";
		
		//sql search
		$result = mysql_query($sql);
		
		if(empty($result))
			$num_results = 0;
		else
			$num_results = mysql_num_rows($result);
			
		if($num_results != 0)
		{
			//error message - "The Account you are trying to create already exists!"
			//header("Location: index.php");
			exit;	
		}
		else
		{
			////////////////
			//ADD NEW PERSON
			////////////////
			
			//PersonID Counter
			$sqlPeople = "SELECT PersonId FROM tblpeople ORDER BY PersonId DESC LIMIT 1";
			$resultPeople = mysql_query($sqlPeople);
			$row = mysql_fetch_array($resultPeople);
			$personId = $row["PersonId"] + 1;
			//echo $personId;

			//BankAccount Counter
			$sqlBank = "SELECT AccountId FROM tblbankaccounts ORDER BY AccountID DESC LIMIT 1";
			$resultBank = mysql_query($sqlBank);
			$rowBank = mysql_fetch_array($resultBank);
			$BankAcctID = $rowBank["AccountId"] + 1;
			//echo $BankAcctID;
			
			//INSERT INTO DB
			
			//INSERT INTO TBLBANKACCOUNTS
			//SQL Statement
			//$sqlBankInsert = "INSERT INTO tblbankaccounts (AccountId, CurrentBalance, Type, TimeStamp) VALUES ('".$BankAcctID."', '0', 'chkn', '2014-02-03 01:05:59');";
			//mysql_query($sqlBankInsert);
			
			//INSERT INTO TBLPEOPLE
			//SQL statement
			//$sqlPeopleInsert= "INSERT INTO tblpeople (PersonId, PUID, Username, Password, FirstName, LastName, BankAccountId, EMail, IsBanker, TimeStamp) VALUES('".$personId."','".$PUID."','".$login."', '".$pWord."','".$fName."','".$lname."', '".$BankAcctID."', '".$eMail."', 0, '2014-02-03 01:05:59');";
			//mysql_query($sqlPeopleInsert);

			//include("includes/closeDBConn.php");
	
			/*EMAIL USER ACCOUNT INFO
			//SUBJECT
			$subject = "Your New Cogent Account Information";
			
			//Email Message
			$message	=	"Hello ". $fName ." ". $lname. ",";
			$message	.=	" "; 
			$message 	.=	"Here are your new login credentials:";
			$message 	.=	"Username:  ". $login;
			$message 	.=	"Password:  ". $pWord;
			$message	.=	" ";
	
			
			mail($eMail, $subject, $message);
			*/
		
			//HEAD TO USER HOME PAGE
			
			exit;
			//null error message	
		}
	}
	
	
	
	

?>
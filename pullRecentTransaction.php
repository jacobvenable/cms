<?php
//SESSION START
session_start();

$_SESSION["BankAccountId"] = "";

//CONNECT TO DB
include("includes/openDBConn.php");

//CALCULATING RUNNING BALANCE



//SELECT TOP 5 TRANSACTIONS 
$sql = "SELECT PersonId, WithdrawAccount, DepositAccount, TransactionID, trans.TimeStamp, Amount, Executor, Notes FROM tblbankaccounttransactions trans, tblpeople WHERE Username='".$_SESSION["login"]."' AND (PersonId=WithdrawAccount OR PersonId=DepositAccount) ORDER BY TransactionId desc LIMIT 5";
$result = mysql_query($sql);


//ECHO BALANCE
echo $sql." <br/>";

//CLOSE DBCONN

if($result==FALSE){
	die(mysql_error());
	echo "This shit dont work";
}

echo "<table border='1'>
	<tr>
		<th>ID</th>
		<th>Date</th>
		<th>Executor</th>
		<th>Notes</th>
		<th>Amount</th>
		<th>total</th>
	</tr>";
	
	//get running balance
	
	$sqlBalanceCheck="SELECT CurrentBalance FROM tblBankAccounts WHERE AccountId = ". $_SESSION["accountId"] .";";
	echo($sqlBalanceCheck);
		$balanceResult = mysql_query($sqlBalanceCheck);
		
		$rowBalance=mysql_fetch_array($balanceResult);
		$runningBalance = $rowBalance['CurrentBalance'];
		//$balanceAmount = $rowBalance['Balance'];

/*
SELECT Tran, credit, debit, time, balance
FROM
(
  SELECT t.*, @n := IF(@g <> id, 0, @n) + COALESCE(credit,0) - COALESCE(debit, 0) balance, @g := id
    FROM table1 t, (SELECT @n := 0) n, (SELECT @g := 0) g
   ORDER BY id, time
) q

*/


/*
	//Need transsactionID, Timestamp amount
		$sqlBalance = "SELECT Username, PersonId, WithdrawAccount, DepositAccount, SUM(Amount) FROM tblbankaccounttransactions, tblpeople WHERE  Username='".$_SESSION["login"]."' AND (PersonId=WithdrawAccount OR PersonId=DepositAccount) GROUP BY TransactionId";
		
		$balanceResult = mysql_query($sqlBalance);
		
		$rowBalance=mysql_fetch_array($balanceResult);
		
		$balanceAmount = $rowBalance['SUM(Amount)'];
	//*/
	
	while($row = mysql_fetch_array($result))
	{
		//GET EXECUTOR NAME
		$sql2 = "SELECT ppl.PersonId, ppl.FirstName, ppl.LastName, trans.Executor FROM tblbankaccounttransactions trans, tblpeople ppl WHERE trans.Executor='".$row['Executor']."' AND trans.Executor=ppl.PersonId";
		
		$resultName = mysql_query($sql2);
		
		$rowName=mysql_fetch_array($resultName);
		
		$Executor = $rowName['FirstName']." ".$rowName['LastName'];

		//GET RUNNING BALANCE
		//timestamp
		$sqlTimeStamp		= "SELECT trans.TimeStamp FROM tblbankaccounttransactions trans where trans.TransactionId='".$row['TransactionID']."'";
		$resultTimeStamp	= mysql_query($sqlTimeStamp);
		$rowTimeStamp		= mysql_fetch_array($resultTimeStamp);
		$timeStamp			=$rowTimeStamp['TimeStamp'];
	/*	
		//runing balance
			//Need transsactionID, Timestamp amount
		$sqlBalance = "SELECT Username, PersonId, WithdrawAccount, DepositAccount, SUM(Amount) FROM tblbankaccounttransactions tblpeople WHERE TransactionID='".$row['TransactionID']."'";
		
		$balanceResult = mysql_query($sqlBalance);
		
		$rowBalance=mysql_fetch_array($balanceResult);
		
		$balanceAmount = $rowBalance['SUM(Amount)'];
		
		//*/
		//echo $sqlTimeStamp."<br/>  ". "TimeStamp: " . $timeStamp . " <br/>" . "Running Balance: ".$balanceAmount . "<br/>";
		
		//ECHO OUT
		echo "<tr>";
			echo "<td>".$row['TransactionID']."</td>";
			echo "<td>".$row['TimeStamp']."</td>";
			echo "<td>".$Executor."</td>"	;
			echo "<td>".$row['Notes']."</td>";	
			echo "<td>".$row['Amount']."</td>";
			echo "<td>".$runningBalance."</td>";							
		echo "</tr>";
		
		if($row['WithdrawAccount'] == $_SESSION["accountId"])
		{
			$runningBalance = $runningBalance - $row['Amount'];
		}
		else
		{
			$runningBalance = $runningBalance + $row['Amount'];
		}
	}
echo "</table>";

//function display all

include("includes/closeDBConn.php");

?>

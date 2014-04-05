<?php
//SESSION START
session_start();

$_SESSION["login"]="tburton";

//CONNECT TO DB
include("includes/openDBConn.php");

//CALCULATING RUNNING BALANCE



//SELECT TOP 5 TRANSACTIONS 
$sql = "SELECT PersonId, WithdrawAccount, DepositAccount, TransactionID, trans.TimeStamp, Amount, Executor, Notes FROM tblbankaccounttransactions trans, tblpeople WHERE Username='".$_SESSION["login"]."' AND (PersonId=WithdrawAccount OR PersonId=DepositAccount) ORDER BY TransactionId LIMIT 5 desc";
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
//	while($row = mysql_fetch_array($result))
	for ($i = 0; $i<5; $i++)
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
		
		//runing balance
			//Need transsactionID, Timestamp amount
		$sqlBalance = "SELECT Username, PersonId, WithdrawAccount, DepositAccount, SUM(Amount) FROM tblbankaccounttransactions tblpeople WHERE Username='".$_SESSION["login"]."' AND (PersonId=WithdrawAccount OR PersonId=DepositAccount) ";
		
		$balanceResult = mysql_query($sqlBalance);
		
		$rowBalance=mysql_fetch_array($balanceResult);
		
		$balanceAmount = $rowBalance['SUM(Amount)'];
		
		
		echo $sqlTimeStamp."<br/>  ". "TimeStamp: " . $timeStamp . " <br/>" . $balanceAmount . "<br/>";
		
		//ECHO OUT
		echo "<tr>";
			echo "<td>".$row['TransactionID']."</td>";
			echo "<td>".$row['TimeStamp']."</td>";
			echo "<td>".$Executor."</td>"	;
			echo "<td>".$row['Notes']."</td>";	
			echo "<td>".$row['Amount']."</td>";
			echo "<td>".""."</td>";							
		echo "</tr>";
	}
echo "</table>";

//function display all

include("includes/closeDBConn.php");

?>

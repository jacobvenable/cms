<?php
	include("includes/openDbConn.php");
	$sql = "SELECT * FROM tblBankAccountTypes";
	$result = mysql_query($sql);
	$numMatches = mysql_num_rows($result);
	for($counter=0; $counter < $numMatches; $counter++)
	{
		$row = mysql_fetch_array($result);
		$sqlInsert = "INSERT INTO tblBankAccountTypes(BankAccountTypeId, Name, Description, Active, TimeStamp) VALUES('".trim($row["BankAccountTypeId"])."','".trim($row["Name"])."','".trim($row["Description"])."','".trim($row["Active"])."','".trim($row["TimeStamp"])."');<br/>";
		echo($sqlInsert);
	}
	include("includes/closeDbConn.php");
?>
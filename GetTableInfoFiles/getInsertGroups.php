<?php
	include("includes/openDbConn.php");
	$sql = "SELECT * FROM tblGroups";
	$result = mysql_query($sql);
	$numMatches = mysql_num_rows($result);
	for($counter=0; $counter < $numMatches; $counter++)
	{
		$row = mysql_fetch_array($result);
		$sqlInsert = "INSERT INTO tblGroups(GroupId, Name, TimePeriodId, Description, Ticker, NumStocks, NumAvailableStocks, BankAccountId, Active, TimeStamp) VALUES('".trim($row["GroupId"])."','".trim($row["Name"])."','".trim($row["TimePeriodId"])."','".trim($row["Description"])."','".trim($row["Ticker"])."','".trim($row["NumStocks"])."','".trim($row["NumAvailableStocks"])."','".trim($row["BankAccountId"])."','".trim($row["Active"])."','".trim($row["TimeStamp"])."');<br/>";
		echo($sqlInsert);
	}
	include("includes/closeDbConn.php");
?>
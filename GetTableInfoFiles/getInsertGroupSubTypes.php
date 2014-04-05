<?php
	include("includes/openDbConn.php");
	$sql = "SELECT * FROM tblPeople";
	$result = mysql_query($sql);
	$numMatches = mysql_num_rows($result);
	for($counter=0; $counter < $numMatches; $counter++)
	{
		$row = mysql_fetch_array($result);
		$sqlInsert = "INSERT INTO tblPeople(PersonId, PUID, Username, Password, FirstName, LastName, BankAccountID, EMail, Phone, Address1, Address2, IsBanker, TimeStamp) VALUES('".trim($row["PersonId"])."','".trim($row["PUID"])."','".trim($row["Username"])."','".trim($row["Password"])."','".trim($row["FirstName"])."','".trim($row["LastName"])."','".trim($row["BankAccountId"])."','".trim($row["EMail"])."','".trim($row["Phone"])."','".trim($row["Address1"])."','".trim($row["Address2"])."','".trim($row["IsBanker"])."','".trim($row["TimeStamp"])."');<br/>";
		echo($sqlInsert);
	}
	include("includes/closeDbConn.php");
?>
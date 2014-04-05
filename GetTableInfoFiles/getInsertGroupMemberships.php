<?php
	include("includes/openDbConn.php");
	$sql = "SELECT * FROM tblGroupMemberships";
	$result = mysql_query($sql);
	$numMatches = mysql_num_rows($result);
	for($counter=0; $counter < $numMatches; $counter++)
	{
		$row = mysql_fetch_array($result);
		$sqlInsert = "INSERT INTO tblGroupMemberships(PersonId, GroupId, TimePeriodId, TimeStamp) VALUES('".trim($row["PersonId"])."','".trim($row["GroupId"])."','".trim($row["TimePeriodId"])."','".trim($row["TimeStamp"])."');<br/>";
		echo($sqlInsert);
	}
	include("includes/closeDbConn.php");
?>
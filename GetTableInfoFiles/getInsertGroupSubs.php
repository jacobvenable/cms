<?php
	include("includes/openDbConn.php");
	$sql = "SELECT * FROM tblGroupSubmission";
	$result = mysql_query($sql);
	$numMatches = mysql_num_rows($result);
	for($counter=0; $counter < $numMatches; $counter++)
	{
		$row = mysql_fetch_array($result);
		$sqlInsert = "INSERT INTO tblGroupSubmission(SubmissionId, GroupId, TimePeriod, Type, Notes, Status, Reward, TimeStamp)	VALUES('".trim($row["SubmissionId"])."','".trim($row["GroupId"])."','".trim($row["TimePeriod"])."','".trim($row["Type"])."','".trim($row["Notes"])."','".trim($row["Status"])."','".trim($row["Reward"])."');<br/>";
		echo($sqlInsert);
	}
	include("includes/closeDbConn.php");
?>
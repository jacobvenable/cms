<?php
	include("includes/openDbConn.php");
	$sql = "SELECT * FROM tblGroupSubmissionAudits";
	$result = mysql_query($sql);
	$numMatches = mysql_num_rows($result);
	for($counter=0; $counter < $numMatches; $counter++)
	{
		$row = mysql_fetch_array($result);
		$sqlInsert = "INSERT INTO tblGroupSubmissionAudits(SubmissionId, AuditorId,Anomalies,Inconsistencies,Opinion) VALUES('".trim($row["SubmissionId"])."','".trim($row["AuditorId"])."','".trim($row["Anomalies"])."','".trim($row["Inconsistencies"])."','".trim($row["Opinion"])."');<br/>";
		echo($sqlInsert);
	}
	include("includes/closeDbConn.php");
?>
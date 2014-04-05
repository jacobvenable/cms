<?php
	include("includes/openDbConn.php");
	$sql = "SELECT * FROM tblAccessLevels";
	$result = mysql_query($sql);
	$numMatches = mysql_num_rows($result);
	for($counter=0; $counter < $numMatches; $counter++)
	{
		$row = mysql_fetch_array($result);
		$sqlInsert = "INSERT INTO tblAccessLevels(AccessLevel, Name, Description) VALUES('".trim($row["AccessLevel"])."','".trim($row["Name"])."','".trim($row["Description"])."');<br/>";
		echo($sqlInsert);
	}
	include("includes/closeDbConn.php");
?>
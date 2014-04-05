<?php
	include("includes/openDbConn.php");
	$sql = "SELECT * FROM tblGradeTypes";
	$result = mysql_query($sql);
	$numMatches = mysql_num_rows($result);
	for($counter=0; $counter < $numMatches; $counter++)
	{
		$row = mysql_fetch_array($result);
		$sqlInsert = "INSERT INTO tblGradeTypes(Grade) VALUES('".trim($row["Grade"])."');<br/>";
		echo($sqlInsert);
	}
	include("includes/closeDbConn.php");
?>
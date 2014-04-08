<?php

$login = $_SESSION["login"];

// Find user stocks

$sqlPersonId = "SELECT PersonId FROM tblpeople WHERE Username = '".$login."'";
$resultPersonId = mysql_query($sqlPersonId);
$rowPersonId = mysql_fetch_array($resultPersonId);
$personId = $rowPersonId['PersonId'];

echo $login;
echo $personId;

?>
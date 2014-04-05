<?php
@ $db = mysql_pconnect("", "", "");
mysql_select_db("");

if(!$db){
	echo "Error: Unable to connect to database";
	exit;
}
?>
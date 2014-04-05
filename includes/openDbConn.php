<?php
@ $db = mysql_pconnect("localhost", "honeybadger", "DontCare");
mysql_select_db("411honeybadgers14");

if(!$db){
	echo "Error: Unable to connect to database";
	exit;
}
?>
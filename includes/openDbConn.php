<?php
@ $db = mysql_pconnect("localhost", "root", "tangoeli");
mysql_select_db("cogentMS");

if(!$db){
	echo "Error: Unable to connect to database";
	exit;
}
?>
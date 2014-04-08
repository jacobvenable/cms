<?php
$login = $_SESSION["login"];
include("Includes/openDBConn.php");
// Find user stocks

$sqlPersonId = "SELECT PersonId FROM tblPeople WHERE Username = '".$login."'";
$resultPersonId = mysql_query($sqlPersonId);
$rowPersonId = mysql_fetch_array($resultPersonId);
$personId = $rowPersonId['PersonId'];

$sqlStocks = "SELECT * FROM tblpeoplestockholdings WHERE PersonId = '".$personId."' ORDER BY totalInvested DESC";
$resultStocks = mysql_query($sqlStocks);
$stocks = mysql_num_rows($resultStocks);


for($i = 0; $i < $stocks; $i++)
{
	$rowStocks = mysql_fetch_array($resultStocks);
	$stockGroupId = $rowStocks['GroupId']; //Gets group ID's of groups user has purchased stock from
	$numStocks = $rowStocks['NumStocks'];
	
	$sqlGroups = "SELECT TICKER FROM tblgroups WHERE GroupId = '".$stockGroupId."'";
	$resultGroups = mysql_query($sqlGroups);
	$rowTicker = mysql_fetch_array($resultGroups);
	$groupTicker = $rowTicker['TICKER'];
	
	$sqlPrice = "SELECT Price FROM tblstockprices WHERE GroupId = '".$stockGroupId."'";
	$resultPrice = mysql_query($sqlPrice);
	$rowPrice = mysql_fetch_array($resultPrice);
	$price = $rowPrice['Price'];
		
	echo "<div id=\"stock\"".$stocks." class=\"infoTile stockTile\">";
	echo "<h3>".$groupTicker."</h3>";
	echo "<div class=\"stockLabels\">";
	echo "<h5>shares</h5>";
	echo "<h5>value</h5>";
	echo "</div>";
	echo "<div class=\"stockValues\">";
	echo "<h5>".$numStocks."</h5>";
	echo "<h5 class=\"shareValue\"><span class=\"super\">$</span>".$price."<span class=\"perShare\">/sh</span></h5>";
	echo "</div>";
	echo "<div class=\"buySellContainer\">";
	echo "</div>";
	echo "</div>";
}

?>





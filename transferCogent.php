<?php
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>")
?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/transferCogent.css" />
	<script type="text/javascript" src="js/jquery-1.11.0.min.js" ></script>
		<script type="text/javascript" src="js/easing.js" ></script>
	</head>
	<body>
	<?php include("nav.php"); ?>
		<div id="transferMain" class="maincontainer">
			<h1>Transfer Cogent</h1>
			<div id="transferCogentContainer" class="infoTile">
			<form action="doTransferCogent.php" method="post">
				<div id="transferRecipientAmount">
				<input type="radio" name="recipientType" value="male"><label for="recipientType" >Individual</label>
				<input type="radio" name="recipientType" value="female"><label for="recipientType" >Group</label><br />
					<label id="recipientLabel" for="recipient">Recipient</label><br/><input type="text" name="recipient" />
					<label for="amountCogent">Amount</label><br/><input type="number" name="amountCogent" />
				</div>
				<div id="memoContainer">
					<label for="tranferMemo">Note</label><textarea></textarea>
					<input type="submit" value="Transfer Cogent" />
				</div>
			</form>
			</div>
		</div>
	</body>
</html>

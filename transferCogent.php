<?php
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>")
?>
<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<div id="transferMain" class="maincontainer">
			<h1>Transfer Cogent</h1>
			<div id="transferCogentContainer">
			<form action="doTransferCogent.php" method="post">
				<label for="recipient">Recipient</label><input type="text" name="recipient" />
				<label for="amountCogent">Amount</label><input type="number" name="amountCogent" />
				<label for="transferMemo">Memo</label><textarea></textarea>
				<input type="submit" value="Transfer Cogent" />
			</form>
			</div>
		</div>
	</body>
</html>

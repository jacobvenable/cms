<?php
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>")
?>
<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/transactionHistory.css" />
	
</head>
<body>
<?php include("nav.php"); ?>
	<div id="transactionHistoryMain" class="maincontainer" >
		<h1>Transaction History</h1>
		<div id="transactionTile" class="infoTile">
			<div id="transaction14" class="transactionHistoryElement">
				<div class="timestampHolder">
					<h3>Jan 22nd</h3>
					<h5>7:03pm</h5>
				</div>
				<div class="infoFromHolder">
					<h3>From: Jane Doe</h3>
					<h5>Memo: Project Help Payment</h5>
				</div>
				<div class="amountBalanceHolder">
					<h3>Credit: +100.00</h3>
					<h5>Balance: 150,000.00</h5>
				</div>
			</div>

			<div id="transaction6" class="transactionHistoryElement">
				<div class="timestampHolder">
					<h3>Jan 4th</h3>
					<h5>8:03pm</h5>
				</div>
				<div class="infoFromHolder">
					<h3>From: Martin Smith</h3>
					<h5>Memo: Just Becuase</h5>
				</div>
				<div class="amountBalanceHolder">
					<h3>Credit: +50.00</h3>
					<h5>Balance: 149,900.00</h5>
				</div>
			</div>

			<div id="transaction4" class="transactionHistoryElement">
				<div class="timestampHolder">
					<h3>Dec 8th</h3>
					<h5>9:44pm</h5>
				</div>
				<div class="infoFromHolder">
					<h3>To: Admin</h3>
					<h5>Memo: Weekly Living Expenses</h5>
				</div>
				<div class="amountBalanceHolder">
					<h3>Credit: +300.00</h3>
					<h5>Balance: 149,850.00</h5>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
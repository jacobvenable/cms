<?php
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>")
?>
<!DOCTYPE HTML>
<html>
<head>
	<style>
		.requestHistoryElement{
			border: #000 1px solid;
		}
	</style>
</head>
<body>
	<div id="requestHistoryMain" class="maincontainer" >
		<h1>Request History</h1>
		<div id="request14" class="requestHistoryElement">
			<div class="timestampHolder">
				<h3>Jan 22nd</h3>
				<h5>7:03pm</h5>
			</div>
			<div class="infoRequestHolder">
				<h3>Type: Type 3</h3>
				<h5>Memo: Project Help Payment</h5>
			</div>
			<div class="amountStatusHolder">
				<h3>Request Amount: 100.00</h3>
				<h5>Approval: Pending</h5>
			</div>
		</div>

		<div id="request6" class="requestHistoryElement">
			<div class="timestampHolder">
				<h3>Jan 4th</h3>
				<h5>8:03pm</h5>
			</div>
			<div class="infoRequestHolder">
				<h3>Type: Type 4</h3>
				<h5>Memo: Just Becuase</h5>
			</div>
			<div class="amountStatusHolder">
				<h3>Request Amount: 50.00</h3>
				<h5>Status: Denied</h5>
			</div>
		</div>

		<div id="request4" class="requestHistoryElement">
			<div class="timestampHolder">
				<h3>Dec 8th</h3>
				<h5>9:44pm</h5>
			</div>
			<div class="infoRequestHolder">
				<h3>Type: Type 6</h3>
				<h5>Memo: Weekly Living Expenses</h5>
			</div>
			<div class="amountStatusHolder">
				<h3>Request Amount: 300.00</h3>
				<h5>Status: Approved</h5>
			</div>
		</div>
	</div>
</body>
</html>
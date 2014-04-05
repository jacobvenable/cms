<?php
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>")
?>
<!DOCTYPE HTML>
<html>
	<head>
	</head>
	<body>
		<div id="stockMarketMain" class="maincontainer">
			<h1>Stock Market</h1>
			<form><select><option>Spring 2014</option><option>Fall 2013</option><option>Spring 2013</option></select></form>
			<div id="stockEntry1" class="stockEntryElement">
				<div class="timestampHolder">
					<h3>HBD</h3>
					<h5>+ $1.24</h5>
				</div>
				<div class="infoRequestHolder">
					<h3>Honey Badger</h3>
					<h5>6000/6000 shares available</h5>
				</div>
				<div class="amountStatusHolder">
					<h3>Current Value</h3>
					<h5>$23.15</h5>
				</div>
				<div class="buttonHolder">
					<button>Buy</button>
				</div>
			</div>
			<div id="stockEntry2" class="stockEntryElement">
				<div class="timestampHolder">
					<h3>FOF</h3>
					<h5>+ $0.24</h5>
				</div>
				<div class="infoRequestHolder">
					<h3>Focus Filter</h3>
					<h5>6000/6000 shares available</h5>
				</div>
				<div class="amountStatusHolder">
					<h3>Current Value</h3>
					<h5>$16.50</h5>
				</div>
				<div class="buttonHolder">
					<button>Buy</button>
				</div>
			</div>
		</div>

		<div id="buyPopup" class="popup">
			<h3>Invest in Company Name</h3>
			<form>
				<input type="number" name="buyStockAmount" /><label for="buyStockAmount">Shares</label>
				<h4>@ 0.00/share</h4>
				<h3>Total Investment: 0.00</h3>
				<input type="submit" value="Buy" />
				<button>Cancel</button>
			</form>
		</div>

	</body>
</html>
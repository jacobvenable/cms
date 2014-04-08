<?php
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
	session_start();
?>
<div id="header">
	<div id="headerCenterContainer">
		<div id="headerTop">
			<img src="" alt="" />
			<h1>Cogent Management System</h1>
			<h4><?php echo $_SESSION["FirstName"] . " " . $_SESSION["LastName"] . " | " . $_SESSION["BankAccountBalance"]; ?> | <a href="logout.php">Logout</a></h4>
		</div>
		<div id="headerBottom">
			<div id="mainNavHolder"><ul id="mainNav">
				<li>Home</li>
				<li>Manage Finances
					<ul id="manageFinancesSubNav" class="subnav">
						<li>Request Cogent</li>
						<li>Request History</li>
						<li>Transcation History</li>
						<li>Transfer Cogent</li>
						<li>Manage Stocks</li>
					</ul>
				</li>
				<li>Stock Market</li>
				<li>My Stats</li>
				<li>Cogent Events</li>
			</ul>
			</div>
		</div>
	</div>
</div>
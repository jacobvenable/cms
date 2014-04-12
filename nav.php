<?php
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
	session_start();
?>
<div id="headerDesktop">
	<div id="headerCenterContainer">
		<div id="headerTop">
			<img src="" alt="" />
			<h1>Cogent Management System</h1>
			<h4><?php echo $_SESSION["FirstName"] . " " . $_SESSION["LastName"] . " | " . $_SESSION["BankAccountBalance"]; ?> | <a href="logout.php">Logout</a></h4>
		</div>
		<div id="headerBottom">
			<div id="mainNavHolder"><ul id="mainNav">
				<li>Home</li>
				<li id="manageFinances">Manage Finances
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

<div id="headerMobile">
	<div id="hamburger"></div>
	<div id="textContainer">
	<h1>Cogent Management System</h1>
	<h4><?php echo $_SESSION["FirstName"] . " " . $_SESSION["LastName"] . " | " . $_SESSION["BankAccountBalance"]; ?></h4>
	</div>
</div>

<div id="mobileLevel1" class="mobileMenu">
	<ul id="level1Links">
		<li>Home</li>
		<li id="manageFinancesMobile">Manage Finances</li>
		<li>Stock Market</li>
		<li>My Stats</li>
		<li>Cogent Events</li>
		<li>Logout</li>
	</ul>
</div>

<div id="mobileLevel2" class="mobileMenu">
	<ul id="level2Links">
		<li>Request Cogent</li>
		<li>Request History</li>
		<li>Transcation History</li>
		<li>Transfer Cogent</li>
		<li>Manage Stocks</li>
		<li id="level2back">Back</li>
	</ul>
</div>
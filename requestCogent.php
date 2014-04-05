<?php
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>")
?>
<!DOCTYPE HTML>
<html>
	<head>
	</head>
	<body>
		<div id="requestCogentMain" class="maincontainer">
			<h1>Request Cogent</h1>
			<button>+ Add</button>
			<button>Submit</button>

			<div id="requestCogentEntry1" class="cogentRequestForm">
				<form action="doSubmitCogent.php" method="post">
					<label for="requestType">Type</label><select name="requestType"><option>Type 1</option><option>Type 2</option><option>Type 3</option></select>
					<label for="requestAmount">Amount</label><select name="requestAmount"><option>50</option><option>100</option><option>Other</option></select>
					<label for="requestMemo">Memo</label><textarea name="requestMemo"></textarea>
				</form>
			</div>
			<!-- will create a javascript function for adding an removing these as necessary -->
			<button>+ Add</button>
			<button>Submit</button>
		</div>
	</body>
</html>
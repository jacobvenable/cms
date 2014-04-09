<?php
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>")
?>
<!DOCTYPE HTML>
<html>
	<head>
				<link rel="stylesheet" type="text/css" href="css/requestCogent.css" />
	<script type="text/javascript" src="js/jquery-1.11.0.min.js" ></script>
		<script type="text/javascript" src="js/easing.js" ></script>
	<script>
		$(document).ready(function(){
			var entryCount = 1;
			var entry = '<div id="requestCogentEntry'+ entryCount + '" class="cogentRequestForm infoTile"><div id="transferRecipientAmount"><label for="requestType">Type</label><select name="requestType'+ entryCount + '"><option>Type 1</option><option>Type 2</option><option>Type 3</option></select><label for="requestCat'+ entryCount + '">Category</label><select name="requestCat'+ entryCount + '"><option>Type 1</option><option>Type 2</option><option>Type 3</option></select><label for="requestAmount">Amount</label><select name="requestAmount'+ entryCount + '"><option>50</option><option>100</option><option>Other</option></select></div><div id="memoContainer"><label for="tranferMemo'+ entryCount + '">Note</label><textarea></textarea><input type="submit" value="Transfer Cogent"></div></div>'

			$('#adder').click(function(){
				
				console.log(entryCount);
				var temp = $('#doRequestCogent').html();
				var entry = '<div id="requestCogentEntry'+ entryCount + '" class="cogentRequestForm infoTile"><div id="transferRecipientAmount"><label for="requestType">Type</label><select name="requestType'+ entryCount + '"><option>Type 1</option><option>Type 2</option><option>Type 3</option></select><label for="requestCat'+ entryCount + '">Category</label><select name="requestCat'+ entryCount + '"><option>Type 1</option><option>Type 2</option><option>Type 3</option></select><label for="requestAmount">Amount</label><select name="requestAmount'+ entryCount + '"><option>50</option><option>100</option><option>Other</option></select></div><div id="memoContainer"><label for="tranferMemo'+ entryCount + '">Note</label><textarea></textarea><input type="submit" value="Transfer Cogent"></div></div>'

				$('#doRequestCogent').html(temp + entry);
				$('.cogentRequestForm').eq(entryCount).hide();
				$('.cogentRequestForm').eq(entryCount).fadeIn();
				entryCount+=1;
				console.log(temp);
			});
		});
	</script>
	</head>
	<body>
		<?php include("nav.php"); ?>
		<div id="requestCogentMain" class="maincontainer">
			<h1>Request Cogent</h1>
			<button id="adder">+ Add</button>
			<button>Submit</button>
<<<<<<< HEAD
			<form id="doRequestCogent" action="doRequestCogent.php" method="post">
			<div id="requestCogentEntry0" class="cogentRequestForm infoTile">
				
					<div id="transferRecipientAmount">
				
					<label for="requestType">Type</label><select name="requestTyp0e"><option>Type 1</option><option>Type 2</option><option>Type 3</option></select>
					<label for="requestType">Category</label><select name="requestCat0"><option>Type 1</option><option>Type 2</option><option>Type 3</option></select>
					<label for="requestAmount">Amount</label><select name="requestAmount0"><option>50</option><option>100</option><option>Other</option></select>
				</div>
				<div id="memoContainer">
					<label for="tranferMemo">Note</label><textarea></textarea>
					<input type="submit" value="Transfer Cogent" />
				</div>
				
=======

			<div id="requestCogentEntry1" class="cogentRequestForm">
				<form action="doSubmitCogent.php" method="post">
					<label for="requestType">Type</label><select name="requestType"><option>Type 1</option><option>Type 2</option><option>Type 3</option></select>
					<label for="requestAmount">Amount</label><select name="requestAmount"><option>50</option><option>100</option><option>Other</option></select>
					<label for="requestMemo">Memo</label><textarea name="requestMemo"></textarea>
				</form>
>>>>>>> ce2a8ad23665b8ac2464f7d003bb86a1dcc40184
			</div>
			</form>
			<!-- will create a javascript function for adding an removing these as necessary -->
			<button>+ Add</button>
			<button>Submit</button>
		</div>
	</body>
</html>




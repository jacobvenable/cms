<?php
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
	include("includes/openDbConn.php");
?>
<!DOCTYPE html>
<html> 
<head>
	<script type="text/javascript" src="js/jquery-1.11.0.min.js" ></script>
	<script type="text/javascript" src="js/home.js" ></script>
	<script type="text/javascript" src="js/easing.js" ></script>
	<link rel="stylesheet" type="text/css" href="css/home.css" />
</head>
<body>
	<!-- nav import will happen around here -->
    <?php include("nav.php");?>
	<div id="homeMain" class="maincontainer">
		<div id="nameBalance">
		<h1>Home</h1>
		</div>
		<!-- stats container holds a breief overview of the users stats -->
		<div id="statsContainer" class="homepageElement">
			<h3>My Stats</h3>
			<canvas id="myChart" width="400" height="400" style="display:none"></canvas>
				<script>
				var progress = <?php echo($_SESSION["BankAccountBalance"]); ?>;
				var total = 405000;
				var animateProgress = 0;
				var	stepnumber = 60;
				
				var step = progress/stepnumber;
				//var level = 0;

				var stageSize = 0;
				var stageLength =0;
				var stageDisplay = 0;

				var stockCurrentStage = 0;
				var stockMaxStages = 0;

				var eventCurrentStage =0;
				var eventMaxStages = 0;
				


					function drawGraph(width,progress,total){
						var ctx = document.getElementById("myChart").getContext("2d");
						var canvas = document.getElementById('myChart');
						//var progress will use the admin determined "a" value and then the users cogent balance to generate the progress bar//
						var progressVal = progress/total;
						var level = 5;
						ctx.clearRect(0, 0, canvas.width, canvas.height);
						ctx.beginPath();
						ctx.arc((width/2),(width/2),(width*.4),-.5*Math.PI,1.5*Math.PI);
						ctx.strokeStyle="#f2f2f2";
						ctx.lineWidth=width*.2;
						ctx.stroke();

						
						
						
						var bigFontSize = width*.3+"px";
						var fontFamily = "DroidSansRegular"
						ctx.font= bigFontSize +" "+ fontFamily;
						ctx.textAlign = "center";
						ctx.fillStyle = '#333';
						ctx.fillText(level,(width/2),(width*.65));

						var smallFontSize = width*.06+"px";
						ctx.font= smallFontSize +" "+ fontFamily;
						ctx.fillText("LEVEL",(width/2),(width*.4125));
						
						//will add an animation effect on javascript dev stage
						ctx.beginPath();
						ctx.arc((width/2),(width/2),width*.4,-.5*Math.PI,(((progressVal)*Math.PI*2)-.5*Math.PI));
						ctx.strokeStyle="#52b352";
						ctx.lineWidth=width*.2;
						ctx.stroke();

						$('#progressCounter').html(Math.floor(progress/1000)+"K<span>/"+total/1000+"K</span>");

					}			
					//console.log($('#statsContainer').width());
					//drawGraph($('#statsContainer').width(),3,progress,total);

					function animateDraw(reDraw){
						if(reDraw == 1){
							animateProgress = 0;
							document.getElementById("myChart").width = $('#statsContainer').width();
            				document.getElementById("myChart").height = $('#statsContainer').width();
						}
						animateProgress += step;
						if(reDraw ==2){
							animateProgress = progress;
							document.getElementById("myChart").width = $('#statsContainer').width();
            				document.getElementById("myChart").height = $('#statsContainer').width();
						}
						drawGraph(($('#statsContainer').width()*.99),animateProgress,total);
						if(animateProgress < progress){
							setTimeout(function(){
								animateDraw()},8.33333333);
						}
					}

					function balancer(){
						if($(window).width()>1000)
						{
							var transTableHeight = $('#transactionTable').height();
							var statHeight= ($('#myChart').outerHeight(true) + ($('#progressCounter').outerHeight(true) ));

							console.log($('#progressCounter').outerHeight());
							$('#transactionTable').height(statHeight -22);

						}

						$('.homepageElement').css('margin-bottom',($('#homeMain').width()*.02));

					}

					function infoTileResizer(){
						
						baseWidth = $('#stocksContainer').width();
						

						$('.infoTile').width(baseWidth*.24-4);
						$('.infoTile').css('padding',baseWidth*.04);
						$('.infoTile').css('margin-right',baseWidth*.02);
						$('.controls').width($('.stockTile').outerWidth()*.25);
						$('.controls').height($('.stockTile').outerHeight());
						$('#nextStock').css('left',"-"+$('.controls').width()+"px");

						//console.log($('.eventTile').outerWidth());
						$('#prevEvent').width($('.eventTile').outerWidth()*.25);
						$('#nextEvent').width($('.eventTile').outerWidth()*.25);
						$('#prevEvent').height($('.eventTile').outerHeight());
						$('#nextEvent').height($('.eventTile').outerHeight());
						$('#nextEvent').css('left',"-"+$('.controls').width()+"px");

						
						stageDisplay = 3;
						stageSize = 1;
						stageLength = ($('.stockTile').outerWidth()+$('#stocksContainer').width()*.02);
							
						stockMaxStages = ($('.stockTile').length) - stageDisplay;
							
						eventMaxStages = ($('.eventTile').length) - stageDisplay;
						
						
						$('#toScrollStocks').css('left',"-"+(stageLength * stockCurrentStage)+"px");
						$('#toScrollEvents').css('left',"-"+(stageLength * eventCurrentStage)+"px");

						if(stockCurrentStage == 0){
							$('#prevStock').hide();
						}

						if(eventCurrentStage == 0){
							$('#prevEvent').hide();
						}

						if(stockCurrentStage >= stockMaxStages){
							$('#nextStock').hide();
						}

						if(eventCurrentStage >= eventMaxStages){
							$('#nextEvent').hide();
						}

							
					}


				
					

					$(window).resize(function(){
						animateDraw(2);
						balancer();
						infoTileResizer();

						

					});



					$(document).ready(function(){
						$('#myChart').fadeIn('slow');
						animateDraw(1);
						balancer();
						infoTileResizer();
						$('#transactionTable').hide();
						$('#transactionTable').fadeIn('slow');
						
						
						$('#nextStock').click(function(){
							
							if(stockCurrentStage != stockMaxStages)
							{
								$('#toScrollStocks').animate({
									left: "-="+stageLength+"px"
								},300,'easeOutBack');
								stockCurrentStage++;
								console.log(stockCurrentStage);
							}

							if(stockCurrentStage ==1){
								$('#prevStock').fadeIn();
							}

							if(stockCurrentStage == stockMaxStages){
							$('#nextStock').fadeOut();
							}

							


						});

						$('#prevStock').click(function(){

							if(stockCurrentStage != 0)
							{
								$('#toScrollStocks').animate({
									left : "+="+stageLength+"px"	
								},300,'easeOutBack');
								stockCurrentStage--;
							}

							

							if(stockCurrentStage == 0){
								$('#prevStock').fadeOut();
							}

							if(stockCurrentStage == (stockMaxStages-1)){
								$('#nextStock').fadeIn();
							}

														
						});

						$('#nextEvent').click(function(){
							
							if(eventCurrentStage != eventMaxStages)
							{
								$('#toScrollEvents').animate({
									left: "-="+stageLength+"px"
								},300,'easeOutBack');
								eventCurrentStage++;

							}

							if(eventCurrentStage ==1){
								$('#prevEvent').fadeIn();
							}

							if(eventCurrentStage == eventMaxStages){
							$('#nextEvent').fadeOut();
							}

							


						});

						$('#prevEvent').click(function(){

							if(eventCurrentStage != 0)
							{
								$('#toScrollEvents').animate({
									left : "+="+stageLength+"px"	
								},300,'easeOutBack');
								eventCurrentStage--;
							}

							

							if(eventCurrentStage == 0){
								$('#prevEvent').fadeOut();
							}

							if(eventCurrentStage == (eventMaxStages-1)){
								$('#nextEvent').fadeIn();
							}

														
						});


						$('.controls').mouseenter(function(){
							$(this).stop();
							$(this).animate({
								opacity: ".4"
							},100);
						});

						$('.controls').mouseleave(function(){
							$(this).stop();
							$(this).animate({
								opacity: ".15"
							},100);
						});
					});
				</script>
				<h4 id="progressCounter">150K<span>/400k</span></h4>
				<a href="myStats.php"><button>View Stats</button></a>
		</div>

		<!-- transactionContainer holds the user's most recent 5 transaction in table form -->
		<div id="transactionContainer" class="homepageElement">
		<h3>Recent Transactions</h3>
			<table id="transactionTable">
				<tr>
					<th>ID</th>
					<th>Date</th>
					<th>Executor</th>
					<th>Notes</th>
					<th>Amount</th>
					<th>Total</th>
				</tr>
				<?php
					$sql1 = "SELECT * FROM tblbankaccounttransactions WHERE WithdrawAccount='".$_SESSION["BankAccountId"]."' OR DepositAccount='".$_SESSION["BankAccountId"]."' ORDER BY TransactionId desc LIMIT 5";
					$result = mysql_query($sql1);
					if(!$result)
					{
						echo ("Failed to Retrieve Information");
					}
					else
					{
						$numRows = mysql_num_rows($result);
						$runningBalance = $_SESSION["BankAccountBalance"];
						if($numRows > 0)
						{
							for($i=0;$i<$numRows;$i++)
							{
								$row2= mysql_fetch_array($result);
								$date = new DateTime($row2['TimeStamp']);
								$dateFormatted = $date->format('m/d/Y');
								echo "<tr>";
								echo "<td>".$row2['TransactionId']."</td>";
								echo "<td>".$dateFormatted."</td>";
								echo "<td>".$row2['Executor']."</td>";
								echo "<td>".$row2['Notes']."</td>";
								if($row2['WithdrawAccount'] == $_SESSION["BankAccountId"])
								{
									echo "<td>-".$row2['Amount']."</td>";
								}
								else
								{
									echo "<td>+".$row2['Amount']."</td>";
								}
								echo "<td>".$runningBalance."</td>";							
								echo "</tr>";
								if($row2['WithdrawAccount'] == $_SESSION["BankAccountId"])
								{
									$runningBalance = $runningBalance + $row2['Amount'];
								}
								else
								{
									$runningBalance = $runningBalance - $row2['Amount'];
								}
							}
						}
						else
						{
							echo "<p>No Recent Transactions</p>";
						}
					}
				?>
			</table>
			<a href="transactions.php"><button id="viewTransactionsButton">View Transactions</button></a>
		</div>

		<!-- stocksContainer holds the user's stock investements in tile form and by order of value -->
		<div id="stocksContainer" class="homepageElement">
			<h3>My Stocks</h3>
			<div id="nextStockHolder" class="controlHolder"><div id="nextStock" class="controls"></div></div>
			<div id="prevStockHolder" class="controlHolder"><div id="prevStock" class="controls"></div></div>
			<div id="toScrollStocks">
				<?php include("doMyStocks.php"); ?>
			</div>
			
			<a href="transactions.php"><button>Manage Stock</button></a>
		</div>

		<!-- eventsContainer holds upcoming events by order of date proximity -->
		<div id="eventsContainer" class="homepageElement">
			<h3>Upcoming Events</h3>
			<div id="nextEventHolder" class="controlHolder"><div id="nextEvent" class="controls"></div></div>
			<div id="prevEventHolder" class="controlHolder"><div id="prevEvent" class="controls"></div></div>
			<div id="toScrollEvents">
			<div id="Event1" class="infoTile eventTile">
				<h3>March 31<span>st</span></h3>
				<h6>1:30pm - 4:30pm</h6>
				<h1><span>$</span>800</h1>
				<div class="titleContainer"><h4>Final Frontier Oculus Test</h4></div>
				<div class="descriptionContainer"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam gravida molestie egestas. Duis varius aliquam mauris. Nunc sit amet nisl ut massa blandit rhoncus vestibulum iaculis tortor. Donec ac libero aliquet, sagittis ligula non, dignissim metus. Quisque bibendum, elit vel condimentum vehicula, mi lacus tincidunt metus, non euismod velit augue id quam. Aliquam euismod augue ante. In ornare semper purus a aliquet. Sed sit amet turpis quis urna iaculis pharetra adipiscing nec metus. Vivamus eu diam sed nulla aliquam posuere vitae nec leo. Phasellus a turpis nulla. Nunc sed ipsum ac ligula mollis placerat et vitae leo. Quisque nec auctor sapien, a placerat augue.</p></div>
				<button>Read More</button>
			</div>

			<div id="Event1" class="infoTile eventTile">
				<h3>March 31<span>st</span></h3>
				<h6>1:30pm - 4:30pm</h6>
				<h1><span>$</span>800</h1>
				<div class="titleContainer"><h4>Final Frontier Oculus Test</h4></div>
				<div class="descriptionContainer"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam gravida molestie egestas. Duis varius aliquam mauris. Nunc sit amet nisl ut massa blandit rhoncus vestibulum iaculis tortor. Donec ac libero aliquet, sagittis ligula non, dignissim metus. Quisque bibendum, elit vel condimentum vehicula, mi lacus tincidunt metus, non euismod velit augue id quam. Aliquam euismod augue ante. In ornare semper purus a aliquet. Sed sit amet turpis quis urna iaculis pharetra adipiscing nec metus. Vivamus eu diam sed nulla aliquam posuere vitae nec leo. Phasellus a turpis nulla. Nunc sed ipsum ac ligula mollis placerat et vitae leo. Quisque nec auctor sapien, a placerat augue.</p></div>
				<button>Read More</button>
			</div>

			<div id="Event2" class="infoTile eventTile">
				<h3>April 1<span>st</span></h3>
				<h6>2:30pm - 3:30pm</h6>
				<h1><span>$</span>5K</h1>
				<div class="titleContainer"><h4>Honey Badger Focus Group</h4></div>
				<div class="descriptionContainer"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam gravida molestie egestas. Duis varius aliquam mauris. Nunc sit amet nisl ut massa blandit rhoncus vestibulum iaculis tortor. Donec ac libero aliquet, sagittis ligula non, dignissim metus. Quisque bibendum, elit vel condimentum vehicula, mi lacus tincidunt metus, non euismod velit augue id quam. Aliquam euismod augue ante. In ornare semper purus a aliquet. Sed sit amet turpis quis urna iaculis pharetra adipiscing nec metus. Vivamus eu diam sed nulla aliquam posuere vitae nec leo. Phasellus a turpis nulla. Nunc sed ipsum ac ligula mollis placerat et vitae leo. Quisque nec auctor sapien, a placerat augue.</p></div>
				<button>Read More</button>
			</div>

			<div id="Event3" class="infoTile eventTile">
				<h3>April 3<span>rd</span></h3>
				<h6>4:30pm - 8:30pm</h6>
				<h1><span>$</span>500</h1>
				<div class="titleContainer"><h4>Focus Filter Testing</h4></div>
				<div class="descriptionContainer"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam gravida molestie egestas. Duis varius aliquam mauris. Nunc sit amet nisl ut massa blandit rhoncus vestibulum iaculis tortor. Donec ac libero aliquet, sagittis ligula non, dignissim metus. Quisque bibendum, elit vel condimentum vehicula, mi lacus tincidunt metus, non euismod velit augue id quam. Aliquam euismod augue ante. In ornare semper purus a aliquet. Sed sit amet turpis quis urna iaculis pharetra adipiscing nec metus. Vivamus eu diam sed nulla aliquam posuere vitae nec leo. Phasellus a turpis nulla. Nunc sed ipsum ac ligula mollis placerat et vitae leo. Quisque nec auctor sapien, a placerat augue.</p></div>
				<button>Read More</button>

			</div>

			<div id="Event1" class="infoTile eventTile">
				<h3>March 31<span>st</span></h3>
				<h6>1:30pm - 4:30pm</h6>
				<h1><span>$</span>800</h1>
				<div class="titleContainer"><h4>Final Frontier Oculus Test</h4></div>
				<div class="descriptionContainer"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam gravida molestie egestas. Duis varius aliquam mauris. Nunc sit amet nisl ut massa blandit rhoncus vestibulum iaculis tortor. Donec ac libero aliquet, sagittis ligula non, dignissim metus. Quisque bibendum, elit vel condimentum vehicula, mi lacus tincidunt metus, non euismod velit augue id quam. Aliquam euismod augue ante. In ornare semper purus a aliquet. Sed sit amet turpis quis urna iaculis pharetra adipiscing nec metus. Vivamus eu diam sed nulla aliquam posuere vitae nec leo. Phasellus a turpis nulla. Nunc sed ipsum ac ligula mollis placerat et vitae leo. Quisque nec auctor sapien, a placerat augue.</p></div>
				<button>Read More</button>
			</div>

			</div>

			<a href="transactions.php"><button>View All Events</button></a>
		</div>
		<!--end homepage elements -->

		<div id="accountSettings" class="popup" style="display:none">
			<h3>Account Settings</h3>
			<form action="updateAcctSettings.php" method="post">
				<input type="checkbox" value="yes" name="weeklyStatements" /><label for="weeklyStatements">Send Me Weekly Statements</label>
				<input type="checkbox" value="yes" name="showMyName" /><label for="showMyName">Show My Name on the Leaderboard</label>
				<label for="firstName">First Name</label><input type="text" value="John" name="firstName" />
				<label for="lastName">Last Name</label><input type="text" value="Doe" name="lastName" />
				<label for="portfolioLink">Portfolio Link</label><input type="text" name="portfolioLink" />
				<input type="submit" value="Update Settings" />
			</form>
			<form action="changePassword.php" method="post">
				<label for="passwordCheck">Current Password</label><input type="password" name="passwordCheck" />
				<label for="passwordNew">New Password</label><input type="password" name="passwordNew" />
				<label for="passwordNewConfirm">Confirm New Password</label><input type="password" name="passwordNewConfirm" />
				<input type="submit" value="Change Password" />
			</form>
		</div>
	</div>

</body>
</html>
<?php include("includes/closeDbConn.php"); ?>
<?php
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
?>
<!DOCTYPE HTML>
<html>
<head>
	<script type="text/javascript" src="js/jquery-1.11.0.min.js" ></script>
	<script type="text/javascript" src="js/easing.js" ></script>
	<link rel="stylesheet" type="text/css" href="css/myStocks.css" />

	<script type="text/javascript">

			var stageSize = 0;
				var stageLength =0;
				var stageDisplay = 0;

				var stockCurrentStage = 0;
				var stockMaxStages = 0;

				

				console.log(stockMaxStages)
	function infoTileResizer(){


						
						baseWidth = $('#stockScroller').width();
						console.log(baseWidth);

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
						stageLength = ($('.stockTile').outerWidth()+$('.mainpageElement').width()*.02);
						
						stockMaxStages = ($('.stockTile').length) - stageDisplay;
						
						
						$('#toScrollStocks').css('left',"-"+(stageLength * stockCurrentStage)+"px");
						

						if(stockCurrentStage == 0){
							$('#prevStock').hide();
						}

						

						if(stockCurrentStage >= stockMaxStages){
							$('#nextStock').hide();
						}

						

							
					}

					$(window).resize(function(){
						
						infoTileResizer();
						$('.mainPageElement').css('margin-bottom',($('.maincontainer').width()*.02));
						

					});



					$(document).ready(function(){
						
						$('.mainPageElement').css('margin-bottom',($('.maincontainer').width()*.02));
						infoTileResizer();
						
						$('#nextStock').click(function(){
							
							if(stockCurrentStage != stockMaxStages)
							{
								$('#toScrollStocks').animate({
									left: "-="+stageLength+"px"
								},300,'easeOutBack');
								stockCurrentStage++;
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
</head>
<body>
	<div id="myStocksMain" class="maincontainer" >
	<h1>My Stocks</h1><h3 id="userNameBalance">Jessie Smith | $150000.00</h3>
		<div id="stockScroller" class="mainPageElement">
		<h3>Stocks Owned</h3>
			<div id="nextStockHolder" class="controlHolder"><div id="nextStock" class="controls"></div></div>
			<div id="prevStockHolder" class="controlHolder"><div id="prevStock" class="controls"></div></div>
			<div id="toScrollStocks">
				<?php include ("doMyStocks.php"); ?>         			
			</div> <!-- close toScrollStocks -->
		</div> <!-- close stockScroller -->
		<div id="stockTransitionContainer" class="mainPageElement" >
		<h3>Stock Transaction History</h3>
			<table id="stockTransactionTable">
				<tr>
				  <th>ID</th>
				  <th>Date</th>		
				  <th>Executor</th>
				  <th>Notes</th>
				  <th>Amount</th>
				  <th>Total</th>
				</tr>
				<tr>
				  <td>5</td>
				  <td>9/20/2013</td>		
				  <td>Terry Burton</td>
				  <td>Test</td>
				  <td>-100</td>
				  <td>150,000.00</td>
				 </tr>
				
				<tr>
				  <td>4</td>
				  <td>9/20/2013</td>		
				  <td>Terry Burton</td>
				  <td>Test</td>
				  <td>-100</td>
				  <td>150,000.00</td>
				 </tr>
				
				<tr>
				  <td>5</td>
				  <td>9/20/2013</td>		
				  <td>Terry Burton</td>
				  <td>Test</td>
				  <td>-100</td>
				  <td>150,000.00</td>
				 </tr>
				
				<tr>
				  <td>3</td>
				  <td>9/20/2013</td>		
				  <td>Terry Burton</td>
				  <td>Test</td>
				  <td>-100</td>
				  <td>150,000.00</td>
				 </tr>
				
				<tr>
				  <td>2</td>
				  <td>9/20/2013</td>		
				  <td>Terry Burton</td>
				  <td>Test</td>
				  <td>-100</td>
				  <td>150,000.00</td>
				 </tr>
			
				<tr>
				  <td>1</td>
				  <td>9/20/2013</td>		
				  <td>Terry Burton</td>
				  <td>Test</td>
				  <td>-100</td>
				  <td>150,000.00</td>
				 </tr>
			</table>
		</div> <!-- close stockTransitionContainer -->
</div> <!-- close MyStocksMain -->
	<div id="buyPopup" class="popup">
		<h3>Invest in Company Name</h3>
		<form buyStock.php>
			<input type="number" name="buyStockAmount" /><label for="buyStockAmount">Shares</label>
			<h4>@ 0.00/share</h4>
			<h3>Total Investment: 0.00</h3>
			<input type="submit" value="Buy" />
			<button>Cancel</button>
		</form>
	</div>
		
	<div id="sellPopup" class="popup">
		<h3>Sell Company Name Stock</h3>
		<form action="sellStock.php">
			<input type="number" name="sellStockAmount" /><label for="sellStockAmount">Shares</label>
			<h4>@ 0.00/share</h4>
			<h3>Total Profit: 0.00</h3>
			<input type="submit" value="Sell" />
			<button>Cancel</button>
		</form>
	</div>
</body>
</html>
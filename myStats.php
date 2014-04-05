<?php
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>")
?>
<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
	<div id="mainMyStatsContainer" class="maincontainer" />
		<h1>My Stats</h1>
		<div id="progressDonutContainer">
			
			<canvas id="myChart" width="400" height="400"></canvas>
				<script>
					var ctx = document.getElementById("myChart").getContext("2d");
					//var progress will use the admin determined "a" value and then the users cogent balance to generate the progress bar//
					var progress = 150000/400000;
					var animationLength = 1000; //changes animation lenght in milliseconds
					var tier = "5"
					ctx.beginPath();
					ctx.arc(200,200,160,-.5*Math.PI,1.5*Math.PI);
					ctx.strokeStyle="#e9e9e9";
					ctx.lineWidth=80;
					ctx.stroke();

					ctx.font="120px Arial";
					ctx.textAlign = "center";
					ctx.fillStyle = '#333';
					ctx.fillText(tier,200,260);

					ctx.font="24px Arial";
					ctx.fillText("TIER",200,156);
					
					//will add an animation effect on javascript dev stage
					ctx.beginPath();
					ctx.arc(200,200,160,-.5*Math.PI,(progress)*Math.PI);
					ctx.strokeStyle="#52b352";
					ctx.lineWidth=80;
					ctx.stroke();
										
				</script>
				<h4>150K/400k</h4>
		</div>
		<div id="submissionBreakdownTableContainer">
			<h3>Submission Breakdown</h3>
			<table id="transactionTable">
				<tr>
				  <th>Category</th>
				  <th>Number Submissions</th>		
				  <th>Avg Submission Amount</th>
				  <th>Total</th>
				</tr>
				<tr>
				  <td>Internship</td>
				  <td>2</td>		
				  <td>2000</td>
				  <td>4000</td>
				 </tr>
				
				<tr>
				  <td>Grades</td>
				  <td>5</td>		
				  <td>1000</td>
				  <td>5000</td>
				 </tr>
				
				<tr>
				  <td>Job</td>
				  <td>1</td>		
				  <td>5000</td>
				  <td>5000</td>
				 </tr>
				
				<tr>
				  <td>Extracurricular</td>
				  <td>3</td>		
				  <td>2000</td>
				  <td>6000</td>
				 </tr>
				<tr>
				
				  <td>Job Fair</td>
				  <td>2</td>		
				  <td>100</td>
				  <td>200</td>
				 </tr>
									
			</table>
		</div>
		<div id="leaderboardContainer">
			<div id="tier5" class="tierTile" class="infoTile">
				<h3>Tier 5 Leaders</h3>
				<table id="tier1Table" class="tierTable">
					<tr>
						<th>Rank</th>
						<th>Name</th>
						<th>Amount</th>
					</tr>
					<tr>
						<td>1</td>
						<td>Ron Glotz</td>
						<td>1000000</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Mel Martin</td>
						<td>800000</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Jacob Venable</td>
						<td>750000</td>
					</tr>
					<tr>
						<td>4</td>
						<td>Ethan White</td>
						<td>725000</td>
					</tr>
					<tr>
						<td>5</td>
						<td>Brandon Hedrick</td>
						<td>650000</td>
					</tr>
				</table>
				<div id="myTierRank">
					<h2>7</h2>
					<h4>John Doe</h4>
					<h3>150000</h3>
					<p>0 cogent needed to advance to Tier 5</p>
				</div>
			</div>

			<div id="tier2" class="tierTile" class="infoTile">
				<h3>Tier 4 Leaders</h3>
				<table id="tier4Table" class="tierTable">
					<tr>
						<th>Rank</th>
						<th>Name</th>
						<th>Amount</th>
					</tr>
					<tr>
						<td>1</td>
						<td>Chelsea Chen</td>
						<td>10000</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Alex Martin</td>
						<td>8000</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Jacob Smith</td>
						<td>7500</td>
					</tr>
					<tr>
						<td>4</td>
						<td>Walter White</td>
						<td>7200</td>
					</tr>
					<tr>
						<td>5</td>
						<td>Jessie Pinkman</td>
						<td>6500</td>
					</tr>
				</table>
				<div id="myTierRank" style="display:none;">
					<h2>7</h2>
					<h4>John Doe</h4>
					<h3>150000</h3>
					<p>0 cogent needed to advance to Tier 5</p>
				</div>
			</div>
		</div>
		<!--<div id="badges">
			<h3>My Badges</h3>
		</div>-->
	</div>
</body>
</html>

<?php
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>")
?>
<html>
<head>
			<link rel="stylesheet" type="text/css" href="css/event.css" />
	<script type="text/javascript" src="js/jquery-1.11.0.min.js" ></script>
		<script type="text/javascript" src="js/easing.js" ></script>
	<script type="text/javascript">

	var counter = 0;

	$(document).ready(function(){


		animateDivFlyIn();
		
		function animateDivFlyIn(i){
			
			
			$('.eventElement:eq(' + counter + ')').animate({
				left: 0,
				opacity: 1
				},300,'easeInOutCirc');

			
			if(counter < $('.eventElement').length){
				setTimeout(function(){
					counter++;
					animateDivFlyIn();
				},50);
			}

		}
	});
	</script>
</head>
<body>
<?php include("nav.php"); ?>
	<div id="cogentEventsMain" class="maincontainer" >
		<h1>Cogent Events</h1>
		<div id="eventTile" class="infoTile">
			<div id="cogentEvent14" class="eventElement">
				<div class="eventDescriptionContainer">
					<h3>March 11th</h3>
					<h5>6:00pm- 6:30pm | EE17</h5>
				</div>
				<div class="eventInfoContainer">
					<h3>Gen Y Application Testing</h3>
					<h5>$500 Stock Equivalent</h5>
				</div>
				<button>More Info</button>
			</div>

			<div id="cogentEvent14" class="eventElement">
				<div class="eventDescriptionContainer">
					<h3>March 11th</h3>
					<h5>6:00pm- 6:30pm | EE17</h5>
				</div>
				<div class="eventInfoContainer">
					<h3>Gen Y Application Testing</h3>
					<h5>$500 Stock Equivalent</h5>
				</div>
				<button>More Info</button>
			</div>

			<div id="cogentEvent14" class="eventElement">
				<div class="eventDescriptionContainer">
					<h3>March 11th</h3>
					<h5>6:00pm- 6:30pm | EE17</h5>
				</div>
				<div class="eventInfoContainer">
					<h3>Gen Y Application Testing</h3>
					<h5>$500 Stock Equivalent</h5>
				</div>
				<button>More Info</button>
			</div>

			<div id="cogentEvent14" class="eventElement">
				<div class="eventDescriptionContainer">
					<h3>March 11th</h3>
					<h5>6:00pm- 6:30pm | EE17</h5>
				</div>
				<div class="eventInfoContainer">
					<h3>Gen Y Application Testing</h3>
					<h5>$500 Stock Equivalent</h5>
				</div>
				<button>More Info</button>
			</div>

			<div id="cogentEvent14" class="eventElement">
				<div class="eventDescriptionContainer">
					<h3>March 11th</h3>
					<h5>6:00pm- 6:30pm | EE17</h5>
				</div>
				<div class="eventInfoContainer">
					<h3>Gen Y Application Testing</h3>
					<h5>$500 Stock Equivalent</h5>
				</div>
				<button>More Info</button>
			</div>

			<div id="cogentEvent14" class="eventElement">
				<div class="eventDescriptionContainer">
					<h3>March 11th</h3>
					<h5>6:00pm- 6:30pm | EE17</h5>
				</div>
				<div class="eventInfoContainer">
					<h3>Gen Y Application Testing</h3>
					<h5>$500 Stock Equivalent</h5>
				</div>
				<button>More Info</button>
			</div>

			<div id="cogentEvent14" class="eventElement">
				<div class="eventDescriptionContainer">
					<h3>March 11th</h3>
					<h5>6:00pm- 6:30pm | EE17</h5>
				</div>
				<div class="eventInfoContainer">
					<h3>Gen Y Application Testing</h3>
					<h5>$500 Stock Equivalent</h5>
				</div>
				<button>More Info</button>
			</div>

			<div id="cogentEvent14" class="eventElement">
				<div class="eventDescriptionContainer">
					<h3>March 11th</h3>
					<h5>6:00pm- 6:30pm | EE17</h5>
				</div>
				<div class="eventInfoContainer">
					<h3>Gen Y Application Testing</h3>
					<h5>$500 Stock Equivalent</h5>
				</div>
				<button>More Info</button>
			</div>
		</div>
	</div>
	<div id="eventInfoPopUp" class="popup">
		<div id="calendarTile" class="infoTile">
			<h3>Wednesday, February</h3>
				<h1>26</h1>
				<h6>2:30pm - 3:30pm</h6>
		</div>
		<div id="eventInfoContainer">
				<h4>Honey Badger Focus Group</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam gravida molestie egestas. Duis varius aliquam mauris. Nunc sit amet nisl ut massa blandit rhoncus vestibulum iaculis tortor. Donec ac libero aliquet, sagittis ligula non, dignissim metus. Quisque bibendum, elit vel condimentum vehicula, mi lacus tincidunt metus, non euismod velit augue id quam. Aliquam euismod augue ante. In ornare semper purus a aliquet. Sed sit amet turpis quis urna iaculis pharetra adipiscing nec metus. Vivamus eu diam sed nulla aliquam posuere vitae nec leo. Phasellus a turpis nulla. Nunc sed ipsum ac ligula mollis placerat et vitae leo. Quisque nec auctor sapien, a placerat augue.</p>
		</div>
	</div>
</body>
</html>
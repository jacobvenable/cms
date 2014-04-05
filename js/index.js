$(document).ready(function(){
	$('.popup').hide();
	$('#blanket').hide();

	var registerShow = false;
	var recoverShow = false;

	$('#registerButton').click(function(e){
		e.preventDefault();
		if (!registerShow && !recoverShow)
		{
			$('#registerField').fadeIn();
			$('#blanket').fadeIn();
			registerShow = true;
		}

	});

	$(document).keydown(function(e){

		if((e.which == 27) && (registerShow) && (!recoverShow))
		{
			$('#registerField').fadeOut();
			$('#blanket').fadeOut();
			registerShow = false;
		}
	});

	$('#recoverPassLink').click(function(e){
		e.preventDefault();
		if (!recoverShow && !registerShow)
		{
			$('#recoverField').fadeIn();
			$('#blanket').fadeIn();
			recoverShow = true;
		}

	});

	$(document).keydown(function(e){

		if((e.which == 27) && (recoverShow) && (!registerShow))
		{
			$('#recoverField').fadeOut();
			$('#blanket').fadeOut();
			recoverShow = false;
		}
	});
	

	function centerPopups(){
		$('.popup').each(function(){
			var height = $(this).innerHeight();
			var winHeight = $(window).height();
			
			console.log(winHeight, $(document).height());
			$(this).css('top',((winHeight-height)/2));

			var width = $(this).innerWidth();
			var winWidth = $(window).outerWidth();
			
			//console.log(height,winHeight,diff);
			$(this).css('left',((winWidth-width)/2));
		});
	}

	centerPopups();

	$(window).resize(function(){
		centerPopups();	
	});
});
	

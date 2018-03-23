$(function() {
	$('#next').click(function() {
		var activeDiv = $('div.active');
		activeDiv.removeClass('active');
		if(activeDiv.next().length==0) {
			$('div.newsTicker').eq(0).addClass('active').css('opacity',0).animate({
				opacity: 1
			}, 300);;
		} else {
			activeDiv.next().addClass('active').css('opacity',0).animate({
				opacity: 1
			}, 300);;
		}
	});
	
	$('#prev').click(function() {
		var activeDiv = $('div.active');
		activeDiv.removeClass('active');
		if(activeDiv.prev().length==0) {
			$('div.newsTicker').eq(-1).addClass('active').css('opacity',0).animate({
				opacity: 1
			}, 300);
		} else {
			activeDiv.prev().addClass('active').css('opacity',0).animate({
				opacity: 1
			}, 300);
		}
	});
	
	var timerToggle=null;
	
	$(function animateImage() {
		var activeDiv = $('div.active');
		activeDiv.removeClass('active');
		if(activeDiv.next().length==0) {
			$('div.newsTicker').eq(0).addClass('active').css('opacity',0).animate({
				opacity: 1
			}, 300);
		} else {
			activeDiv.next().addClass('active').css('opacity',0).animate({
				opacity: 1
			}, 300);
		}
		
		timerToggle=setTimeout(function() { animateImage(); },5000);
	});
});
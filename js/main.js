$(function() {
	$('h4.alert').hide().fadeIn(700);
	$('<span class="exit">X</span>').appendTo('h4.alert');
	
	$('span.exit').click(function() {
		$(this).parent('h4.alert').fadeOut('slow');						   
	});
});
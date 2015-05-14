$(document).ready(function()
{
	$('.accordion-toggle').click(function(){

		var expanded = $(this).attr('aria-expanded');
		
		if(expanded == 'false' || typeof expanded === 'undefined')
		{
			$(this).find('.glyphicon').addClass('glyphicon-menu-up');
			$(this).find('.glyphicon').removeClass('glyphicon-menu-down');
		}
		else
		{
			$(this).find('.glyphicon').addClass('glyphicon-menu-down');
			$(this).find('.glyphicon').removeClass('glyphicon-menu-up');
		}
		// $(this).find('.menudrop').toggleClass('glyphicon-menu-down','glyphicon-menu-up');
	});
});

$(document).ready(function()
{
	function setVisibleStep(stepNumber)
	{
		var productInfomationFlow = $('div.band.product-information');

		productInfomationFlow.attr('data-show-step-no', stepNumber);
		productInfomationFlow.find('header.flow-overview div a').removeClass('focus');
		productInfomationFlow.find('header.flow-overview div:nth-child('+ (stepNumber+1) +') > a').addClass('focus');

		productInfomationFlow.find('div.steps div.step').removeClass('show');
		productInfomationFlow.find('div.steps div.step:nth-child('+ stepNumber +')').addClass('show');
	}

	$('div.band.product-information header.flow-overview div a')
		.on('click', function(event)
		{	
			event.preventDefault();
			
			var stepNumber = parseInt($(this).parent().index());
			setVisibleStep(stepNumber);
		});

	$('div.band.product-information footer button:not([type="submit"])')
		.on('click', function(event)
		{
			event.preventDefault();
			
			var productInfomationFlow = $('div.band.product-information');

			var action 			= $(this).attr('data-flow-action');
			var numberOfSteps 	= productInfomationFlow.find('div.steps div.step').length;
			var stepNumber 		= parseInt(productInfomationFlow.attr('data-show-step-no'));

			switch(action)
			{
				case 'next':
				
					if(stepNumber < numberOfSteps)
						setVisibleStep(stepNumber+1);
					
					break;

				case 'back':
					if(stepNumber > 1)
						setVisibleStep(stepNumber-1);
	
					break;
				
				case 'add-to-cart':
					
					break;
				
				default:
					/*do nothing*/
			}
		});

	$('form').on('submit', function(event)
	{
		event.preventDefault();
		
		console.log('submit');
	});

	$('div.band.product-information div.step-2 select[name="size"]')
		.on('change', function()
		{	
			var value = $(this).val();

			console.log(value);

			if(value == "Andet")
			{
				$(this).parent().removeClass('hide-other');
			}
			else
			{
				$(this).parent().addClass('hide-other');	
			}
		});
});
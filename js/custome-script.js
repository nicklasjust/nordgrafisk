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

	$('form.product-information').on('submit', function(event)
	{
		event.preventDefault();
		
		var product = $(this).find('div.produktTab div.products div.product input:checked').val();
		console.log(product);
		console.log('submit');
		
		var newRow = jQuery('<a class="list-group-item"><span class="badge">1</span> '+product+' </a>');
    	jQuery('div.list-group.cart').append(newRow);
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

	
	$( ".img-rounded" ).click(function() {
  		$(".img-rounded").removeClass("selected");
       	$(this).addClass("selected");

       	var alt = $(this).attr('alt');
       	console.log(alt);
		//$('.steps').data('product', alt);
		$('.steps').attr('data-product', alt);
	});


	$('div.band.product-information header.flow-overview div a')
		.on('click', function(event)
		{	
			event.preventDefault();
			
			var stepNumber = parseInt($(this).parent().index());
			setVisibleStep(stepNumber);
		});


/* # NGInterface
================================================== */
	$(document).on('click', 'div.panel-group button.acceptorder-btn', function(event)
	{	
		var orderNumber = $(this).attr('data-order-number');
		var orderDOM 	= $('div.panel-group div.panel.panel-default[data-order-number="'+orderNumber+'"');

		orderDOM.remove();	
		$('div.panel-group.accepted').prepend(orderDOM).hide().fadeIn(400);

		$(this).toggleClass('acceptorder-btn finishorder-btn');
		this.innerText = "Færdiggør ordre";
	});

	$(document).on('click', 'div.panel-group button.declineorder-btn', function(event)
	{	
		var orderNumber = $(this).attr('data-order-number');
		var orderDOM 	= $('div.panel-group div.panel.panel-default[data-order-number="'+orderNumber+'"');

		orderDOM.remove();	
		$('div.panel-group.declined').prepend(orderDOM).hide().fadeIn(400);
		
	});	

	$(document).on('click', 'div.panel-group button.finishorder-btn', function(event)
	{	
		var orderNumber = $(this).attr('data-order-number');
		var orderDOM 	= $('div.panel-group div.panel.panel-default[data-order-number="'+orderNumber+'"');

		orderDOM.remove();	
		$('div.panel-group.finished').prepend(orderDOM).hide().fadeIn(400);

		$('div.panel-group.finished button.declineorder-btn').remove();

		//$(this).toggleClass('finishorder-btn acceptorder-btn');
		this.innerText = "Genoptag ordre";

	});	


/* # FILE UPLOAD
================================================== */

	var files = [];
	var progressBars = [];
	var allowedFileTypes = ['jpg', 'pdf', 'jpeg', 'gif', 'png'];

	$('input#file-picker').on('change', function(event)
	{
		
		files = event.target.files;
		progressBars = [];

		$('div.file-upload-preview').html('');

		for (var i = 0; i < files.length; i++)
		{
			var type = files[i].type.split('/');

			var typeFound = $.inArray(type[1], allowedFileTypes) > -1;

			if(!typeFound)
			{
				$('div.file-upload-preview').append(
					$('<h4 />').html('Du kan kun uploade filer af typen: ' + allowedFileTypes.join(', '))
				);

				return;
			}

			var tmpPath = URL.createObjectURL(event.target.files[i]);
			
			var name = files[i].name;

			var sizeNotation 	= 'MB';
			var size 			= files[i].size/1048576;

			if(size >= 1)
			{
				size = Math.round(size * 100) / 100;
			}
			else
			{
				size = Math.round(size * 1024);
				sizeNotation = 'KB';
			}

			console.log(size + sizeNotation);
			console.log(type[1]);
			console.log(files[i]);

			var progressBar = $('<div />', {
							'class' : 'progress-bar progress-bar-striped active',
							'role' : 'progressbar'
						}).append(
							$('<span />').html('0% Complete')
							);

			var fileUploadPreviewDOM = $('<div />', {
						'class' : 'row'
					}).append(
						$('<div />', {
							'class' : 'col col-md-2'
						}).append(
							$('<img />', {
								'src' : (type[1] != 'pdf') ? tmpPath : 'images/pdf-icon.jpg',
								'alt' : 'File upload preview'
							})
						)
					).append(
						$('<div />', {
							'class' : 'col col-md-10'
						}).append(
							$('<h4 />', {
								'class' : 'file-name'
							}).html(name)
						).append(
							$('<p />', {
								'class' : 'file-size'
							}).html(size+sizeNotation)
						).append(
							$('<p />', {
								'class' : 'file-type'
							}).html(type[1].toUpperCase())
						).append(
							$('<div />', {
								'class' : 'upload-progress'
							}).append($('<div />', {
								'class' : 'progress'
								}).append(
									progressBar
								)
							).append(
								$('<div />', {
									'class' : 'processing'
								}).append(
									$('<img />', {
										'src' : 'images/ajax-loader.gif',
										'class' : 'loader',
										'alt' : 'upload-spinner'
									})
								).append('&nbsp;Forbereder upload')
							)
						)
					);

			progressBars[i] = progressBar;

			$('div.file-upload-preview').append(
					fileUploadPreviewDOM
				);
		};

	});

	$('button.start-file-upload').on('click', function(event)
	{
		event.preventDefault();
		var files = $('input#file-picker')[0].files;

		for (var i = files.length - 1; i >= 0; i--)
		{
			var typeFound = $.inArray((files[i].type.split('/'))[1], allowedFileTypes) > -1;

			if(!typeFound)
			{
				$('div.file-upload-preview').append(
					$('<h4 />').html('Du kan kun uploade filer af typen: ' + allowedFileTypes.join(', '))
				);
				return;
			}

			var file 			= files[i];
			var chunkUploader 	= new FileChunkUploader(file, progressBars[i]);
			chunkUploader.startUpload();
		};
	});

	function FileChunkUploader(file, progressBar)
	{
		this.chunkSize 		= 1900000;

		this.fileReader 	= new FileReader();
		this.file 			= file;
		this.dataArray 		= null;

		this.progressBar 	= progressBar;

		this.uploadId 		= null;
		this.totalChunks 	= null;
		this.chunksUploaded = 0;
		this.groupSize		= 1;

		this.startTime 		= null;
		this.endTime 		= null;
		
		this.startUpload = function()
		{
			var this_ = this; // assign this FileChunkUploader obj to a variable reachable inside the scope of onload

			this.fileReader.readAsArrayBuffer(this.file);

			this.fileReader.onload = function(e)
			{
				this_.dataArray 	= new Uint8Array(e.target.result);
				this_.totalChunks 	= Math.ceil(this_.dataArray.length / this_.chunkSize);
				
				this_.initUpload();
			}
		}

		this.initUpload = function()
		{
			var this_ = this;

			var d = new Date();
			this_.startTime = d.getTime();
			
			this.progressBar.parent().parent().addClass('processing');

			console.log('parallel group upload started');
			console.log('chunk size: '+this_.chunkSize);
			console.log('group size: '+this_.groupSize);

			this.uploadChunk(0, function(data, textStatus, jqXHR)
			{
				if(data.success)
				{
					this_.chunksUploaded++;
					this_.updatePrograssBar(this_.chunksUploaded, this_.chunkSize, this_.dataArray.length);

					console.log('total chunks: ' + this_.totalChunks);
					console.log(data);
					//console.log('Uploaded chunk(' + data.chunkIndex + ') no.: '+this_.chunksUploaded+'/'+this_.totalChunks);

					this_.uploadId = data.uploadId;
					this_.uploadChunkGroup(1, this_.groupSize);
				}
				else	
				{
					console.log(data);
				}
			});
		}

		this.uploadChunkGroup = function(groupIndex, groupSize)
		{

			var groupTail 	= groupIndex;
			var groupHead 	= groupIndex+groupSize;
			var this_ = this;

			groupHead = (groupHead > this.totalChunks-1) ? this.totalChunks-1 : groupHead;

			var successCallback = function(data, textStatus, jqXHR)
			{
				if(data.success)
				{
					var cIndex = parseInt(data.chunkIndex);

					this_.chunksUploaded++;

					this_.updatePrograssBar(this_.chunksUploaded, this_.chunkSize, this_.dataArray.length);
					console.log(data);

					if(cIndex == groupHead-1 && this_.chunksUploaded < this_.totalChunks-1)
					{
						this_.uploadChunkGroup(groupHead, this_.groupSize);
					}

					if(this_.chunksUploaded == this_.totalChunks-1)
					{
						this_.finishUpload(cIndex + 1);
					}
				}
				else
				{
					console.log(data);
				}
			}

			for (var cIndex = groupTail; cIndex < groupHead; cIndex ++)
			{
				if(cIndex < this.totalChunks-1)
				{
					this.uploadChunk(cIndex, successCallback);
				}
			}
		}

		this.finishUpload = function(cIndex)
		{
			var d 			= new Date();
			this.endTime 	= d.getTime();

			var this_ = this;

			this.uploadChunk(cIndex, function(data, textStatus, jqXHR)
			{
				this_.chunksUploaded++;
				this_.updatePrograssBar(this_.chunksUploaded, this_.chunkSize, this_.dataArray.length);
				this_.progressBar.removeClass('progress-bar-striped');

				console.log(data);
				
				var time = (this_.endTime - this_.startTime)/1000;
				console.log('done in: '+ time + 's');
			});
		}

		this.updatePrograssBar = function(chunkIndex, chunkSize, dataLength)
		{
			var percentage = ((chunkIndex * chunkSize) / dataLength) * 100;
			var progress = (percentage > 100) ? 100 : Math.floor(percentage);
			this.progressBar.parent().parent().removeClass('processing');
			this.progressBar.css('width', progress + '%');
			this.progressBar.find('span').html(progress + '% Complete');
		}

		this.uploadChunk = function(cIndex, successCallback, errorCallback)
		{
			var cIndex 				= parseInt(cIndex);
			var dataArraySliceStart = cIndex * this.chunkSize;
			var dataArraySliceEnd 	= (cIndex + 1) * this.chunkSize;

			var dataArraySlice 		= [this.dataArray.subarray(dataArraySliceStart, dataArraySliceEnd)]; //cut the data array into a smaller array

			var blob				= new Blob(dataArraySlice); //Create a blob from the array slice
			var formData 			= new FormData(); // Create form data obj. for parsing file data with ajax

			var chunkOrder 			= (dataArraySliceEnd - this.dataArray.length) * cIndex; // Evaluates to 0 for first chunk; > 0 for last chunk; < 0 for middle chunks

			formData.append('fileChunk', 	blob, this.file.name);
			
			formData.append('uploadId', 	this.uploadId);
			formData.append('offsetByte', 	dataArraySliceStart);
			formData.append('chunkOrder', 	chunkOrder);
			formData.append('totalChunks', 	this.totalChunks);
			formData.append('chunkIndex', 	cIndex);

			var this_ = this; // assign this FileChunkUploader obj to a variable reachable inside the scope of ajax callbacks

			console.log('trying to upload chunk(' + cIndex + ')');

			$.ajax({
				url: 'upload-script.php',
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
				dataType: 'json',
				success: function(data, textStatus, jqXHR)
				{
					if(typeof successCallback !== 'undefined')
					{
						successCallback(data, textStatus, jqXHR);
					}
					else
					{
						console.log(jqXHR.responseText);
						console.log(data);
						console.log(textStatus);
					}
					
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
					if(typeof errorCallback !== 'undefined')
					{
						errorCallback(jqXHR, textStatus, errorThrown);
					}
					else
					{
						console.log(jqXHR.responseText);
						console.log(textStatus);
						console.log(errorThrown);
					}
				}
			});
		}
	}

	$('.submit-order').click(function() {
		$.ajax({
				url: 'create_customer.php',
				type: 'POST',
				processData: false,
				contentType: false,
				dataType: 'json',
				success: function(data, textStatus, jqXHR)
				{
					console.log(jqXHR.responseText);
					console.log(data);
					console.log(textStatus);
					
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
					console.log(jqXHR.responseText);
					console.log(textStatus);
					console.log(errorThrown);
				}
			});
	});
});
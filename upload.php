<?php
?>
		<style type="text/css">

			div.upload-progress-bar{
				background-color: lightgray;
				border:solid 1px gray;
				border-radius: 4px;
				overflow: hidden;
				width: 300px;
			}

			div.upload-progress-bar span.progress{
				background-image: url(images/progress.gif);
				display: block;
				width: 0%;
				-webkit-transition: width 8s; /* Safari */
				transition: width 8s;
				font-weight: bold;
			}

		</style>

	</head>
	
	<body>

		<form action="#" method="post" class="file-upload" enctype="multipart/form-data">
		
			Select image to upload:
			<input type="file" name="file" multiple>
			<input type="submit" value="Upload Image" name="submit" >
		
		</form>

		<br>

		<div class="upload-progress-bar">
			<span class="progress">0%</span>
		</div>

		<script type="text/javascript">

			$(document).ready(function()
			{

				$('form.file-upload input[name="file"]').on('change', function(event)
				{
					// var files = $(this)[0].files;
					var tmppath = URL.createObjectURL(event.target.files[0]);
					console.log(tmppath);
					console.log(event.target.files[0]);
				});

				$('form.file-upload').on('submit', function(event)
				{
					event.preventDefault();
					var files = $('input[name="file"]')[0].files;

					for (var i = files.length - 1; i >= 0; i--)
					{
						var file 			= files[i];
						var chunkUploader 	= new FileChunkUploader(file);
						chunkUploader.startUpload();
					};
				});

				function FileChunkUploader(file)
				{
					this.chunkSize 		= 2000000;

					this.fileReader 	= new FileReader();
					this.file 			= file;
					this.dataArray 		= null;

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
						
						console.log('parallel group upload started');
						console.log('chunk size: '+this_.chunkSize);
						console.log('group size: '+this_.groupSize);

						this.uploadChunk(0, function(data, textStatus, jqXHR)
						{
							if(data.success)
							{
								this_.chunksUploaded++;
								updatePrograssBar(this_.chunksUploaded, this_.chunkSize, this_.dataArray.length);

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
								updatePrograssBar(this_.chunksUploaded, this_.chunkSize, this_.dataArray.length);
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
							updatePrograssBar(this_.chunksUploaded, this_.chunkSize, this_.dataArray.length);
							
							console.log(data);
							
							var time = (this_.endTime - this_.startTime)/1000;
							console.log('done in: '+ time + 's');
						});
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

				function updatePrograssBar(chunkIndex, chunkSize, dataLength)
				{
					var percentage = ((chunkIndex * chunkSize) / dataLength) * 100;
					var progress = (percentage > 100) ? 100 : Math.floor(percentage);
					$('div.upload-progress-bar span').css("width", progress + "%").html(progress + '%');
				}	
			});


		</script>

	</body>

</html>
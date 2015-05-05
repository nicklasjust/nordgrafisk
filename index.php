<?php
?>

<!DOCTYPE html>
<html lang="da">
	
	<head>

		<meta charset="utf-8">
		<title>Nord grafisk</title>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

		<script src="js/upload-script.js" type="text/javascript"></script>

		<style type="text/css">

			div.upload-progress-bar{
				background-color: lightgray;
				border:solid 1px gray;
				border-radius: 4px;
				overflow: hidden;
				width: 300px;
			}

			div.upload-progress-bar span.progress{
				background-image: url(img/progress.gif);
				display: block;
				width: 0%;
				-webkit-transition: width 8s; /* Safari */
			    transition: width 8s;
			    font-weight: bold;
			}

		</style>

	</head>
	
	<body>

		<form action="upload.php" method="post" class="file-upload" enctype="multipart/form-data">
		
			Select image to upload:
			<input type="file" name="file" multiple>
			<input type="submit" value="Upload Image" name="submit" >
		
		</form>

		<br>

		<div class="upload-progress-bar">
			<span class="progress">0%</span>
		</div>

	</body>

</html>
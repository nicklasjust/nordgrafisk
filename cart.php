<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nord Grafisk</title>
 
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/customstyle.css" rel="stylesheet">
		<link href="css/upload-fane-style.css" rel="stylesheet">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/script.js"></script>

 		<script src="js/upload-script.js" type="text/javascript"></script>
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<style type="text/css">

		div.shopping-cart{
			margin-top: 10px;
			position: fixed;
			top: 0;
			width: 300px;
		}

		div.shopping-cart a{
			cursor: pointer;
		}

		div.shopping-cart div.panel-heading{
			padding: 0;
		}

		div.shopping-cart div.panel-body{
			max-height: 200px;
			overflow-y: auto;
		}

		div.shopping-cart div.panel-heading a{
			display: block;
			padding: 10px 15px;
		}

		</style>
	</head>

<body>
	
<div class="container">
	
	<div class="panel-group shopping-cart" id="accordion" role="tablist" aria-multiselectable="true">
	
		<div class="panel panel-default">
	
			<div class="panel-heading" role="tab" id="headingOne">
	
				<h4 class="panel-title">
	
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	
						<span class="glyphicon glyphicon-shopping-cart"></span>
						<span class="pull-right">6 elementer i kurven</span>
	
					</a>
	
				</h4>
	
			</div>
	
			<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
	
				<div class="panel-body">
					
					<div class="list-group">

						<a class="list-group-item">
							<span class="badge">2</span>
							Plaket
						</a>
						<a class="list-group-item">
							<span class="badge">250</span>
							Visitkort
						</a>
						<a class="list-group-item">
							<span class="badge">1</span>
							Roll-up
						</a>
						<a class="list-group-item">
							<span class="badge">14</span>
							Lorem ipsum
						</a>
						<a class="list-group-item">
							<span class="badge">3</span>
							Nam congue 
						</a>
						<a class="list-group-item">
							<span class="badge">43</span>
							Cras justo odio
						</a>
					
					</div>

				</div>

			</div>

		</div>

	</div>

</div>

</body>

</html>
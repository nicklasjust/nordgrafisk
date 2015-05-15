<?php require 'header.php'; ?>
	
	<div class="band header">

		<div class="container">

			<header class="primary">
				
				<div class="col-md-8">

					<h1 class="logo">
						<a href="http://www.nord-grafisk.dk/">Nord Grafisk</a>
					</h1>

				</div>

				<div class="col-md-4">

					<div class="col-md-6">
						<button type="button" class="btn btn-default">Indhent tilbud</button>
					</div>

					<div class="col-md-6">
						<button type="button" class="btn btn-default">Log ind</button>
					</div>
				
				</div>
	
			</header>
	
		</div>

	</div>

	<form action="#" method="post">

		<div class="band customer-information">

			<div class="container">

				<div class="col-md-8">

					<header>
						
						<h2>Kundeinformation</h2>

					</header>

					<div class="col-md-6">

						<div class= "form-group">
							<label class="sr-only" for="inputNavn">Navn</label>
							<input type="text" class="form-control" id="inputName" placeholder="Navn">
						</div>

						<div class="form-group">
							<label class="sr-only" for="inputAdresse">Adresse</label>
							<input type="text" class="form-control" id="inputAdresse" placeholder="Adresse">
						</div>

						<div class="form-group">
							<label class="sr-only" for="inputBy">By</label>
							<input type="text" class="form-control" id="inputBy" placeholder="By">
						</div>

						<div class="form-group">
							<label class="sr-only" for="inputPostnummer">Postnr.</label>
							<input type="text" class="form-control" id="inputPostnummer" placeholder="Postnummer">
						</div>

						<div class="form-group">
							<label class="sr-only" for="exampleInputTelephone">Telefonnr.</label>
							<input type="tel" class="form-control" id="exampleInputTelephone" placeholder="Telefonnummer">
						</div>

						<div class="form-group">
							<label class="sr-only" for="inputEmail1">Email address</label>
							<input type="email" class="form-control" id="inputEmail1" placeholder="Email">
						</div>

					</div> <!-- end of col 6 -->

					<div class="col-md-6">

						<h4>Faktureringsoplysninger <small>(hvis anderledes)</small></h4>

						<div class="form-group">
							<label class="sr-only" for="inputAdresse">Adresse</label>
							<input type="text" class="form-control" id="inputFakAdresse" placeholder="Adresse">
						</div>

						<div class="form-group">
							<label class="sr-only" for="inputBy">By</label>
							<input type="text" class="form-control" id="inputFakBy" placeholder="By">
						</div>

						<div class="form-group">
							<label class="sr-only" for="inputPostnummer">Postnr.</label>
							<input type="text" class="form-control" id="inputFakPostnummer" placeholder="Postnummer">
						</div>

						<div class="form-group">
							<label class="sr-only" for="inputCVR">Postnr.</label>
							<input type="text" class="form-control" id="inputCVR" placeholder="CVR-nummer">
						</div>

						<div class="form-group">
							<label class="sr-only" for="inputEAN">Postnr.</label>
							<input type="text" class="form-control" id="inputEAN" placeholder="EAN-nummer">
						</div>

					</div> <!-- end of col 6 -->

				</div> <!-- end of col 8 -->

			</div> <!-- end of container -->

		</div> <!-- end of band customer-information -->

		<div class="band product-information" data-show-step-no="1">

			<div class="container">

				<div class="col-md-8">

					<header>
							
						<h2>Tilføj produkt til kurv</h2>

					</header>

					<div class="product-flow">

						<header class="flow-overview">
							
							<hr>
							
							<div class="col-md-3">
							
								<a href="#" class="focus">
									Produkt
								</a>
							
							</div>

							<div class="col-md-3">
							
								<a href="#">
									Format
								</a>
							
							</div>
							
							<div class="col-md-3">
							
								<a href="#">
									Brug
								</a>
							
							</div>
							
							<div class="col-md-3">

								<a href="#">
									Upload fil
								</a>
							
							</div>

						</header>
						
						<div class="steps">
							
							<div class="step show"> <!-- step 1 -->

								Step 1

								<!--

									Rip your farts here

								-->	

							</div> <!-- end of step 1 -->

							<div class="step"> <!-- step 2 -->

								Step 2

								<!--

									Rip your farts here

								-->	

							</div> <!-- end of step 2 -->

							<div class="step"> <!-- step 3 -->

								Step 3

								<!--

									Rip your farts here

								-->	

							</div> <!-- end of step 3 -->

							<div class="step"> <!-- step 4 -->

								Step 4

								<!--

									Rip your farts here

								-->	

							</div> <!-- end of step 4 -->

						</div> <!--- end of steps -->

						<footer>

							<div class="col-md-4">

								<button type="button" class="btn btn-default pull-left" data-flow-action="back">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									Tilbage
								</button>

							</div>

							<div class="col-md-4">

								<button type="submit" class="btn btn-default" data-flow-action="add-to-cart">
									Tilføj til kurv
									<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
								</button>
							
							</div>
							
							<div class="col-md-4">

								<button type="button" class="btn btn-primary pull-right" data-flow-action="next">
									Næste
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								</button>

							</div>
						
						</footer>

					</div>	

				</div> <!-- end of col 8 -->
				
			</div> <!-- end of container -->
		
		</div> <!-- end of band product-information-->

	</form>

	<div class="band footer">
		
		<div class="container">

			<div class="row">
		
				<div class="col-md-8">
					
				</div>

				<div class="col-md-4 right-side-bar">

					<aside>
						
						<section class="contact-form">
							
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								
								<div class="panel panel-default">
								
									<div class="panel-heading" role="tab" id="headingOne">
								
										<h4 class="panel-title">
								
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												Collapsible Group Item #1
											</a>
								
										</h4>
								
									</div>
								
									<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

										<div class="panel-body">
											<!-- Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. -->
										</div>

									</div>

								</div>
								
							</div>

						</section>

						<section class="shopping-cart">
							
							Shopping cart

						</section>

					</aside>
					
				</div>

			</div>

		</div>

	</div> <!-- end of footer -->

<?php require 'footer.php'; ?>
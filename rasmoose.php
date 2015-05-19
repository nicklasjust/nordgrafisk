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
									Type
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

							<div class="step step-2"> <!-- step 2 -->

								<div class="row">

									<div class="col-md-4">
										
										<div class="size hide-other">
									
											<h4>Størrelse:</h4>

											<select name="size" class="form-control">
										
												<option>A0</option>
												<option>A1</option>
											 	<option>A2</option>
											 	<option>A3</option>
												<option>A4</option>
												<option>A5</option>
												<option>B0</option>
												<option>B1</option>
											 	<option>B2</option>
											 	<option>B3</option>
												<option>B4</option>
												<option>B5</option>
												<option>Andet</option>
											
											</select>

											<div class="other">

												<input type="text" class="form-control" placeholder="Længde">
												X
												<input type="text" class="form-control" placeholder="Bredde">
												mm 

											</div>

										</div>
									
									</div>

									<div class="col-md-4">
									
									</div>

									<div class="col-md-4">
									
										<h4>Type:</h4>

											<select name="type" class="form-control">
										
												<option>Farve</option>
												<option>Farve m. gloss</option>
												<option>Sort/Hvid</option>
											 	<option>Sort/Hvid m. gloss</option>
											
											</select>

									</div>

								</div>

							<textarea class="form-control" rows="10" placeholder="Skriv kommentarer til format her."></textarea>

							</div> <!-- end of step 2 -->

							<div class="step"> <!-- step 3 -->

								Step 3

								<!--

									Rip your farts here

								-->	

							</div> <!-- end of step 3 -->

							<div class="step step-4"> <!-- step 4 -->

								<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary btn-lg center-block" data-toggle="modal" data-target="#myModal">
									Tryk her for beskæringsguide!
								</button>

								
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
	
	<!-- Modal vindue for uploadpage-->
	<div class="modal fade cropping-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		
		<div class="modal-dialog modal-lg">
			
			<div class="modal-content">
					
				<div class="modal-header">
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						
						<span aria-hidden="true">&times;</span>
					
					</button>
					
					<h4 class="modal-title" id="myModalLabel">Beskæringsguide</h4>

				</div>

				<div class="modal-body">
					
					<h2>Har du husket beskæring?</h2>

					<div class="row">
						
						<div class="col-md-3">
							
							<p>
								Lorem ipsum dolor sit amet, vel ultrices sapien mus pulvinar elit quis, libero bibendum urna vivamus
								 consectetuer aliquam leo, amet ultrices tristique parturient tempus orci, mollis consectetuer pede. 
								 Quam eget convallis. Justo ut faucibus consectetuer venenatis habitant libero, sit dui, cursus 
								 adipiscing eu, sollicitudin enim reprehenderit mauris, blandit praesent ut mauris.
							</p>

							<p>
								Morbi eget sed consectetuer, varius rhoncus sit mauris suscipit, diam semper vivamus dolor vero. 
								Sit eros ac mattis mauris ac donec. Orci a lectus metus, dolor pellentesque wisi in mauris fermentum, 
								pede amet tincidunt suscipit vestibulum vitae, in imperdiet sed purus, luctus erat congue nulla consectetur 
								fringilla lacus. Vestibulum scelerisque et donec.
							</p>

						</div>
							
						<br>

						<div class="col-md-9">

							<img class="center-block" src="images/new-document-settings-indesign.png" alt="New document settings indesign" class="img-rounded">
						
						</div>
					
					</div>

					<br>

					<div class="row">
						
						
						<div class="col-md-9">

							<img class="center-block" src="images/bleed-edge.png" alt="Dokument bleed edge" class="img-rounded">
						
						</div>

						<br>

						<div class="col-md-3">
							
							<p>
								Lorem ipsum dolor sit amet, vel ultrices sapien mus pulvinar elit quis, libero bibendum urna vivamus 
								consectetuer aliquam leo, amet ultrices tristique parturient tempus orci, mollis consectetuer pede. 
								Quam eget convallis. Justo ut faucibus consectetuer venenatis habitant libero, sit dui, cursus adipiscing 
								eu, sollicitudin enim reprehenderit mauris, blandit praesent ut mauris.
							</p>

							<p>
								Morbi eget sed consectetuer, varius rhoncus sit mauris suscipit, diam semper vivamus dolor vero. Sit eros 
								ac mattis mauris ac donec. Orci a lectus metus, dolor pellentesque wisi in mauris fermentum, pede amet 
								tincidunt suscipit vestibulum vitae, in imperdiet sed purus, luctus erat congue nulla consectetur fringilla 
								lacus. Vestibulum scelerisque et donec.
							</p>

						</div>
					
					</div>

				</div>

				<div class="modal-footer">
		        
		        	<button type="submit" class="btn btn-primary" data-dismiss="modal">Annullér</button>

				</div>
			
			</div>

		</div>

	</div>

<?php require 'footer.php'; ?>
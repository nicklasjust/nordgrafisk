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

		<div class="band customer-infomation">

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

		</div> <!-- end of band customer-infomation -->

		<div class="band product-infomation" data-show-step-no="1">

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

							<div class="step"> <!-- step 2 -->

								Step 2

								<!--

									Rip your farts here

								-->	

							</div> <!-- end of step 2 -->

							<div class="step"> <!-- step 3 - Brug -->

								<h3>Hvad er brugssituationen for dit tryk?</h3>
								
								<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
									Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>

								
								
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

									<div class="panel panel-default"> <!-- step 3 - Brug - Indendørs-->
						
										<div class="panel-heading" role="tab" id="headingOne">
						
											<h4 class="panel-title">
						
												<id="use-radio-in-door" name="use">
												<label data-toggle="collapse" style="cursor: pointer" for="use-radio-in-door" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						
													Indendørs brug
						
												</label>
						
											</h4>
						
										</div>
						
										<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
						
											<div class="panel-body">
						
												<h4>Anbefalede materialer:</h4>
						
												<div class="row product ind poster"> <!-- step 3 - Brug - Poster - Ind-->
												
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 1
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 2
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 3
														
															</label>
						
														</p>
						
													</div>
													
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 4
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 5
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 6
														
															</label>
						
														</p>
						
													</div>
													
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 7
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 8
														
															</label>
						
														</p>
						
													</div>
												
												</div>
												
												<div class="row product ind banner"> <!-- step 3 - Brug - Banner-->
												
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 1
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 2
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 3
														
															</label>
						
														</p>
						
													</div>
													
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 4
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 5
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 6
														
															</label>
						
														</p>
						
													</div>
													
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 7
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 8
														
															</label>
						
														</p>
						
													</div>
												
												</div>
												
												<div class="row product ind roll-up"> <!-- step 3 - Brug - Roll-up-->
												
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 1
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 2
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 3
														
															</label>
						
														</p>
						
													</div>
													
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 4
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 5
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 6
														
															</label>
						
														</p>
						
													</div>
													
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 7
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 8
														
															</label>
						
														</p>
						
													</div>
												
												</div>
												
											</div>
						
										</div>
						
									</div> <!-- end of step 3 - Brug - Indendørs-->
						
									<div class="panel panel-default"> <!-- step 3 - Brug - Udendørs -->
						
										<div class="panel-heading" role="tab" id="headingTwo">
						
											<h4 class="panel-title">
						
												<id="use-radio-out-door" name="use">
												<label class="collapsed" data-toggle="collapse" style="cursor: pointer" for="use-radio-out-door" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						
													Udendørs brug
						
												</label>
						
											</h4>
						
										</div>
						
										<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						
											<div class="panel-body">
						
												<h4>Anbefalede materialer</h4>
							
												<div class="row product ud poster"> <!-- step 3 - Brug - Poster - Ud-->
												
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 1
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 2
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 3
														
															</label>
						
														</p>
						
													</div>
													
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 4
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 5
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 6
														
															</label>
						
														</p>
						
													</div>
													
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 7
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 8
														
															</label>
						
														</p>
						
													</div>
												
												</div>
												
												<div class="row product ud banner"> <!-- step 3 - Brug - Banner - Ud-->
												
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 1
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 2
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 3
														
															</label>
						
														</p>
						
													</div>
													
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 4
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 5
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 6
														
															</label>
						
														</p>
						
													</div>
													
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 7
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 8
														
															</label>
						
														</p>
						
													</div>
												
												</div>
												
												
												<div class="row product ud roll-up"> <!-- step 3 - Brug - Roll-up - Ud-->
												
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 1
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 2
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 3
														
															</label>
						
														</p>
						
													</div>
													
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 4
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 5
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 6
														
															</label>
						
														</p>
						
													</div>
													
													<div class="col-md-4">
														
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 7
														
															</label>
						
														</p>
						
														<p>
						
															<label>
											
																<input type="checkbox">
																Materiale 8
														
															</label>
						
														</p>
						
													</div>
												
												</div>
						
											</div>
						
										</div>
						
									</div> <!-- end of step 3 - Brug - Udendørs-->
						
								</div>
								
								<textarea class="form-control" id="kommentar" rows="4" placeholder="Skriv eventuelle kommentarer til brug her.."></textarea>


							</div> <!-- end of step 3 - Brug -->

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
		
		</div> <!-- end of band product-infomation-->

	</form>

<?php require 'footer.php'; ?>
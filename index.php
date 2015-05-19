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
						<!-- Button trigger modal - Indhent tilbud -->
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#indhenttilbud">
						  	Indhent tilbud
						</button>
						
						<!-- Modal - Indhent tilbud -->
						<div class="modal fade" id="indhenttilbud" tabindex="-1" role="dialog" aria-labelledby="tilbudLabel" aria-hidden="true">
							  <div class="modal-dialog">
								    <div class="modal-content">
									      <div class="modal-header">
									        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        	<h4 class="modal-title" id="tilbudLabel">Indtast referencenummer</h4>
									      </div>
									      <div class="modal-body">
										        <form class="form-horizontal">
													  <div class="form-group">
													  		<label for="inputRefnr" class="col-sm-2 control-label">Ref.nr.</label>
													    	<div class="col-sm-10">
													      	<input type="text" class="form-control" id="inputRefnr" placeholder="Referencenummer">
													    	</div>
													  </div>
												</form>
									      </div>
									      <div class="modal-footer">
									        	<button type="button" class="btn btn-default" data-dismiss="modal">Annullér</button>
									        	<button type="button" class="btn btn-primary">Indhent tilbud</button>
									      </div>
								    </div>
							  </div>
						</div>
						
					</div>

					<div class="col-md-6">
						
						<!-- Button trigger modal - Log ind -->
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#login">
						  	Log ind
						</button>
						
						<!-- Modal - Log ind -->
						<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
							<div class="modal-dialog">
						
							    <div class="modal-content">
						
							      	<div class="modal-header">
						
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
							        &times;</span></button>
							        <h4 class="modal-title" id="loginLabel">Login-oplysninger</h4>
							      
							     	 </div>
							      
							      	<div class="modal-body">
							      
							        	<form class="form-horizontal">
									  		<div class="form-group">
									    		<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
									    		<div class="col-sm-10">
									      			<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
									    		</div>
									  		</div>
									  		<div class="form-group">
									    		<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
									    		<div class="col-sm-10">
									      			<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
									    		</div>
									  		</div>
										</form>
							      	</div>
							      	<div class="modal-footer">
							        	<button type="button" class="btn btn-default" data-dismiss="modal">Annullér</button>
							        	<button type="button" class="btn btn-primary">Log ind</button>
							      	</div>
							    </div>
							</div>
						</div>
						
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

								<div class="produktTab">
				    	
							    	<p>
								    	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
								    	Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
								    	Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
								    	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							    	</p>
							    	
							    	<div class="row" id="firstRow">
							    		<label class="col-md-2">
							   				<img src="images/poster_icon.png" alt="Poster" class="img-rounded">
							   			</label>
							   			
							   			<label class="col-md-2">
							   				<img src="images/rollup_icon.png" alt="Roll-up" class="img-rounded">
							   			</label>

							   			
							   			<label class="col-md-2">
							   				<img src="images/1.png" alt="Andet" class="img-rounded">
							   			</label>
							   			
							   			<label class="col-md-2">
							   				<img src="images/1.png" alt="Andet" class="img-rounded">
							   			</label>
							   			
							   			<label class="col-md-2">
							   				<img src="images/1.png" alt="Andet" class="img-rounded">
							   			</label>
							   			
							   			<label class="col-md-2">
							   				<img src="images/1.png" alt="Andet" class="img-rounded">
							   			</label>
							    	</div>
							    	
							    	<div class="row" id="secondRow">
							    		<label class="col-md-2">
							   				<img src="images/1.png" alt="Andet" class="img-rounded">
							   			</label>
							   			
							   			<label class="col-md-2">
							   				<img src="images/1.png" alt="Andet" class="img-rounded">
							   			</label>
							   			
							   			<label class="col-md-2">
							   				<img src="images/1.png" alt="Andet" class="img-rounded">
							   			</label>
							   			
							   			<label class="col-md-2">
							   				<img src="images/1.png" alt="Andet" class="img-rounded">
							   			</label>
							   			
							   			<label class="col-md-2">
							   				<img src="images/1.png" alt="Andet" class="img-rounded">
							   			</label>
							   			
							   			<label class="col-md-2">
							   				<img src="images/1.png" alt="Andet" class="img-rounded">
							   			</label>
							   		</div>
					    		</div>

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
						
												<h4>Anbefalede materialer:</h4>
							
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
								
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseThis" aria-expanded="true" aria-controls="collapseThis">
												Kontakt
											</a>
								
										</h4>
								
									</div>
								
									<div id="collapseThis" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

										<div class="panel-body">
											
											<div class="col-md-12">
											
												<div class="row">
														
														<h4>Henrik Fogh Andersen</h4>
														<p>something@whatever.fart</p>
														<p>Telefon: 88888888</p>
														
												</div>
												
												<div class="row">
												
													<form class="form-horizontal">
														<div class="form-group">												 
														    <div class="col-sm-3">
														    	<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
														    </div>
														</div>
													  	<div class="form-group">											    
													    	<div class="col-sm-3">
													      		<input type="tel" class="form-control" id="inputTlf" placeholder="Telefonnr.">
													    	</div>
													  	</div>
														<div class="form-group">
															<div class="col-sm-3">
																<textarea class="form-control" id="kommentar" rows="4" placeholder="Skriv til Henrik"></textarea>
															</div>
														</div>
													  	<div class="form-group">
													    	<div class="col-sm-10">
													      		<button type="submit" class="btn btn-default">Send</button>
													    	</div>
													  	</div>
													</form>
												
												</div>
											
											</div>
		
										</div>

									</div>

								</div>
								
							</div>

						</section>

						<section class="shopping-cart">
							
							<div class="panel-group shopping-cart" id="accordion" role="tablist" aria-multiselectable="true">
		
								<div class="panel panel-default">

									<div class="panel-heading" role="tab" id="headingOne">

										<h4 class="panel-title">

											<a data-toggle="collapse" data-parent="#accordion" href="#shopping-cart" aria-expanded="true" aria-controls="shopping-cart">

												<span class="glyphicon glyphicon-shopping-cart"></span>
												<span class="pull-right">6 elementer i kurven</span>

											</a>

										</h4>

									</div>

									<div id="shopping-cart" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

										<div class="panel-body">
											
											<div class="list-group">

												<a class="list-group-item">
													<span class="badge">2</span>
													Plakat
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
									
									<button class="btn btn-default custom-btn pull-left" type="submit">Ordreoversigt</button>

									<button class="btn btn-primary custom-btn pull-right" type="submit">Send Ordre</button>


								</div>

							</div>

						</section>

					</aside>
					
				</div>

			</div>

		</div>

	</div> <!-- end of footer -->

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
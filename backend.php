<?php

	require('header.php');
	require('database.php');

	$db = Database::getInstance('mysql', $config['db-host'], $config['db-name'], $config['db-user'], $config['db-pass']);

	$orders = $db->select(
		"SELECT orders.id,
				status,
				delivery_address,
				delivery_date,
				delivery_city,
				delivery_zip,
				debtor_id,
				debtors.name AS debtor_name,
				debtors.email AS debtor_email,
				debtors.phone AS debtor_phone,
				debtors.ean
		 FROM orders
		 INNER JOIN debtors ON orders.debtor_id = debtors.id");

	$sortedOrders = array(
		'1' => array(),
		'2' => array(),
		'3' => array(),
		'4' => array(),
		);

	foreach ($orders as $order)
	{	
		$sortedOrders[$order['status']][$order['id']] = $order;

		$orderlines = $db->select(
			"SELECT id,
					order_id,
					product,
					formatComments,
					usageComments,
					material,
					type,
					size
			 FROM orderlines
			 WHERE order_id = :order_id",
			 array(
			 	'order_id' => $order['id']
			 	));

		foreach ($orderlines as $orderline)
		{
			$files = $db->select(
			"SELECT files.id AS file_id,
					files.path AS path
			 FROM file_orderline_rel
			 INNER JOIN files ON files.id = file_orderline_rel.file_id
			 WHERE orderline_id = :orderline_id",
			 array(
			 	':orderline_id' => $orderline['id']
			 	));

			$orderline['files'] = $files;
			
			$sortedOrders[$order['status']][$order['id']]['orderlines'][$orderline['id']] = $orderline;
		}
	}	

	// echo "<pre>";
	// print_r($sortedOrders);
	// echo "</pre>";

	$orderStatusLabels = [
		'ubehandlede',
		'godkendte',
		'færdiggjorte',
		'afviste'
	];

	$orderColorLabels = [
		'pending',
		'accepted',
		'finished',
		'declined'
	];

	$currentPrintingStatus = 0;
?>

<div class="container">

	<h1>Ordreoversigt</h1>

<?php foreach ($sortedOrders as $status => $orders): ?>

	<?php if($currentPrintingStatus != $status): $currentPrintingStatus++?>

		<h4><?php echo ucfirst($orderStatusLabels[$currentPrintingStatus-1]);?> ordrer</h4>

	<?php endif; ?>

	<div class="panel-group <?php echo $orderColorLabels[$status-1] ?>" id="accordion" role="tablist" aria-multiselectable="true">

	<?php if(empty($sortedOrders[$status])): ?>
	
		<div class="well well-sm no-orders">
		
			Der er ingen <?php echo $orderStatusLabels[$currentPrintingStatus-1];?> ordrer
		
		</div>

	<?php endif; ?>

	<?php foreach ($orders as $order): ?>

		<div class="panel panel-default" data-order-number="<?php echo $order['id'] ?>">

	  		<div class="panel-heading" role="tab" id="order-number-<?php echo $order['id'] ?>">

	  			<h4 class="panel-title">

					<a data-toggle="collapse" data-parent="#accordion" href="#order-<?php echo $order['id'] ?>" aria-expanded="true" aria-controls="order-number-<?php echo $order['id'] ?>">
					
						<div class="row">	
					
							<div class="col-md-1">
								#<?php echo $order['id'] ?>
							</div> 

							<div class="col-md-3">
								<?php echo $order['debtor_name'] ?> 
							</div>

							<div class="col-md-2">
								<?php echo $order['debtor_phone'] ?> 
							</div> 

							<div class="col-md-3">
								<?php echo $order['debtor_email'] ?> 
							</div>

							<div class="col-md-2">
								<?php echo (strtotime($order['delivery_date'])) ? (new DateTime($order['delivery_date']))->format('d-m-Y H:i') : ''; ?> 
							</div>

							<div class="col-md-1">
								<span class="menudrop glyphicon glyphicon-menu-down pull-right" aria-hidden="true"></span>
							</div>

						</div>

					</a>

		  		</h4>

			</div>

			<div id="order-<?php echo $order['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="order-number-<?php echo $order['id'] ?>">

		  		<div class="panel-body">

			  		<div class="row">
						
						<div class="col-md-6">
					
							<h2>Ordre <?php echo $order['id'] ?></h2>
							
						 	<h3>Leveringstidspunkt</h3>
						 		<p><?php echo (strtotime($order['delivery_date'])) ? (new DateTime($order['delivery_date']))->format('d-m-Y H:i') : 'Dato er ikke fastsat'; ?></p>
						 	<h3>Fakturering</h3>
						 		<p><?php echo $order['debtor_name'] ?><br>
						 			<?php echo $order['delivery_address'] ?><br>
						 			<?php echo $order['delivery_zip'] ?>, <?php echo $order['delivery_city'] ?></p>
						 	<h3>Levering</h3>
						 		<p>Afhentes af kunde</p>	

						</div>

						<div class="col-md-6">

							<h2>Ordreliner</h2>

						<?php foreach ($order['orderlines'] as $orderline):?>

							<div class="well">
								
								<h3>Produkt</h3>
									<p><?php echo $orderline['product']; ?></p>

								<h3>Format</h3>
									<p>Størrelse: <?php echo (!empty($orderline['size'])) ? $orderline['size'] : 'Ikke angivet'; ?><br>
									Type: <?php echo (!empty($orderline['type'])) ? $orderline['type'] : 'Ikke angivet'; ?><br>
									Kommentarer: <?php echo (!empty($orderline['formatComments'])) ? $orderline['formatComments'] : 'Intet angivet'; ?></p>

								<h3>Brug</h3>
									<p>Indendørs<br>
									Materiale: <?php echo (!empty($orderline['material'])) ? $orderline['material'] : 'Ikke angivet'; ?><br>
									Kommentarer: <?php echo (!empty($orderline['usageComments'])) ? $orderline['usageComments'] : 'Intet angivet'; ?></p>

								<h3>Filer</h3>
									<?php $fileCount = sizeof($orderline['files']) ?>

									<p><?php echo $fileCount; ?> <?php echo ($fileCount == 1) ? 'fil' : 'filer'; ?> uploadet</p>

									<?php foreach ($orderline['files'] as $file): ?>
										
										<p><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> <?php echo $file['path']; ?></p>

									<?php endforeach ?>

							</div>

						<?php endforeach; ?>

						</div>
					
					</div>

				<?php if($order['status'] == 1): ?>

					<div class="row">

						<button type="button" data-order-number="<?php echo $order['id'] ?>" class="btn btn-default btn-lg pull-right declineorder-btn">
  							Afvis ordre
						</button>

						<button type="button" data-order-number="<?php echo $order['id'] ?>" class="btn btn-default btn-lg pull-right acceptorder-btn">
	  						Godkend ordre
						</button>

						<a class="btn btn-default btn-lg pull-right contactcustomer-btn" target="_black" href="mailto:<?php echo $order['debtor_email'] ?> " role="button">
							Kontakt kunde
						</a>
						
					</div>

				<?php elseif($order['status'] == 2): ?>

					<div class="row">

						<button type="button" data-order-number="<?php echo $order['id'] ?>" class="btn btn-default btn-lg pull-right declineorder-btn">
  							Afvis ordre
						</button>

						<button type="button" data-order-number="<?php echo $order['id'] ?>" class="btn btn-default btn-lg pull-right finishorder-btn">Færdiggør ordre</button>

						<a class="btn btn-default btn-lg pull-right contactcustomer-btn" target="_black" href="mailto:<?php echo $order['debtor_email'] ?> " role="button">
							Kontakt kunde
						</a>
						
					</div>

				<?php elseif($order['status'] == 3): ?>

					<div class="row">

						<button type="button" data-order-number="<?php echo $order['id'] ?>" class="btn btn-default btn-lg pull-right finishorder-btn">Genoptag ordre</button>

						<a class="btn btn-default btn-lg pull-right contactcustomer-btn" target="_black" href="mailto:<?php echo $order['debtor_email']?> " role="button">
							Kontakt kunde
						</a>
						
					</div>

				<?php elseif($order['status'] == 4): ?>
					
					<div class="row">

						<button type="button" data-order-number="<?php echo $order['id'] ?>" class="btn btn-default btn-lg pull-right finishorder-btn">Færdiggør ordre</button>

						<a class="btn btn-default btn-lg pull-right contactcustomer-btn" target="_black" href="mailto:<?php echo $order['debtor_email'] ?>" role="button">
							Kontakt kunde
						</a>
						
					</div>

				<?php endif; ?>

	  			</div>
				
			</div>
	
  		</div>
	

	<?php endforeach; ?>

	</div>

<?php endforeach; ?>

<?php require 'footer.php'; ?>
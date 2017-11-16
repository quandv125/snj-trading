<div class="page-inner">			
	<div id="main-wrapper1" class="container1">
		<div class="row1">
			<div class="invoice">
				<div class="panel panel-white">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								<h1 class="m-b-md"><b>Invoice</b></h1>
								<address>
									<?= h($order->firstname) ?> <?= h($order->lastname) ?><br>
									<?= h($order->email) ?> <br>
									<?= h($order->phone) ?> <br/>
									<?= h($order->address) ?>
								</address>
							</div>
							<div class="col-md-12">
								<table class="table table-striped">
									<thead>
										<tr>
											<th><?php echo __("Item");?></th>
											<th><?php echo __("Description");?></th>
											<th><?php echo __("Quantity");?></th>
											<th><?php echo __("Price");?></th>
										</tr>
									</thead>
									<tbody>
										<?php if (!empty($order->order_products)): ?>
											<?php $total = 0; foreach ($order->order_products as $orderProducts): ?>
												<tr>
													<td><?= h($orderProducts->id) ?></td>
													<td><?= h($orderProducts->product_name) ?></td>
													<td><?= h($orderProducts->quantity) ?></td>
													<td><?= number_format($orderProducts->price, DECIMALS); ?> 원</td>
												</tr>
											<?php $total += $orderProducts->price; endforeach; ?>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
							<div class="col-md-8">
								<h3>Thank you !</h3>
								<p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.</p>
								<img src="assets/images/signature.png" height="150" class="m-t-lg" alt="">
							</div>
							<div class="col-md-4">
								<div class="text-right">
									<h4 class="no-m m-t-sm">Subtotal</h4>
									<h2 class="no-m"><?= number_format($total, DECIMALS); ?> 원</h2>
									<hr>
									<h4 class="no-m m-t-sm">Shipping</h4>
									<h2 class="no-m">240 원</h2>
									<hr>
									<h4 class="no-m m-t-md text-success">Total</h4>
									<h1 class="no-m text-success"><?= number_format($total, DECIMALS); ?> 원</h1>
									<hr>
									<button class="btn btn-primary">Submit your invoice</button>
								</div>
							</div>
						</div><!--row-->
					</div>
				</div>
			</div>
		</div><!-- Row -->
	</div><!-- Main Wrapper -->
	<div class="page-footer">
		<div class="container">
			<p class="no-s">2015 &copy; Modern by Steelcoders.</p>
		</div>
	</div>
</div><!-- Page Inner -->


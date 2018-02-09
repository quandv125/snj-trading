<div id="main-wrapper">
	<div class="row">
			<div class="col-lg-3 col-md-6">
					<div class="panel info-box panel-white1">
							<div class="panel-body">
									<div class="info-box-stats">
											<p class="counter"><?php echo $count_products ?></p>
											<span class="info-box-title">Products</span>
									</div>
									<div class="info-box-icon">
											<i class="icon-users"></i>
									</div>
									<div class="info-box-progress">
											<div class="progress progress-xs progress-squared bs-n">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
													</div>
											</div>
									</div>
							</div>
					</div>
			</div>
			<div class="col-lg-3 col-md-6">
					<div class="panel info-box panel-white1">
							<div class="panel-body">
									<div class="info-box-stats">
											<p class="counter"><?php echo $count_orders; ?></p>
											<span class="info-box-title">Orders</span>
									</div>
									<div class="info-box-icon">
											<i class="icon-eye"></i>
									</div>
									<div class="info-box-progress">
											<div class="progress progress-xs progress-squared bs-n">
													<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
													</div>
											</div>
									</div>
							</div>
					</div>
			</div>
			<div class="col-lg-3 col-md-6">
					<div class="panel info-box panel-white1">
							<div class="panel-body">
									<div class="info-box-stats">
											<p>$<span class="counter">653,000</span></p>
											<span class="info-box-title">Monthly revenue goal</span>
									</div>
									<div class="info-box-icon">
											<i class="icon-basket"></i>
									</div>
									<div class="info-box-progress">
											<div class="progress progress-xs progress-squared bs-n">
													<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
													</div>
											</div>
									</div>
							</div>
					</div>
			</div>
			<div class="col-lg-3 col-md-6">
					<div class="panel info-box panel-white1">
							<div class="panel-body">
									<div class="info-box-stats">
											<p class="counter">1</p>
											<span class="info-box-title"><?= $this->Html->link('Order', ['controller'=>'inquiries','action'=>'inquiries'])?></span>
									</div>
									<div class="info-box-icon">
											<i class="icon-envelope"></i>
									</div>
									<div class="info-box-progress">
											<div class="progress progress-xs progress-squared bs-n">
													<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
													</div>
											</div>
									</div>
							</div>
					</div>
			</div>
	</div><!-- Row -->
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="panel panel-white">
				<div class="panel-heading">
						<h4 class="panel-title">Products</h4>
				</div>
				<div class="panel-body">
					<div class="table-responsive project-stats">  
						<table class="table">
							<thead>
								<tr>
									
									<th><?php echo __("Code"); ?></th>
									<th><?php echo __("Product Name"); ?></th>
									<th><?php echo __("Status"); ?></th>
									<th><?php echo __("Created"); ?></th>
								
								</tr>
							</thead>
								<tbody>
									<?php foreach ($products as $key => $product): ?>
									<tr>
										<td scope="row"><?php echo $product->sku ?></td>
										<td><?php echo $product->product_name ?></td>
										<td><span class="label label-info"><?php echo $product->status ?></span></td>
										<td><?php echo $product->created ?></td>
										
										
									 </tr>
									<?php endforeach ?>
								</tbody>
						</table>
					</div>
				</div>
				<div class="panel-heading">
						<h4 class="panel-title">Order</h4>
				</div>
				<div class="panel-body">
					<div class="table-responsive project-stats">  
						<table class="table">
							<thead>
								<tr>
									<th>Order Number #</th>
									<th>Customer</th>
									<th>Email</th>
									<th>Status</th>
									<th>Created</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($orders as $key => $order): ?>
									<tr>
										<th scope="row"><?php echo $order->id; ?></th>
										<td><?php echo $order->firstname; ?> <?php echo $order->lastname; ?></td>
										<td><?php echo $order->email; ?></td>
										<td><span class="label label-info"><?php echo $order->status; ?></span></td>
										<td><?php echo $order->created; ?></td>
										
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- Main Wrapper -->
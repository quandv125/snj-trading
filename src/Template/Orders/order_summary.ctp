<div class="panel panel-white" id="order_id" order_id="<?php echo $order->id; ?>">
	<div class="panel-body">
		<div role="tabpanel">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li role="presentation" class="active">
					<a href="#tab1" class="bold" role="tab" data-toggle="tab"><?php echo __("Overview") ?></a>
				</li>
				<li role="presentation">
					<a href="#tab2" class="bold" role="tab" data-toggle="tab"><?php echo __("Billing Address"); ?></a>
				</li>
				<li role="presentation">
					<a href="#tab3" class="bold" role="tab" data-toggle="tab"><?php echo __("Delivery Address"); ?></a>
				</li>
				<li role="presentation">
					<a href="#tab4" class="bold" role="tab" data-toggle="tab"><?php echo __("Inventory") ?></a>
				</li>
				<li role="presentation">
					<a href="#tab5" class="bold" role="tab" data-toggle="tab"><?php echo __("Notes") ?></a>
				</li>
				
			</ul>
			<!-- Tab panes -->
			<div class="tab-content tab-content-order" id="tab-content">
				<div role="tabpanel" class="tab-pane  active fade in" id="tab1">
					<div class="panel-heading-order ">
						<h4 class="order_summary"><?= __('Order Summary'); ?></h4>
					</div>
					<fieldset class="col-sm-8">
						<legend>Change Status</legend>
						<div class="order_status" >
							<label class="col-sm-6">Order Status</label>
							<span class="col-sm-6">
								<select name="order[status]" id="o_status" original="1">
									<option value="0" selected="selected">Pending</option>
									<option value="1">Processing</option>
									<option value="2">Order Complete</option>
									<option value="3">Declined</option>
									<option value="4">Failed Fraud Review</option>
									<option value="5">Cancelled</option>
								</select>
							</span>
						</div>
					</fieldset>
					<div class="divider15 clearfix"></div>
					<div class="order_overview">
						<div class="col-sm-4">
							<legend>Billing Address</legend>
							<div class="overview-content-address">
								<p><?= h($order->firstname.' '.$order->lastname) ?></p>
								<p><?= h($order->company) ?></p>
								<p><?= h($order->email) ?></p>
								<p><?= h($order->phone) ?></p>
								<p><?= h($order->address) ?>, <?= h($order->city) ?>, <?= h($order->country) ?></p>
								<p><?= h($order->postcode_zip) ?></p>
							</div>
						</div>
						<div class="col-sm-4">
							<legend>Delivery Address</legend>
							<div class="overview-content-address">
								<p><?= h(json_decode($order->delivery_address)->name) ?></p>
								<p><?= h(json_decode($order->delivery_address)->email) ?></p>
								<p><?= h(json_decode($order->delivery_address)->phone) ?></p>
								<p><?= h(json_decode($order->delivery_address)->address) ?>, <?= h(json_decode($order->delivery_address)->city) ?>, <?= h(json_decode($order->delivery_address)->country) ?></p>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="col-sm-8">
							<legend>Items</legend>
							<div class="overview-content">
								<table class="table table-striped">
									<tbody style="border-bottom: 1px solid #e4e4e4;">
									<?php if (!empty($order->order_products)): ?>
										<?php $total = 0; foreach ($order->order_products as $key => $orderProducts): ?>
											<tr>
												<td><?= h($key+1); ?></td>
												<td><?= h($orderProducts->product_name) ?></td>
												<td><?= h($orderProducts->quantity) ?></td>
												<td style="width: 100px;"><?= number_format($orderProducts->price*$orderProducts->quantity, DECIMALS); ?> 원</td>
											</tr>
										<?php $total += $orderProducts->price*$orderProducts->quantity; endforeach; ?>
									<?php endif; ?>
								</tbody>
								</table>
							</div>
						
							<div class="col-md-8 float-right">
								<div class="text-right">
									<h5 class="no-m m-t-sm">
										<span>Subtotal: </span>
										<span><?= number_format($total, DECIMALS); ?> 원</span>
									</h5>
									<br>
									<?php $total_tax = 0; foreach ($extras as $value): ?>
										<h5 class="no-m m-t-sm">
											<span><?= $value->name?>: </span> 
											<span><?= number_format($value->cost, DECIMALS); ?> 원</span>
										</h5><br>
									<?php $total_tax += $value->cost; endforeach ?>
									
									<h3 class="no-m m-t-sm">
										<span>Total: </span>
										<span><?= number_format($total+ $total_tax, DECIMALS); ?> 원</span>
									</h3>
								</div>
							</div>
						</div>
						<div class="divider10 clearfix"></div>
						<div class="col-sm-4">
							<legend>Contact Details</legend>
							<div class="overview-content">
								<table class="table table-striped">
									<tr>
										<td class="bold"><?php echo __('Email')?></td>
										<td><?= h($order->email) ?> </td>
									</tr>
									<tr>
										<td class="bold"><?php echo  __("Phone");?></td>
										<td><?= h($order->phone) ?> </td>
									</tr>
									<tr>
										<td class="bold"><?= __("Address")?>:</td>
										<td><?= h($order->address.' - '.$order->city.' - '.$order->country) ?> <br></td>
									</tr>
								
								</table>
							</div>
						</div>
						<div class="col-sm-4">
							<legend>Shipping Details</legend>
							<div class="overview-content">
								<table class="table table-striped">
									<tr>
										<td class="bold"><?php echo __('Gateway')?></td>
										<td><?= "eway"; ?></td>
									</tr>
									
								</table>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="tab2">
					<div class="panel-heading-order ">
						<h4 class="order_summary"><?= __('Billing Address'); ?></h4>
					</div>

					
					<?php echo $this->Form->create($order,['url'=>['controller'=>'orders','action'=>'edit',$order->id],'horizontal' => true]);?>
					<fieldset class="col-sm-8">
						<legend>Billing Address</legend>
						<div class="order_status billing-address">
							<?php
								echo $this->Form->input('firstname');
								echo $this->Form->input('lastname');
								echo $this->Form->input('company');
								echo $this->Form->input('address');
								echo $this->Form->input('city');
								echo $this->Form->input('country');
								echo $this->Form->input('postcode_zip');
							?>
						 </div>
						 <div class="contact-details">Contact Details</div>
						 <div class="order_status billing-address">
						 <?php
								echo $this->Form->input('email');
								echo $this->Form->input('phone');
						?>
						</div>
					</fieldset>
					<div class="divider15 clearfix"></div>
					<?= $this->Form->button('Submit',array('class' => 'btn btn-success margin-left15')); ?>
					<?php echo $this->Form->end(); ?>
					<div class="divider5 clearfix"></div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="tab3">
					<div class="panel-heading-order ">
						<h4 class="order_summary"><?= __('Delivery Address'); ?></h4>
					</div>
					<!-- <?php //echo $this->Form->create(NULL, ['horizontal' => true]) ; ?> -->
					<!-- <fieldset class="col-sm-8">
						<legend>Delivery Address</legend>
						<div class="order_status delivery-address">
							<?php
								//echo $this->Form->input('firstname');
								//echo $this->Form->input('lastname');
								//echo $this->Form->input('company');
								//echo $this->Form->input('address');
								//echo $this->Form->input('city');
								//echo $this->Form->input('country');
								//echo $this->Form->input('postcode_zip');
							?>
						</div>
						<div class="contact-details">Shipping Information</div>
						<div class="order_status delivery-address">
							<?php
								//echo $this->Form->input('dispatch_date',['class'=>'date-picker', 'value' => date('Y-m-d') ]);
								//echo $this->Form->input('shipping_method');
								//echo $this->Form->input('shipping_product');
								//echo $this->Form->input('weight',['label'=>'Weight (Kg)']);
							?>
						</div>
					</fieldset> -->
					<!-- <div class="divider15 clearfix"></div>
					<?php //echo $this->Form->button('Submit',array('class' => 'btn btn-success margin-left15')); ?>
					<?php //echo $this->Form->end(); ?> -->
					<div class="divider5 clearfix"></div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="tab4">
					<div class="panel-heading-order">
						<button class="btn btn-info float-right" data-toggle='modal' data-target='#Modal'><i class="fa fa-plus"></i></button>
						<h4 class="order_summary"><?= __('Order Inventory'); ?></h4>
					</div>
					<div class="clearfix"></div>
					<div class="table-responsive col-lg-9" style="min-height: 500px;">
						<?php echo $this->Form->create(NULL,['url'=>['controller'=>'orders','action'=>'EditOrderProducts',$order->id]]);?>

						<table class="table table-striped ">
							<thead>
								<tr>
									<th>#</th>
									<th>Product Name</th>
									<th class="width10">Quantity</th>
									<th class="width15 text-center">Unit Price</th>
									<th class="width15 text-center">Price</th>
									<th class="width5">&nbsp;</th>
							   </tr>
							</thead>
							<tbody>
								<?php if (!empty($order->order_products)): ?>
									<?php $total = 0; foreach ($order->order_products as $key => $orderProducts): ?>
										<tr>
											<td><?= h($key+1) ?></td>
											<td><?= h($orderProducts->product_name) ?></td>
											<td class="text-center">
												<?php echo $this->Form->input($orderProducts->id,['type' => 'number', 'value' => $orderProducts->quantity, 'label' => false]) ?>
											</td>
											<td class="text-center">
												<?= number_format($orderProducts->price, DECIMALS); ?> 원</td>
											<td class="text-center">
												<?= number_format($orderProducts->price*$orderProducts->quantity, DECIMALS); ?> 원</td>
											<td class="text-center" style="color: #f70101;">
												<?= $this->Html->Link(__('<i class="fa fa-trash" aria-hidden="true"></i>'), 
													['action' => 'DeleteOrderProducts', $orderProducts->id], 
													['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $orderProducts->id)]) ?>

										</tr>
									<?php $total += $orderProducts->price*$orderProducts->quantity; endforeach; ?>
								<?php endif; ?>
							</tbody>
						</table>
						<button class="btn btn-success">Save</button>
						<?= $this->Form->end();?>
					</div>
					<div class="col-lg-3 float-right">
						<div class="divider15"></div>
						<div class="table-responsive">
							<table class="table">
								<tbody id="add-tax">
									<tr>
										<td>Subtotal:</td>
										<td><?= number_format($total, DECIMALS); ?> 원</td>
										<td></td>
										<td></td>
									</tr>
									<?php foreach ($extras as $value): ?>
										<tr>
											<td><?= $value->name?>:</td>
											<td><?= number_format($value->cost, DECIMALS); ?> 원</td>
											<td>
												<span class="text-info cursor-pointer float-right" data-toggle='modal' data-target='#MyModal'><i class="fa fa-pencil"></i></span>
												
												
											</td>
											<td>
												<?= $this->Form->postLink(__('<i class="fa fa-trash" aria-hidden="true"></i>'), ['action' => 'DeleteExtra', $value->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete?', $value->id)]) ?>
											</td>
										</tr>
											<div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
												<div class="modal-dialog modal-sm modal-center">
													<div class="modal-content">
														<?php echo $this->Form->create(NULL,['url'=>['controller'=>'orders','action'=>'EditTax',$value->id]]);?>
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
															<h4 class="modal-title" id="myModalLabel"><?php echo __("Add Tax") ?></h4>
														</div>
														<div class="modal-body">
															 <div class="clearfix divider15"></div>
															<?= $this->Form->input('name',['id' => 'tax-label','value' => $value->name ,'label' => 'Label']);?> 
															<?= $this->Form->input('cost',['id' => 'tax-value','value' => $value->cost ,'label' => 'Value']);?> 
														</div>
														<div class="modal-footer">
															<div class="clearfix divider15"></div>
															<?= $this->Form->button('Submit',['class' => 'btn btn-success float-right margin-right15']);?>
															<?= $this->Form->end();?>
														</div>
													</div>
												</div>
											</div> 
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<div class="float-right">
						<h2 class="no-m m-t-md text-right text-primary">Total</h2>
						<div class="divider10"></div>
						<h2 class="no-m text-primary "><?= number_format($total+$total_tax, DECIMALS); ?> 원</h2>
						</div>
					</div>
					<div class="divider5 clearfix"></div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="tab5">
					<div class="panel-heading-order ">
						<h4 class="order_summary"><?= __('Notes'); ?></h4>
					</div>
					<div class="col-sm-8">
						<div class="contact-details">Add Note</div>
						<div class="order_status delivery-address">
							<?php echo $this->Form->create(NULL, ['horizontal' => true]) ; ?>
							<p>Internal Note Content</p>
							<p>	(These notes are not visible to the customer)</p>
							<?php echo $this->Form->textarea('note'); ?>
							<br>
							<p>Public Note Content</p>
							<p>	(These notes CAN be viewed by the customer and will be appended to order notifications.)</p>
							<?php echo $this->Form->textarea('note'); ?>
							<br>
							<?= $this->Form->button('Submit',array('class' => 'btn btn-success margin-left5')); ?>
							<?php echo $this->Form->end(); ?>
						</div>
					</div>
					<div class="divider5 clearfix"></div>
				</div>
				
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm modal-center">
		<div class="modal-content">
			<?php echo $this->Form->create(NULL,['url'=>['controller'=>'orders','action'=>'AddTax',$order->id]]);?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php echo __("Add Tax") ?></h4>
			</div>
			<div class="modal-body">
				 <div class="clearfix divider15"></div>
				<?= $this->Form->input('name',['id' => 'tax-label', 'label' => 'Label']);?> 
				<?= $this->Form->input('cost',['id' => 'tax-value', 'label' => 'Value']);?> 
			</div>
			<div class="modal-footer">
				<div class="clearfix divider15"></div>
				<?= $this->Form->button('Submit',['class' => 'btn btn-success float-right margin-right15']);?>
				<?= $this->Form->end();?>
			</div>
		</div>
	</div>
</div>  <!-- End -->
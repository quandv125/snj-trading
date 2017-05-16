<div class="timeline-horizontal-wap text-center">
	<ul class="timeline timeline-horizontal">
		<li class="timeline-item">
			<div class="timeline-badge <?= ($inquiry->status >= 1)?"success":"default"?>" data-toggle="tooltip" title="Step 1" data-placement="bottom"><i class="fa fa-pencil"></i></div>
		</li>
		<li class="timeline-item">
			<div class="timeline-badge <?= ($inquiry->status >= 2)?"success":"default"?>" data-toggle="tooltip" title="Step 2" data-placement="bottom"><i class="glyphicon glyphicon-check"></i></div>
		</li>
		<li class="timeline-item">
			<div class="timeline-badge <?= ($inquiry->status >= 3)?"success":"default"?>" data-toggle="tooltip" title="Step 3" data-placement="bottom"><i class="glyphicon glyphicon-check"></i></div>
		</li>
		<li class="timeline-item">
			<div class="timeline-badge <?= ($inquiry->status >= 4)?"success":"default"?>" data-toggle="tooltip" title="Step 4" data-placement="bottom"><i class="glyphicon glyphicon-check"></i></div>
		</li>
		<li class="timeline-item">
			<div class="timeline-badge <?= ($inquiry->status >= 5)?"success":"default"?>" data-toggle="tooltip" title="Step 5" data-placement="bottom"><i class="glyphicon glyphicon-check"></i></div>
		</li>
	</ul>
</div>

<?php if ($inquiry->type == UNAVAILABLE): ?>
	<div class="col-md-12 item-unavailable" id="<?= h($inquiry->id) ?>">
		<div class="col-md-4">
			<?= $this->Form->input('vessel',['class'=>'vessel',"disabled","value"=> ($inquiry->vessel)]) ?>
		</div>
		<div class="col-md-4">
			<?= $this->Form->input('imo_no',['class'=>'imo_no',"disabled","value"=> ($inquiry->imo_no)]) ?>
		</div>
		<div class="col-md-4">
			<?= $this->Form->input('hull_no',['class'=>'hull_no',"disabled","value"=> ($inquiry->hull_no)]) ?>
		</div>
		<div class="col-md-4">
			<?= $this->Form->input('date',['class'=>'date',"disabled",'value' => date("Y-m-d") ]) ?>
		</div>
		<div class="col-md-4">
			<?= $this->Form->input('ref',['class'=>'ref',"disabled","value"=> ($inquiry->ref)]) ?>
		</div>
		<div class="col-md-4">
			<div class="form-group text">
			<label class="control-label" for="ref">File</label><div class="clearfix"></div>
				<?php foreach ($inquiry->attachments as $key => $attachment): ?>
				<?php echo $this->Html->link(basename($attachment->path),['controller'=>'inquiries','action'=>'download',$attachment->id]) ?><br>
			<?php endforeach ?>
			</div>
		</div>
		
		<div class="clearfix"></div>
		<div class="col-md-4">
		<?= $this->Form->input('description',['type'=>'textarea','label'=>'Remark','value' =>$inquiry->description]) ?>
		</div>
		<div class="col-md-4">
			<label class="control-label" for="ref">Grand Total</label><div class="clearfix"></div>
			<div class="col-md-6 input-group group-indicator">
				<div class="input number">
					<input name="" value="<?= $total?>" class="form-control">
				</div>
				<span class="input-group-addon group-addon-width">USD</span>
			</div>
		</div>
		<div class="clearfix"></div><br>
		<div id="grid" data-room='<?php echo($data);?>'></div>
		<div id="datahandtable" ></div>
		
	</div>

<?php else: ?>

<div id="content">
	<div class="content-page woocommerce">
		<div class="container">
			<div class="cart-content-page">
				<h2 class="title-shop-page"></h2>
				<div class="table-responsive">
					<table cellspacing="0" class="shop_table cart table">
						<thead>
							<tr>
								<th class="text-center"><?php echo __('#'); ?></th>
								<th class="text-center" style="max-width: 100px;"><?php echo __('Name'); ?></th>
								<th class="text-center"><?php echo __('Category'); ?></th>
								<th class="text-center"><?php echo __('Serial No'); ?></th>
								<th class="text-center"><?php echo __('Type Model'); ?></th>
								<th class="text-center"><?php echo __('Origin'); ?></th>
								<!--  <th class="text-center"><?php echo __('Price'); ?></th> -->
								<th class="text-center"><?php echo __('Quantity'); ?></th>
								<th class="text-center"><?php echo __('Remark'); ?></th>
							</tr>
						</thead>
						<tbody>
						<?php $total = 0; ?><?php $total_qty = 0; ?>
							<?php foreach ($inquiry->inquirie_products as $key => $inq): ?>

								<?php $total_qty = $total_qty + $inq->quantity?>
								<tr class="cart_item cart_item_<?php echo $inq->id; ?>" invoice_product_id="<?php echo $inq->id; ?>">
									<td class="text-center">
										<span class="" product_id=""><i class="fa fa-times"></i></span>
									</td>
									<td class="text-center">
										<?php echo $this->Html->link($inq['products']['product_name'], ['controller'=>'pages','action'=>'products', $inq['products']['id']]); ?> 
									</td>
									<td class="text-center">
										<?= $this->Html->link($inq['categories']['name'], ['controller'=>'pages','action'=>'categoriesParent', $inq['Categories']['id']]); ?> 
									</td>
									<td class="text-center">
										<?= $inq['products']['serial_no'] ?>
									</td>
									<td class="text-center">
										<?= $inq['products']['type_model'] ?>
									</td>
									<td class="text-center">
										<?= $inq['products']['origin'] ?>
									</td>
									<!-- <td class="text-center">
										$ <?= $price = $inq['products']['retail_price']; ?>
										<?php $total = $total+($price*$inq->quantity); ?>
									</td> -->
									<td class="text-center">
										<div class="info-qty" id="<?php echo $key; ?>">
											<span class="qty-val"><?php echo $inq->quantity ?></span>
										</div>          
									</td>
									<td class="text-center">
										<?php echo $inq->remark ?>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				   
					<div class="clearfix"></div><br>
				</div>
			</div>
		</div>  
	</div>
</div>
<?php endif ?>

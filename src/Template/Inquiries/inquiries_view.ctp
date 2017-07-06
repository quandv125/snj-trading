<div class="timeline-horizontal-wap text-center">
	<ul class="timeline timeline-horizontal">
		<li class="timeline-item">
			<div class="timeline-badge <?= ($inquiries->status >= 1)?"success":"default"?>" data-toggle="tooltip" title="Step 1" data-placement="bottom"><i class="fa fa-pencil"></i></div>
		</li>
		<li class="timeline-item">
			<div class="timeline-badge <?= ($inquiries->status >= 2)?"success":"default"?>" data-toggle="tooltip" title="Step 2" data-placement="bottom"><i class="glyphicon glyphicon-check"></i></div>
		</li>
		<li class="timeline-item">
			<div class="timeline-badge <?= ($inquiries->status >= 3)?"success":"default"?>" data-toggle="tooltip" title="Step 3" data-placement="bottom"><i class="glyphicon glyphicon-check"></i></div>
		</li>
		<li class="timeline-item">
			<div class="timeline-badge <?= ($inquiries->status >= 4)?"success":"default"?>" data-toggle="tooltip" title="Step 4" data-placement="bottom"><i class="glyphicon glyphicon-check"></i></div>
		</li>
		<li class="timeline-item">
			<div class="timeline-badge <?= ($inquiries->status >= 5)?"success":"default"?>" data-toggle="tooltip" title="Step 5" data-placement="bottom"><i class="glyphicon glyphicon-check"></i></div>
		</li>
	</ul>
</div>

<div class="col-md-12 item-unavailable1" id="<?= h($inquiries->id) ?>">

	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Infomation</a></li>
		<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Cost & Price</a></li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content tab-customer">
		<div role="tabpanel" class="tab-pane active" id="home">
			<?= $this->Form->create(NULL, ['id' => 'inquiries-info']); ?>
				<?= $this->Form->input('id',['class'=>'hidden','label' => false,"value"=> ($inquiries->id)]) ?>
				<div class="col-md-4">
					<?= $this->Form->input('vessel',['class'=>'vessel','label'=>'Vessel Name',"value"=> ($inquiries->vessel)]) ?>
				</div>
				<div class="col-md-4">
					<?= $this->Form->input('imo_no',['class'=>'imo_no','label' =>'IMO No',"value"=> ($inquiries->imo_no)]) ?>
				</div>
				<div class="col-md-4">
					<?= $this->Form->input('hull_no',['class'=>'hull_no','label' =>'HULL No',"value"=> ($inquiries->hull_no)]) ?>
				</div>
				<div class="col-md-4">
					<?= $this->Form->input('ref',['class'=>'ref','label'=>'Ref No',"value"=> ($inquiries->ref)]) ?>
				</div>
				<div class="col-md-4">
					<label class="control-label" for="date">Date</label><div class="clearfix"></div>
					<?= $this->Form->input('date',['class'=>'date','id'=>'datepicker','label'=>false,'value' => date("Y-m-d") ]) ?>
				</div>
				<div class="col-md-4">
					
					<?= $this->Form->input('subject',['class'=>'date','id'=>'datepicker','value' => $inquiries->subject ]) ?>
				</div>
			<div class="clearfix"></div>
			<div class="col-md-4">
				<?= $this->Form->input('description',['type'=>'textarea','label'=>'Remark','value' => $inquiries->description]) ?>
			</div>
			<div class="col-md-4">
				<div class="form-group text">
				<label class="control-label" for="ref">File</label><div class="clearfix"></div>
				<?= $this->Form->input('file.',["type"=>"file",'class'=>'ref','multiple','label'=>false]) ?>
					<?php if (isset($inquiries->attachments)): ?>
					<table class="table file-attachments">
						<?php foreach ($inquiries->attachments as $key => $attachment): ?>
						<tr id="attachments-<?= $attachment->id;?>">
							<td><?php echo $this->Html->link(basename($attachment->path),['controller'=>'inquiries','action'=>'download',$attachment->id]) ?></td>
							<td><span class="cursor-point remove-file-att" id="<?= $attachment->id;?>">X</span></td>
						</tr>
						<?php endforeach ?>
					</table>
					<?php endif ?>
				</div>
			</div>
				<div class="clearfix"></div>
				<?= $this->Form->button("Update",['class'=>'btn btn-success float-right']) ?>
				<?= $this->Form->end(); ?>
				<div class="clearfix"></div>
		</div>
		<div role="tabpanel" class="tab-pane" id="profile">
			<div id="content">
				<div class="content-page woocommerce">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 ">
								<div class="woocommerce-checkout-review-order" id="order_review">
									<div class="table-responsive">
										<table class="shop_table woocommerce-checkout-review-order-table">
											<thead>
												<tr>
													<th class="product-name">name</th>
													<th class="product-total">Price</th>
												</tr>
											</thead>
											<tbody>
												<tr class="cart_item">
													<td class="product-name">
														Total
													</td>
													<td class="product-total">
														<span class="amount"> $ <?= number_format($total, 2); ?></span>
													</td>
												</tr>
												<tr class="cart_item">
													<td class="product-name">
														Commission <span class="product-quantity">(<?= $inquiries->commission.'%';?>)</span>
													</td>
													<td class="product-total">
														<?php $commission = ($total*$inquiries->commission)/100;?>
														<span class="amount"> $ <?= number_format($commission, 2); ?></span>
													</td>
												</tr>
												<tr class="cart_item">
													<td class="product-name">
														Add Commission <span class="product-quantity">(<?= $inquiries->add_commission.'%';?>)</span>
													</td>
													<td class="product-total">
														<?php $add_commission = ($total*$inquiries->add_commission)/100;?>
														<span class="amount"> $ <?= number_format($add_commission, 2); ?></span>
													</td>
												</tr>
												<tr class="cart_item">
													<td class="product-name">
														Discount <span class="product-quantity">(<?= $inquiries->discount.'%';?>)</span>
													</td>
													<td class="product-total">
														<?php $discount = ($total*$inquiries->discount)/100;?>
														<span class="amount"> $ <?= number_format($discount, 2); ?></span>
													</td>
												</tr>
											</tbody>
											<tfoot>
												<?php $cost = 0; ?>
												<?php foreach ($inquiries->extras as $key => $extra): ?>
													<?php $cost = $cost+$extra->cost; ?>
												<?php endforeach ?>
										
												<tr class="shipping">
													<td>Extras Cost ($ <?php echo $cost; ?>)</td>
													<td>
														<ul id="shipping_method">
															<?php foreach ($inquiries->extras as $key => $extra): ?>
															<li>
																<label for="shipping_method_0_free_shipping"><?php echo ucfirst($extra->name) ?>(<?php echo '$ '.number_format($extra->cost,2) ?>)</label>
															</li>
															<?php endforeach ?>
														</ul>
													</td>
												</tr>
												<tr class="order-total">
													<th>Grand Total</th>
													<td><strong><span class="amount"> $ <?= number_format($total+$commission+$add_commission-$discount+$cost, 2); ?></span></strong> </td>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Content Page -->
			</div>
			<div class="clearfix"></div>
			<br/>
		</div>
	</div>
	<div class="clearfix"></div>
	<br>
	<div id="grid" inquiry_id="<?= $inquiries->id?>" data-type="<?= $inquiries->type?>" data-room='<?php echo($data);?>'></div>
	
</div>

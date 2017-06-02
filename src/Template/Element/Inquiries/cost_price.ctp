
 <span class="btn btn-primary waves-effect waves-button waves-red margin-left15" data-toggle="modal" data-target="#myModal">
	<i class="fa fa-plus"></i>
</span>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm modal-center">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php echo __("Extra Cost") ?></h4>
			</div>
			<div class="modal-body">
				<?= $this->Form->create(NULL, ['id' => 'extra-cost']); ?>
				<?= $this->Form->input('inquiryid',['class'=>'hidden','label'=>false,'value' => $inquiries->id]) ?>
				<?= $this->Form->input('name');?> 
				<?= $this->Form->input('cost');?> 
				<?= $this->Form->input('profit');?> 
				<?= $this->Form->input('final');?> 
			  
			</div>
			<div class="modal-footer">
				<?= $this->Form->button("Submit",['class'=>'btn btn-success']) ?>
				<?= $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>  <!-- End -->

<div class="clearfix divider10"></div>
<div ng-app>
	<div ng-controller="CalculatorCtrl">
		<div class="col-md-4" >
			<div class="panel info-box panel-white">
				<div class="panel-body">
					<div class="info-box-stats1">
						<p class="counter">Commission</p>
					</div>
					<div class="clearfix border-spacings"></div>
					<label class="col-md-3 control-label text-right">Commission</label>
					<div class="col-md-9">
						<div class="input-group group-indicator">
							<div class="input number">
								<input class="form-control" ng-model="commission" val="<?= $inquiries->commission?>" id="commission-inquiry">
							</div>
							<span class="input-group-addon group-addon-width">%</span>
						</div>
					</div>
					<div class="divider10"></div> 
					<label class="col-md-3 control-label text-right">Amount</label>
					<div class="col-md-9">
						<div class="input-group group-indicator">
							<div class="input number">
								<input name="" class="form-control" disabled value="{{r_commission()}}" id="amount-commission">
							</div>
							<span class="input-group-addon group-addon-width">USD</span>
						</div>
					</div>
					<div class="divider10"></div> 
					<!-- <label class="col-md-3 control-label text-right">Amount KRW</label>
					<div class="col-md-9">
						<div class="input-group group-indicator">
							<div class="input number">
								<input name="" class="form-control">
							</div>
							<span class="input-group-addon group-addon-width">KRW</span>
						</div>
					</div> -->
				</div>
			</div>
		</div>

		<div class="col-md-4" >
			<div class="panel info-box panel-white">
				<div class="panel-body">
					<div class="info-box-stats1">
						<p class="counter">Additional commission</p>
					</div>
					<div class="clearfix border-spacings"></div>
					<label class="col-md-3 control-label text-right">Additional</label>
					<div class="col-md-9">
						<div class="input-group group-indicator">
							<div class="input number">
								<input class="form-control" ng-model="add_commission" val="<?= $inquiries->add_commission?>" id="add-commission-inquiry">
							</div>
							<span class="input-group-addon group-addon-width">%</span>
						</div>
					</div>
					<div class="divider10"></div> 
					<label class="col-md-3 control-label text-right">Commission</label>
					<div class="col-md-9">
						<div class="input-group group-indicator">
							<div class="input number">
								<input name="" class="form-control" disabled value="{{r_add_commission()}}" id="amount-add-commission">
							</div>
							<span class="input-group-addon group-addon-width">USD</span>
						</div>
					</div>
					<div class="divider10"></div> 
					<!-- <label class="col-md-3 control-label text-right">KRW Commission</label>
					<div class="col-md-9">
						<div class="input-group group-indicator">
							<div class="input number">
								<input name="" class="form-control">
							</div>
							<span class="input-group-addon group-addon-width">KRW</span>
						</div>
					</div> -->
				</div>
			</div>
		</div>

		<div class="col-md-4" >
			<div class="panel info-box panel-white">
				<div class="panel-body">
					<div class="info-box-stats1">
						<p class="counter">Discount</p>
					</div>
					<div class="clearfix border-spacings"></div>
					<label class="col-md-3 control-label text-right">Discount</label>
					<div class="col-md-9">
						<div class="input-group group-indicator">
							<div class="input number">
								<input class="form-control" ng-model="discount" val="<?= $inquiries->discount?>" id="discount-inquiry">
							</div>
							<span class="input-group-addon group-addon-width">%</span>
						</div>
					</div>
					<div class="divider10"></div> 
					<label class="col-md-3 control-label text-right">Amount</label>
					<div class="col-md-9">
						<div class="input-group group-indicator">
							<div class="input number">
								<input name="" class="form-control" disabled value="{{r_discount()}}" id="amount-discount">
							</div>
							<span class="input-group-addon group-addon-width">USD</span>
						</div>
					</div>
					<div class="divider10"></div> 
					<!-- <label class="col-md-3 control-label text-right">Amount KRW</label>
					<div class="col-md-9">
						<div class="input-group group-indicator">
							<div class="input number">
								<input name="" class="form-control">
							</div>
							<span class="input-group-addon group-addon-width">KRW</span>
						</div>
					</div> -->
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel info-box panel-white">
				<div class="panel-body">
					<div class="info-box-stats1">
						<p class="counter"> Item price</p>
					</div>
					<div class="clearfix border-spacings"></div>
					<label class="col-md-3 control-label text-right">Sub Total</label>
					<div class="col-md-9">
						<div class="input-group group-indicator">
							<div class="input number">
								<input name="" disabled value="<?= $grand_total?>" id="sub-total-inquiries" class="form-control">
							</div>
							<span class="input-group-addon group-addon-width">USD</span>
						</div>
					</div>
					<!-- <div class="divider10"></div> 
					<label class="col-md-3 control-label text-right">In KRW</label>
					<div class="col-md-9">
						<div class="input-group group-indicator">
							<div class="input number">
								<input name="" class="form-control">
							</div>
							<span class="input-group-addon group-addon-width">KRW</span>
						</div>
					</div> -->
					<div class="divider10"></div> 
					<label class="col-md-3 control-label text-right">Grand Total</label>
					<div class="col-md-9">
						<div class="input-group group-indicator">
							<div class="input number">
								<input id="grand_total_inquiries" disabled value="{{r_grand_total()}}" class="form-control">
							</div>
							<span class="input-group-addon group-addon-width">USD</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-3"> 
			<div class="panel info-box panel-white">
				<div class="panel-body">
					<div class="info-box-stats1">
						<p class="counter">Profit</p>
					</div>
					<div class="clearfix border-spacings"></div>
					<label class="col-md-3 control-label text-right">Profit Percent</label>
					<div class="col-md-9">
						<div class="input-group group-indicator">
							<div class="input number">
							
								<input name="" type="<?php echo $inquiries->type; ?>" type="number" class="form-control profit-percent-inquiries">
							
							</div>
							<span class="btn btn-set-profit input-group-addon group-addon-width"><i class="fa fa-check" aria-hidden="true"></i></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-5">
	<div class="panel info-box panel-white">
		<div class="panel-body">
			<div class="info-box-stats1">
				<p class="counter">Cost</p>
			</div>
			<div class="clearfix border-spacings"></div>
			<div class="table-responsive">
				<table class="table table-striped1" id="table-cost-price">
				<?php $cost = 0; ?>
				<?php foreach ($inquiries->extras as $key => $extras): ?>
					<?php $cost = $cost+ $extras->cost; ?>
					<tr class="tr-cost-price-<?= $extras->id?>">
						<td><?= $extras->name?></td>
						<td class="excost"><?= $extras->cost?></td>
						<td><?= $extras->profit?></td>
						<td><?= $extras->final?></td>
						<td class="width100px">
							<span class="btn btn-primary waves-effect waves-button waves-red" data-toggle="modal" data-target="#myModalEdit<?= $extras->id ?>">
							<i class="fa fa-pencil"></i>
							</span>
							<div class="modal fade" id="myModalEdit<?= $extras->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
							<div class="modal-dialog modal-sm modal-center">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
										<h4 class="modal-title" id="myModalLabel"><?php echo __("Extra Cost") ?></h4>
									</div>
									<div class="modal-body">
										<?= $this->Form->create(NULL, ['class'=> 'edit-extra-cost edit-extra-cost-'.$extras->id]); ?>
										<?= $this->Form->input('id',['class'=>'hidden','label'=>false,'value' => $extras->id]) ?>
										<?= $this->Form->input('name',['value'=>$extras->name]);?>
										<?= $this->Form->input('cost',['value'=>$extras->cost]);?>
										<?= $this->Form->input('profit',['value'=>$extras->profit]);?>
										<?= $this->Form->input('final',['value'=>$extras->final]);?>
									</div>
									<div class="modal-footer">
										<?= $this->Form->button("Submit",['class'=>'btn btn-success']) ?>
										<?= $this->Form->end(); ?>
									</div>
								</div>
							</div>
							</div>  
							<!-- End -->
							<span class="btn btn-primary waves-effect waves-button waves-red delete-extras cursor-pointer" value="<?= $extras->id ?>">
							<i class="fa fa-trash"></i>
							</span>
							
						</td>
					</tr>
				<?php endforeach ?>
				
			</table>
			</div>
		</div>
	</div>
</div>
<span id="ArrID" inquiry_id="<?php echo $inquiries->id?>" cost="<?= $cost;?>" value="<?php echo($myarr); ?>"></span>
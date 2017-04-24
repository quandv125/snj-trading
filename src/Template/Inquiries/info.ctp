
<div class="row">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			<div class="col-lg-9 col-md-9 col-sm-9">
				Inquiries #<?= $inquiry->id?>
			</div> <!-- col-lg-9 -->
			
		</div> <!-- panel-heading -->

		<div class="panel-body"> 
			
		</div> <!-- panel-body -->
	</div><!-- panel panel-white -->
	


	<div class="panel panel-white panel-supplier-details hidden"></div> <!-- panel-body -->

	<div class="panel panel-white">
		<div class="panel-body"> 
			<?php if (!empty($inquiry->inquirie_products)): ?>
				<div id="grid" data-room='<?= ($data);?>'></div>
			<?php endif; ?>
		</div>
	</div> <!-- panel-body -->
	
</div> <!-- row -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg modal-center">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel"><?= __("ADD") ?></h4>
			</div>
			<div class="modal-body">
				
				<?= $this->Form->create(null, ['url' => [ 'action' => 'AddInqSupplier', $inquiry->id]]); ?>
				<div class="col-md-6"><?= $this->Form->input('user_id',['label' => 'Username', 'options'=>$user_id]) ?></div>
				<div class="col-md-6"><?= $this->Form->input('Subject') ?></div>
				<div class="col-md-6"><?= $this->Form->input('supplier_id',['label'=>'SuppliersName','options'=>$supplier_id]) ?></div>
				<div class="col-md-6"><?= $this->Form->input('Suppliers Pic') ?></div>
				<div class="col-md-6"><?= $this->Form->input('Vessel Name',['disabled','value'=>$inquiry->vessel]) ?></div>
				<div class="col-md-6"><?= $this->Form->input('Cus Ref',['disabled','value'=>$inquiry->ref]) ?></div>
				<div class="col-md-12"><?= $this->Form->input('remark',['type'=>'textarea','class'=>'Remark','label' => 'Remark'])?></div>
				<div class="clearfix"></div>
				<?= $this->Form->button('Submit',['class'=>'btn btn-primary float-right margin-right15']) ?>
				<?= $this->Form->end(); ?><div class="clearfix"></div>
			
			</div>  <!-- modal-body -->
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>  <!-- End -->
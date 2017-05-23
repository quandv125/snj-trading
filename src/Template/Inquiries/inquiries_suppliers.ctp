
<div class="row" id="inquiries" inq="<?= $inquiry->id?>">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			Inquiries to Suppliers: #<?= $inquiry->id?>
					<?php echo $this->Html->link('Next Stage',['controller' =>'inquiries','action' =>'comparing', $inquiry->id],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
				<?php echo $this->Html->link('Pre.Stage',['controller' =>'inquiries','action' =>'InquiriesDetails', $inquiry->id],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
				<?php echo $this->Html->tag('button','<i class="fa fa-plus"></i>',["data-toggle"=>"modal", "data-target"=>"#myModal",'class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
		</div> <!-- panel-heading --><br/>
	</div>
	<div class="panel panel-white">
		<div class="panel-body"> 
			<div class="table-responsive">
				<table class="table table-striped1">
					<thead>
						<tr>
							<th class="text-center" scope="col"><?= $this->Paginator->sort(__('#')) ?></th>
							<th class="text-center" scope="col"><?= $this->Paginator->sort('Suppliers') ?></th>
							<th class="text-center" scope="col"><?= $this->Paginator->sort('Username') ?></th>
							<th class="text-center" scope="col"><?= $this->Paginator->sort('Items') ?></th>
							<th class="text-center" scope="col"><?= $this->Paginator->sort('Total') ?></th>
							<th class="text-center" scope="col"><?= $this->Paginator->sort('Currency') ?></th>
							<th class="text-center" scope="col"><?= $this->Paginator->sort('Date') ?></th>
							<th class="text-center" scope="col">Action</th>
						</tr>
					</thead>
					<tbody id="inquiries-details">
						<?php foreach ($inqSuppliers as $inqSupplier): ?>
							<tr class="cursor-pointer" id="<?= $inqSupplier->id; ?>">
								<td class="text-center"><b><?= '#'.$inqSupplier->inquiry_id; ?></b></td>
								<td class="text-center"><?= $inqSupplier->supplier['name']; ?></td>
								<td class="text-center"><?= $inqSupplier->user['username']; ?></td>
								<td class="text-center"><?= count($inqSupplier->inquirie_supplier_products) ?>/<?php echo ($total1); ?></td>
								<td class="text-center" id="supps-total-<?= $inqSupplier->id; ?>"><?php echo $this->Myhtml->SumPrice($inqSupplier->inquirie_supplier_products); ?></td>
								<td class="text-center"><?= $this->Myhtml->Currency($inqSupplier->currency); ?></td>
								<td class="text-center"><?= h(date("Y-m-d", strtotime($inqSupplier->created))) ?></td>
								<td class="text-center">
									<?= $this->Form->postLink(__('Delete'), ['controller'=>'inquiries','action'=>'DelInqSupplier',$inqSupplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inqSupplier->id)]) ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div> <!-- panel-body -->
	</div><!-- panel panel-white -->

	<div class="panel panel-white panel-supplier-details hidden"></div> <!-- panel-body -->

</div> <!-- row -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg modal-center">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel"><?= __("ADD") ?></h4>
			</div>
			<div class="modal-body">
				<?= $this->Form->create(NULL, ['id' => 'AddInqSupplier']); ?>
				<?= $this->Form->input('inquiry_id',['type'=>'text','label' => false,'class'=>'hidden', 'value'=>$inquiry->id]) ?>
				<div class="col-md-6"><?= $this->Form->input('user_id',['label' => 'Username', 'options'=>$user_id]) ?></div>
				<div class="col-md-6"><?= $this->Form->input('Subject',['value' => 'Spare Part']) ?></div>
				<div class="col-md-6"><?= $this->Form->input('supplier_id',['label'=>'SuppliersName','options'=>$supplier_id]) ?></div>
				<div class="col-md-6"><?= $this->Form->input('Suppliers Pic') ?></div>
				<div class="col-md-6"><?= $this->Form->input('Vessel Name',['disabled','value'=>$inquiry->vessel]) ?></div>
				<div class="col-md-6"><?= $this->Form->input('Cus Ref',['disabled','value'=>$inquiry->ref]) ?></div>
				<div class="col-md-12"><?= $this->Form->input('remark',['type'=>'textarea','class'=>'Remark','label' => 'Remark'])?></div>
				<div class="clearfix"></div>
				<?= $this->Form->button('Submit',['class'=>'btn btn-success float-right margin-right15']) ?>
				<?= $this->Form->end(); ?><div class="clearfix"></div>
			
			</div>  <!-- modal-body -->
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>  <!-- End -->
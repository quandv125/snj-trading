
<div class="row" id="inquiries" inq="<?= $id?>">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			Inquiries to Suppliers: #<?= $id?>
				<?php echo $this->Html->link('Next Stage',['controller' =>'inquiries','action' =>'comparing', $id],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
				<?php echo $this->Html->link('Pre.Stage',['controller' =>'inquiries','action' =>'InquiriesDetails', $id],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
				<?php echo $this->Html->tag('button','<i class="fa fa-plus"></i>',["data-toggle"=>"modal", "data-target"=>"#myModal",'class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
		</div> <!-- panel-heading -->
		<div class="divider15"></div>
	</div>
	<div class="panel panel-white">
		<div class="panel-body"> 
			<div class="table-responsive">
				<table class="table table-striped1">
					<thead>
						<tr>
							<th class="text-center" scope="col"><?= $this->Paginator->sort(__('#')) ?></th>
							<th class="text-center" scope="col"><?= $this->Paginator->sort(__('Suppliers')) ?></th>
							<th class="text-center" scope="col"><?= $this->Paginator->sort(__('PIC')) ?></th>
							<th class="text-center" scope="col"><?= $this->Paginator->sort(__('Our Pic')) ?></th>
							<th class="text-center" scope="col"><?= $this->Paginator->sort(__('Items')) ?></th>
							<th class="text-center" scope="col"><?= $this->Paginator->sort(__('Total')) ?></th>
							<th class="text-center" scope="col"><?= $this->Paginator->sort(__('Currency')) ?></th>
							<th class="text-center" scope="col"><?= $this->Paginator->sort(__('Date')) ?></th>
							<th class="text-center" scope="col"><?= __("Action");?></th>
						</tr>
					</thead>
					<tbody id="inquiries-details">
						<?php foreach ($inqSuppliers as $inqSupplier): ?>
							<tr class="cursor-pointer myrowaxn-<?= $inqSupplier->id; ?>" id="<?= $inqSupplier->id; ?>">
								<td class="text-center main"><b><?= '#'.$inqSupplier->inquiry_id; ?></b></td>
								<td class="text-center main"><?= $inqSupplier->supplier['name']; ?></td>
								<td class="text-center main s_pic_<?= $inqSupplier->id; ?>"><?= $inqSupplier->supplier_pic['name']; ?></td>
								<td class="text-center main"><?= $inqSupplier->user['username']; ?></td>
								<td class="text-center main"><span id="count-product-of-supp-<?= $inqSupplier->id?>"><?= count($inqSupplier->inquirie_supplier_products) ?></span>/<?php echo ($total1); ?></td>
								<td class="text-center main" id="supps-total-<?= $inqSupplier->id; ?>"><?php echo $this->Myhtml->SumPrice($inqSupplier->inquirie_supplier_products); ?></td>
								<td class="text-center main"><span id="currency-<?= $inqSupplier->id?>"><?= $this->Myhtml->Currency($inqSupplier->currency); ?></span></td>
								<td class="text-center main"><?= h(date("Y-m-d", strtotime($inqSupplier->created))) ?></td>
								<td class="text-center">
									<span class="btn btn-primary DeleteInqSupplier" id="<?= $inqSupplier->id?>"><i class="fa fa-trash"></i></span>
									<!-- <?= $this->Form->postLink(__('Delete'), ['controller'=>'inquiries','action'=>'DelInqSupplier',$inqSupplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inqSupplier->id)]) ?> -->
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
				<?= $this->Form->input('inquiry_id',['type'=>'text','label' => false,'class'=>'hidden', 'value'=>$id]) ?>
				<div class="col-md-6"><?= $this->Form->input('user_id',['label' => 'Username', 'options'=>$user_id, 'default' => $user_info['id']]) ?></div>
				<div class="col-md-6"><?= $this->Form->input('Subject',['value' => 'Spare Part']) ?></div>
				<div class="col-md-6"><?= $this->Form->input('supplier_id',['label'=>'Suppliers Name','id' => 'supplier_id' ,'options'=>$supplier_id, 'class' =>'selectpicker',"data-live-search"=>"true"]) ?></div>
				<div class="col-md-6">
					<?= $this->Form->input('supplier_pic_id', ['label'=>__('Suppliers Pic'), 
                        'class' => 'js-states','options' => $options,
                        'append' => [
                            $this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModal2'])]
                        ]);
                    ?>
				</div>
				
				<div class="col-md-12"><?= $this->Form->input('remark',['type'=>'textarea','class'=>'Remark','label' => 'Remark'])?></div>
				<div class="clearfix"></div>
				<?= $this->Form->button('Submit',['class'=>'btn btn-success float-right margin-right15']) ?>
				<?= $this->Form->end(); ?><div class="clearfix"></div>
			</div><!-- modal-body -->
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>  <!-- End -->


<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm modal-center">
        <div class="modal-content" style=" margin-top: 100px; ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo __("Add Suppliers Pic") ?></h4>
            </div>
            <?= $this->Form->create(NULL, ['id' => 'AddSupplierPic']); ?>
            <div class="modal-body">
             	<!-- <?= $this->Form->input('supplier_id',['label'=>'Suppliers Name', 'id' => 'supplier_id' ,'options'=>$supplier_id, 'class' =>'selectpicker',"data-live-search"=>"true"]) ?> -->
                <?php echo $this->Form->input('name',['id' => 'new_suppliers']); ?>
            </div>
            <div class="modal-footer">
                <?= $this->Form->button(__('Submit'),['class'=>"btn btn-success float-right"]) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>  <!-- End -->
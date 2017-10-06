<?php foreach ($suppliers as $supplier): ?>
	 <tr class="row-cz-<?= $str_rand ?> cursor-pointer">
		<td style="width: 1px;">
			<input tabindex="1" type="checkbox" class="icheck-<?= $str_rand ?> Checkbox-<?= $str_rand ?>" id="input-1">
		</td>
		<td class="text-center pulse"><?= ($supplier->id) ?></td>
		<td class="text-center pulse"><?= h($supplier->name) ?></td>
		<td class="text-center pulse"><?= h($supplier->address) ?></td>
		<td class="text-center pulse"><?= h($supplier->tel) ?></td>
		<td class="text-center pulse"><?= h($supplier->email) ?></td>
		<td class="text-center">

			<button class="btn btn-success waves-effect waves-button waves-red" data-toggle="modal" data-target="#SuppliersEdit<?= $supplier->id;?>"><i class="fa fa-pencil"></i></button>
		</td>
	</tr>
	<tr class="row-cz-details hidden">
		<td colspan="7">
			<div role="tabpanel">
				<!-- Nav tabs -->
			   <ul class="nav nav-tabs nav-justified" role="tablist">
					<li role="presentation" class="active">
						<a href="#tab1<?= $supplier->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Infomations") ?></a>
					</li>
					
				</ul>
				<!-- Tab panes -->
			   <div class="tab-content">
					<div role="tabpanel" class="tab-pane active fade in" id="tab1<?= $supplier->id?>">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<article class="suppliers-title"></article>
						</div>
						<div class="clearfix"></div>
						<div class="content">
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
								<table class="table table-striped">
										<tr>
											<td class="bold"><?php echo __('Code')?></td>
											<td><?= $supplier->id; ?></td>
											<td class="bold"><?php echo __('Tel')?></td>
											<td><?= $supplier->tel; ?></td>
										</tr>
										<tr>
											<td class="bold"><?php echo  __('Name')?></td>
											<td><?= $supplier->name?></td>
											<td class="bold"><?php echo __('Tax') ?>:</td>
											<td><?= $supplier->tax_registration_number; ?></td>
										</tr>
										<tr>
										   
											<td class="bold"><?= __('Fax')?>:</td>
											<td><?= $supplier->fax?></td>
											<td class="bold"><?= __('Email')?>:</td>
											<td><?= $supplier->email?></td>
										</tr>
										<tr>
											<td class="bold"><?php echo __('Address')?>:</td>
											<td><?= $supplier->address; ?></td>
											 <td class="bold"><?php echo __('Location')?>:</td>
											<td><?= $supplier->location; ?></td>
										</tr>
										
									</table>
							</div>
							
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="suppliers">
									<h5><?php echo __('Remark')?></h5><div class="divider10"></div>
									<div class="content">
										<textarea cols="33" rows="7"><?= $supplier->note; ?></textarea>
									</div>
								</div>
							</div>
							<div class="clearfix divider10"> </div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								
								<!-- Modal -->
								<?php echo $this->element('suppliers/index_edit',['supplier'=> $supplier]);?>
								<?php echo $this->Form->postLink(__('<i class="fa fa-trash"></i> Delete'),['action' => 'delete', $supplier->id],['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id),'class' => 'btn btn-danger btn-addon m-b-sm waves-effect waves-button waves-red', 'escape' => false])?>
							</div>
						</div>
					</div>
				
				</div>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
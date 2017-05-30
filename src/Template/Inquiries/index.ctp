
<div class="row">
	<div class="col-md-3 col-sm-4 col-xs-12 ">
		<div class="sidebar-shop sidebar-left ">
			<?php echo $this->element('font-end/Pages/menu_account_info') ?>
		</div>
	</div>
	<div class="col-md-9 col-sm-8 col-xs-12 wapper-content">
	<?php echo $this->Html->link('<i class="fa fa-plus"></i>',['controller' => 'inquiries','action'=>'add'],['class' => 'btn btn-success float-right','escape' => false]) ?>
	
	<div class="clearfix"></div>
		<div class="main-content-shop ">
			<div class="shop-tab-title">
			<!--  <h3><?php echo __('Orders') ?></h3> -->
			</div>
			<div class="main-content-shop ">

				<table id="datatable" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="text-center"><?php echo __('Ref') ?></th>
							<th class="text-center"><?php echo __('Vessel') ?></th>
							<th class="text-center"><?php echo __('Our Ref') ?></th>
							<th class="text-center"><?php echo __('Status') ?></th>
							<th class="text-center"><?php echo __('Created') ?></th>
							<th class="text-center"><?php echo __('Action') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($inquiries as  $inquiry): ?>
							
						<tr>
							<td class="text-center"><?= $this->Html->link('#'.$inquiry->id,['controller'=>'Inquiries','action' => 'InquiriesView', $inquiry->id],['escape' => false]) ?></td>
							
							<td class="text-center"><?= $inquiry->vessel?></td>
							<td class="text-center"><?= $inquiry->ref?></td>
							<td class="text-center"><?= $inquiry->status?></td>
							<td class="text-center"><?= date_format($inquiry->created, 'Y-m-d H:i:s'); ?></td>
							<td class="text-center">
								<?= $this->Form->postLink('<i class="fa fa-trash" aria-hidden="true"></i>', ['controller' => 'Inquiries', 'action' => 'delete', $inquiry->id], ['class'=>'btn btn-danger','escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $inquiry->id)]) ?> 
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- End Main Content Shop -->
	</div>
</div>


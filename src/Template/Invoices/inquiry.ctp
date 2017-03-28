<div class="row">
	<div class="col-md-3 col-sm-4 col-xs-12 ">
		<div class="sidebar-shop sidebar-left ">
			<?php echo $this->element('font-end/Pages/menu_account_info') ?>
		</div>
	</div>
	<div class="col-md-9 col-sm-8 col-xs-12 wapper-content">
		<div class="main-content-shop ">
			<div class="shop-tab-title">
			<!--  <h3><?php echo __('Orders') ?></h3> -->
			</div>
			<div class="main-content-shop ">

				<table id="datatable" class="display" cellspacing="0" width="100%">
					<thead>
					    <tr>
							<th class="text-center"><?php echo __('Code') ?></th>
							<th class="text-center"><?php echo __('Note') ?></th>
							<th class="text-center"><?php echo __('Created') ?></th>
							<th class="text-center"><?php echo __('Action') ?></th>
					    </tr>
					</thead>
					<tbody>
						<?php foreach ($inquiry as $key => $inq): ?>
						<?php if ($inq->invoice_products != NULL): ?>
						<tr>
							<td class="text-center">#<?= $inq->id; ?></td>
							<td class="text-center"></td>
							<td class="text-center"><?= date_format($inq->created, 'Y-m-d H:i:s'); ?></td>
							<td class="text-center">
							<?= $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i>',['controller'=>'Invoices','action' => 'inqDetails', $inq->id],['class'=>'btn btn-success','escape' => false]) ?>
							<!--  <?= $this->Form->postLink('<i class="fa fa-trash" aria-hidden="true"></i>', ['controller' => 'Invoices', 'action' => 'delete', $inq->id], ['class'=>'btn btn-danger','escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $inq->id)]) ?> -->
							</td>
						</tr>
						<?php endif ?>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- End Main Content Shop -->
	</div>
</div>


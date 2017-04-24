
<div class="row">
	<div class="panel panel-white" id="inquiry_id" val="<?php echo $inqSuppliers[0]['inquiry_id'] ?>">
		<div class="panel-heading clearfix">
			
				<?php echo __('Suppliers Quotation '); ?>
			
		</div> <!-- panel-heading -->
		<div class="panel-body"> 
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th class="text-center" scope="col"><?= $this->Paginator->sort(__('#')) ?></th>
							<th class="text-center" scope="col"><?= $this->Paginator->sort('Suppliers') ?></th>
							<th class="text-center" scope="col"><?= $this->Paginator->sort('Date') ?></th>
							<th class="text-center" scope="col"></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($inqSuppliers as $supplier): ?>
							<tr class="cursor-pointer inquiry-suppliers" id="<?= $supplier->id; ?>">
								<td class="text-center"><a href="#"><?= '#'.$supplier->id; ?></a ></td>
								<td class="text-center"><?= $supplier->supplier['name']; ?></td>
								<td class="text-center"><?= h(date("Y-m-d", strtotime($supplier->created))) ?></td>
								<td class="text-center">
									<!-- <?= $this->Form->postLink(__('Delete'), ['controller'=>'inquiries','action'=>'delete',$supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?> -->
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div> 	
		</div> <!-- panel-body -->
	</div><!-- panel panel-white -->

	<div class="panel panel-white supplier-quotation-details hidden"></div> <!-- panel panel-white -->
 
</div>


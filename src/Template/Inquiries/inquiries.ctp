
<div class="row">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php echo __('Inquiries'); ?>
			</div> <!-- col-lg-8 -->
		</div> <!-- panel-heading -->
		<div class="panel-body">
			<div class="">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="text-center" scope="col"><?= $this->Paginator->sort(__('#')) ?></th>
								<th class="text-center" scope="col"><?= $this->Paginator->sort('Customer') ?></th>
								<th class="text-center" scope="col"><?= $this->Paginator->sort('Status') ?></th>
								<th class="text-center" scope="col"><?= $this->Paginator->sort('Date') ?></th>
								<th class="text-center" scope="col"></th>
							</tr>
						</thead>
					
						<tbody class="inquiries-details">
							<?php foreach ($inquiries as $inquiry): ?>
								<tr>
									<td class="text-center"><b><?= $this->Html->link(__('#'.$inquiry->id), ['controller'=>'inquiries','action'=>'InquiriesDetails',$inquiry->id], ['escape' => false,'class' => '']); ?></b></td>
									<td class="text-center"><?= $inquiry->user['username']; ?></td>
									<td class="text-center"><?php echo $inquiry->status ?></td>
									<td class="text-center"><?= h(date("Y-m-d", strtotime($inquiry->created))) ?></td>
									
									<td class="text-center">
										<!--   <?= $this->Html->link(__('Details'), ['controller'=>'inquiries','action'=>'InqDetails',$inquiry->id], ['escape' => false,'class' => '']); ?>  -->
										<?= $this->Form->postLink(__('Delete'), ['controller'=>'inquiries','action'=>'delete',$inquiry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inquiry->id)]) ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div><!-- col-lg-4 -->
		</div> <!-- panel-body -->
		
	</div><!-- col-lg-12 -->
</div> <!-- row -->

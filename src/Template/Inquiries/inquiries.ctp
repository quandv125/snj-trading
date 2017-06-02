
<div class="row">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?= __('Inquiries'); ?>
			</div> <!-- col-lg-8 -->
		</div> <!-- panel-heading -->
		<div class="panel-body">
			<div class="">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="text-center" scope="col"><?= $this->Paginator->sort(__('Our Ref')) ?></th>
								<th class="text-center" scope="col"><?= $this->Paginator->sort('Customer') ?></th>
								<th class="text-center" scope="col"><?= $this->Paginator->sort('Vessel') ?></th>
								<th class="text-center" scope="col"><?= $this->Paginator->sort('CusRef') ?></th>
								<th class="text-center" scope="col"><?= $this->Paginator->sort('Supps') ?></th>
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
									<td class="text-center"><?= $inquiry->vessel; ?></td>
									<td class="text-center"><?= $inquiry->ref; ?></td>
									<td class="text-center"><?= $this->Myhtml->CountSupps($inquiry) ?> </td>
									<td class="text-center"><?= $inquiry->status ?></td>
									<td class="text-center"><?= h(date("Y/m/d", strtotime($inquiry->created))) ?></td>
									<td class="text-center">
										<?= $this->Form->postLink(__('<span class="btn btn-primary"><i class="fa fa-trash"></i></span>'), ['controller'=>'inquiries','action'=>'delete',$inquiry->id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $inquiry->id)]) ?>
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

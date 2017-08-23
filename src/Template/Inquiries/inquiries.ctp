
<div class="row">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="fe-search-inq">
				<span><?= __('Search'); ?></span>
				<span class="float-right cursor-pointer"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
			</div> <!-- col-lg-8 -->
		</div> <!-- panel-heading -->
		<div class="panel-body display-none" id="fe-search-inq-info">
			<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
				<!-- <form class="form-horizontal"> -->
				<?= $this->Form->create(null); ?>
					<div class="form-group form-group-sm">
						<div class="col-sm-2">
							<!-- <label class=" control-label" for="sm">Ref No</label>
							<input class="form-control" type="text" placeholder="Ref No" > -->
							<?= $this->Form->input('ref',['class'=>'ref', "placeholder"=>"Ref No" ]) ?>
						</div>
						<div class="col-sm-3">
							<!-- <label class="control-label" for="sm">Vessel</label> -->
							<!-- <input class="form-control" type="text" placeholder="Vessel Name" > -->
							<?= $this->Form->input('vessel',['class'=>'Vessel', "placeholder"=>"Vessel Name" ]) ?>
						</div>
						<div class="col-sm-3">
							<!-- <label class="control-label" for="sm">IMO No</label> -->
							<!-- <input class="form-control" type="text" placeholder="IMO No" > -->
							<?= $this->Form->input('imo',['class'=>'imo', "placeholder"=>"Imo No" ]) ?>
						</div>
						<div class="col-sm-2">
							<!-- <label class="control-label" for="sm">Hull No</label> -->
							<!-- <input class="form-control" type="text" placeholder="HULL No" > -->
							<?= $this->Form->input('hull_mo',['class'=>'hull_mo', "placeholder"=>"Hull No" ]) ?>
						</div>
						<div class="col-sm-2">
							<label class="control-label" for="sm">Status</label>
							<select class="form-control">
								<option  selected value="">--Select an option--</option>
								<option value="true">Actived</option>
								<option value="false">Deactived</option>
							</select>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group form-group-sm">
						<div class="col-sm-2">
						<?php if (isset($start) && !empty($start)): ?>
							<input class="form-control" type="date" name='start' value="<?php echo $start ?>" placeholder="Start"/>
						<?php else: ?>
							<input class="form-control" type="date" name='start' value="<?php echo date('Y-m-01') ?>" placeholder="Start"/>
						<?php endif ?>
							
						</div>
						<div class="col-sm-2">
							
						<?php if (isset($end) && !empty($end)): ?>
							<input class="form-control" type="date" name='end' value="<?php echo $end ?>" placeholder="End"/>
						<?php else: ?>
							<input class="form-control" type="date" name='end' id="lastDay" value="<?php echo date('Y-m-d') ?>" placeholder="End">
						<?php endif ?>
						</div><div class="clearfix"></div>
					</div>

					<button type="submit" class="btn btn-primary">Search</button>
				<!-- </form> -->
				<?= $this->Form->end(); ?>
			<!-- </div> -->
		</div> <!-- panel-body -->
	</div><!-- panel panel-white -->

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
								<th class="text-center" scope="col"><?= $this->Paginator->sort(__('Customer'))?></th>
								<th class="text-center1" scope="col"><?= $this->Paginator->sort(__('Ref'))?></th>
								<th class="text-center1" scope="col"><?= $this->Paginator->sort(__('Vessel'))?></th>
								<th class="text-center" scope="col"><?= $this->Paginator->sort(__('IMO NO'))?></th>
								<th class="text-center" scope="col"><?= $this->Paginator->sort(__('HULL No'))?></th>
								<th class="text-center" scope="col"><?= $this->Paginator->sort(__('Supps'))?></th>
								<th class="text-center" scope="col"><?= $this->Paginator->sort(__('Status'))?></th>
								<th class="text-center" scope="col"><?= $this->Paginator->sort(__('Date'))?></th>
								<th class="text-center" scope="col"></th>
							</tr>
						</thead>
						<tbody class="inquiries-details">
							<?php foreach ($inquiries as $inquiry): ?>
								<tr>
									<td class="text-center"><b><?= $this->Html->link(__('#'.$inquiry->id), ['controller'=>'inquiries','action'=>'InquiriesDetails',$inquiry->id], ['escape' => false,'class' => '']); ?></b></td>
									<td class="text-center"><?= $inquiry->user['username']; ?></td>
									<td class="text-center1"><?= $inquiry->ref; ?></td>
									<td class="text-center1"><?= $inquiry->vessel; ?></td>
									<td class="text-center"><?= $inquiry->imo_no; ?></td>
									<td class="text-center"><?= $inquiry->hull_no; ?></td>
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

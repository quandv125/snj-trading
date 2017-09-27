
<div class="row">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="fe-search-inq">
				<span><?= __('Search'); ?></span>
				<span class="float-right cursor-pointer"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
			</div> <!-- col-lg-8 -->
		</div> <!-- panel-heading -->
		<div class="panel-body display-none" id="fe-search-inq-info">
				<?= $this->Form->create(null); ?>
					<div class="form-group form-group-sm">
						<div class="col-sm-2">
							<?= $this->Form->input('ref',['class'=>'ref', "placeholder"=>"Ref No" ]) ?>
						</div>
						<div class="col-sm-3">
							<?= $this->Form->input('vessel',['class'=>'Vessel', "placeholder"=>"Vessel Name" ]) ?>
						</div>
						<div class="col-sm-3">
							<?= $this->Form->input('imo',['class'=>'imo', "placeholder"=>"Imo No" ]) ?>
						</div>
						<div class="col-sm-2">
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
								<th scope="col"><?= $this->Paginator->sort('#') ?></th>
								<th scope="col"><?= $this->Paginator->sort('firstname') ?></th>
								<th scope="col"><?= $this->Paginator->sort('lastname') ?></th>
								<th scope="col"><?= $this->Paginator->sort('email') ?></th>
								<th scope="col"><?= $this->Paginator->sort('Total') ?></th>
								<th scope="col"><?= $this->Paginator->sort('Status') ?></th>
								<th scope="col"><?= $this->Paginator->sort('created') ?></th>
								<th scope="col" class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
						<tbody class="inquiries-details">
							<?php foreach ($orders as $key => $order): ?>
								<tr>
								   	<td><?= $key+1 ?></td>
									<td><?= h($order->firstname) ?></td>
									<td><?= h($order->lastname) ?></td>
									<td><?= h($order->email) ?></td>
									<td><?= number_format($order->order_products[0]['total'], DECIMALS); ?> 원</td>
									<td><?= h('status') ?></td>
									<td><?= h($order->created) ?></td>
									<td class="actions">
										<?= $this->Html->link(__('View'), ['action' => 'view', $order->id]) ?>
										<?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id]) ?>
										<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
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

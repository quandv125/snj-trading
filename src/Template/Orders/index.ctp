
<div class="row">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="fe-search-inq">
				<span><?= __('Search'); ?></span>
				<span class="float-right cursor-pointer"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
			</div> <!-- col-lg-8 -->
		</div> <!-- panel-heading -->
		<div class="panel-body display-none" id="fe-search-inq-info">
				<?= $this->Form->create(null,['horizontal' => false]); ?>
					<div class="form-group form-group-sm">
						<div class="col-sm-2">
							<?= $this->Form->input('id',[ "placeholder"=>"Order Number", 'label' => 'Order Number']) ?>
						</div>
						<div class="col-sm-2">
							<?= $this->Form->input('firstname',[ "placeholder"=>"Firstname", 'label' => 'Firstname']) ?>
						</div>
						<div class="col-sm-2">
							<?= $this->Form->input('lastname',[ "placeholder"=>"Lastname", 'label' => 'Lastname']) ?>
						</div>
						<div class="col-sm-2">
							<?= $this->Form->input('status',['class'=>'imo', "placeholder"=>"Status", 'label' => 'Status']) ?>
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
					<button type="submit" class="btn btn-primary margin-left15">Search</button>
				<!-- </form> -->
				<?= $this->Form->end(); ?>
			<!-- </div> -->
		</div> <!-- panel-body -->
	</div><!-- panel panel-white -->
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?= __('Orders'); ?>
			</div> <!-- col-lg-8 -->
		</div> <!-- panel-heading -->
		<div class="panel-body">
			<div class="">
				<div class="table-responsive" style="min-height: 500px;">
					<table class="table table-striped" >
						<thead>
							<tr>
								<th class="text-center" scope="col"><?= $this->Paginator->sort('#') ?></th>
								<th scope="col"><?= $this->Paginator->sort('firstname') ?></th>
								<th scope="col"><?= $this->Paginator->sort('lastname') ?></th>
								<th scope="col"><?= $this->Paginator->sort('email') ?></th>
								<th class="text-center width10" scope="col"><?= $this->Paginator->sort('Total') ?></th>
								<th class="text-center" scope="col"><?= $this->Paginator->sort('Status') ?></th>
								<th class="text-center width15" scope="col"><?= $this->Paginator->sort('created') ?></th>
								<th scope="col" class="actions text-center"><?php echo __('Actions') ?></th>
							</tr>
						</thead>
						<tbody class="inquiries-details">
							<?php foreach ($orders as $key => $order): ?>
								<tr>
									<td class="text-center"><?= $this->Html->link('#'.__($order->id), ['action' => 'order_summary', $order->id]) ?></td>
									<td><?= h($order->firstname) ?></td>
									<td><?= h($order->lastname) ?></td>
									<td><?= h($order->email) ?></td>
									<td class="text-center"><?= number_format($order->total, DECIMALS); ?> 원</td>
									<td class="text-center"><?= $this->Myhtml->OrderStatus($order->status); ?></td>
									<td class="text-center"><?= h($order->created) ?></td>
									<td class="actions text-center">
										<div class="dropdown">
											<button class="dropbtn"><i class="fa fa-bars" aria-hidden="true"></i></button>
											<div class="dropdown-content">
												<?= $this->Html->link(__('<i class="fa fa-search-plus" aria-hidden="true"></i> View'), ['action' => 'view', $order->id],['escape' => false]) ?>
												<?= $this->Html->link(__('<i class="fa fa-pencil" aria-hidden="true"></i> Edit'), ['action' => 'order_summary', $order->id],['escape' => false]) ?>
												<?= $this->Form->postLink(__('<i class="fa fa-trash" aria-hidden="true"></i>  Delete'), ['action' => 'delete', $order->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
											</div>
										</div>
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


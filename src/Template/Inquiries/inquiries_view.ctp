<div class="timeline-horizontal-wap text-center">
	<ul class="timeline timeline-horizontal">
		<li class="timeline-item">
			<div class="timeline-badge <?= ($inquiries->status >= 1)?"success":"default"?>" data-toggle="tooltip" title="Step 1" data-placement="bottom"><i class="fa fa-pencil"></i></div>
		</li>
		<li class="timeline-item">
			<div class="timeline-badge <?= ($inquiries->status >= 2)?"success":"default"?>" data-toggle="tooltip" title="Step 2" data-placement="bottom"><i class="glyphicon glyphicon-check"></i></div>
		</li>
		<li class="timeline-item">
			<div class="timeline-badge <?= ($inquiries->status >= 3)?"success":"default"?>" data-toggle="tooltip" title="Step 3" data-placement="bottom"><i class="glyphicon glyphicon-check"></i></div>
		</li>
		<li class="timeline-item">
			<div class="timeline-badge <?= ($inquiries->status >= 4)?"success":"default"?>" data-toggle="tooltip" title="Step 4" data-placement="bottom"><i class="glyphicon glyphicon-check"></i></div>
		</li>
		<li class="timeline-item">
			<div class="timeline-badge <?= ($inquiries->status >= 5)?"success":"default"?>" data-toggle="tooltip" title="Step 5" data-placement="bottom"><i class="glyphicon glyphicon-check"></i></div>
		</li>
	</ul>
</div>

<div class="col-md-12 item-unavailable1" id="<?= h($inquiries->id) ?>">
	<div>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Infomation</a></li>
			<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Cost & Price</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content tab-customer">
			<div role="tabpanel" class="tab-pane active" id="home">
				<?= $this->Form->create(NULL, ['id' => 'inquiries-info']); ?>
					<?= $this->Form->input('id',['class'=>'hidden','label' => false,"value"=> ($inquiries->id)]) ?>
					<div class="col-md-4">
						<?= $this->Form->input('vessel',['class'=>'vessel',"value"=> ($inquiries->vessel)]) ?>
					</div>
					<div class="col-md-4">
						<?= $this->Form->input('imo_no',['class'=>'imo_no',"value"=> ($inquiries->imo_no)]) ?>
					</div>
					<div class="col-md-4">
						<?= $this->Form->input('hull_no',['class'=>'hull_no',"value"=> ($inquiries->hull_no)]) ?>
					</div>
					<div class="col-md-4">
						<?= $this->Form->input('ref',['class'=>'ref',"value"=> ($inquiries->ref)]) ?>
					</div>
					<div class="col-md-4">
						<?= $this->Form->input('date',['class'=>'date','id'=>'datepicker1','disabled','value' => date("Y-m-d") ]) ?>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-4">
					<?= $this->Form->input('description',['type'=>'textarea','label'=>'Remark','value' => $inquiries->description]) ?>
					</div>
					<div class="col-md-4">
						<div class="form-group text">
						<label class="control-label" for="ref">File</label><div class="clearfix"></div>
						<?= $this->Form->input('file.',["type"=>"file",'class'=>'ref','multiple','label'=>false]) ?>
							<?php if (isset($inquiries->attachments)): ?>
							<table class="table file-attachments">
								<?php foreach ($inquiries->attachments as $key => $attachment): ?>
								<tr id="attachments-<?= $attachment->id;?>">
									<td><?php echo $this->Html->link(basename($attachment->path),['controller'=>'inquiries','action'=>'download',$attachment->id]) ?></td>
									<td><span class="cursor-point remove-file-att" id="<?= $attachment->id;?>">X</span></td>
								</tr>
								<?php endforeach ?>
							</table>							
							<?php endif ?>
						</div>
					</div>
					<div class="clearfix"></div>
					<?= $this->Form->button("Update",['class'=>'btn btn-success float-right']) ?>
					<?= $this->Form->end(); ?>
					<div class="clearfix"></div>
			</div>
			<div role="tabpanel" class="tab-pane" id="profile">
				<div class="col-md-4">
					<label class="control-label" for="ref">Total</label><div class="clearfix"></div>
					<div class="col-md-12 input-group group-indicator">
						<div class="input number">
							<input disabled value="<?= $total?>" id="total-price" class="form-control">
						</div>
						<span class="input-group-addon group-addon-width">USD</span>
					</div>
				</div>

				<div class="col-md-4">
					<label class="control-label" for="ref">Discount(<?= $inquiries->discount.'%';?>)</label><div class="clearfix"></div>
					<div class="col-md-12 input-group group-indicator">
						<div class="input number">
							<input disabled value="<?= $discount = ($total*$inquiries->discount)/100;?>" id="discount-price" class="form-control">
						</div>
						<span class="input-group-addon group-addon-width">USD</span>
					</div>
				</div>

				<div class="col-md-4">
					<?php $cost = 0; ?>
					<?php if (!empty($inquiries->extras)): ?>
					<label class="control-label" for="ref">Extras Cost</label><div class="clearfix"></div>
					<div class="col-md-12 input-group group-indicator">
						<table class="table">
							<tbody>
							<?php foreach ($inquiries->extras as $key => $extra): ?>
								<?php $cost = $cost+$extra->cost; ?>
								<tr>
									<td><?php echo $extra->name ?></td>
									<td><?php echo '$'.$extra->cost ?></td>
								</tr>
							<?php endforeach ?>
							</tbody>
						</table>
					</div>

					<?php endif ?>
				</div>

				<div class="col-md-4">
					<label class="control-label" for="ref">Grand Total</label><div class="clearfix"></div>
					<div class="col-md-12 input-group group-indicator">
						<div class="input number">
							<input disabled value="<?= $total-$discount+$cost;?>" id="total-price" class="form-control">
						</div>
						<span class="input-group-addon group-addon-width">USD</span>
					</div>
					
				</div>
				<div class="clearfix"></div>
				<br/><br/><br/>
			</div>
		</div>

	</div>

	<div class="clearfix"></div>
	<br>
	
	<div id="grid" inquiry_id="<?= $inquiries->id?>" data-type="<?= $inquiries->type?>" data-room='<?php echo($data);?>'></div>
	
</div>
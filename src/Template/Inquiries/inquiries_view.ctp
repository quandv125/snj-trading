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

<div class="col-md-12 item-unavailable" id="<?= h($inquiries->id) ?>">
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
		<label class="control-label" for="ref">Total</label><div class="clearfix"></div>
		<div class="col-md-6 input-group group-indicator">
			<div class="input number">
				<input disabled value="<?= $total?>" id="total-price" class="form-control">
			</div>
			<span class="input-group-addon group-addon-width">USD</span>
		</div>
		<label class="control-label" for="ref">Discount(<?= $inquiries->discount.'%';?>)</label><div class="clearfix"></div>
		<div class="col-md-6 input-group group-indicator">
			<div class="input number">
				<input disabled value="<?= ($total*$inquiries->discount)/100;?>" id="discount-price" class="form-control">
			</div>
			<span class="input-group-addon group-addon-width">USD</span>
		</div>
	</div>

	<div class="col-md-4">
	<?= $this->Form->input('description',['type'=>'textarea','label'=>'Remark','value' =>$inquiries->description]) ?>
	</div>
	<div class="col-md-4">
		<div class="form-group text">
		<label class="control-label" for="ref">File</label><div class="clearfix"></div>
		<?= $this->Form->input('file.',["type"=>"file",'class'=>'ref','multiple','label'=>false]) ?>

			<?php if (isset($inquiries->attachments)): ?>
				<div class="file-attachments">
				<?php foreach ($inquiries->attachments as $key => $attachment): ?>
					<?php echo $this->Html->link(basename($attachment->path),['controller'=>'inquiries','action'=>'download',$attachment->id]) ?><br>
				<?php endforeach ?>
				</div>
			<?php endif ?>
		</div>
	</div>
	
	<div class="clearfix"></div>
	<?= $this->Form->button("Update",['class'=>'btn btn-success float-right']) ?>
	<?= $this->Form->end(); ?>
	<div class="clearfix"></div>
	<br>
	
	<div id="grid" type="<?php echo $inquiries->type;?>" data-room='<?php echo($data);?>'></div>
	
</div>
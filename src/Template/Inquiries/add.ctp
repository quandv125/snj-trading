
<div class="row">
	<button name="save" class="btn btn-success float-right" id="save"><i class="fa fa-paper-plane"></i> Send</button>
	<div class="clearfix"></div>
	<div class="col-md-12 item-unavailable" id="AddNewIqr" inqid="">
	<?= $this->Form->create(null, ['id' => 'InqSuppsInfo']); ?>
		<div class="col-md-4">
			<?= $this->Form->input('vessel',['class'=>'vessel','label'=>__("Vessel Name")]) ?>
		</div>
		<div class="col-md-4">
			<?= $this->Form->input('imo_no',['class'=>'imo_no','label'=>__("IMO No")]) ?>
		</div>
		<div class="col-md-4">
			<?= $this->Form->input('hull_no',['class'=>'hull_no','label'=> __("Hull No")]) ?>
		</div>
		<div class="col-md-4">
			<?= $this->Form->input('date',['class'=>'date','id'=>'datepicker','label'=>__("Date"),'value' => date("Y-m-d") ]) ?>
		</div>
		<div class="col-md-4">
			<?= $this->Form->input('ref',['class'=>'ref','label'=>__("Ref")]) ?>
		</div>
		<div class="col-md-4">
			<?= $this->Form->input('file.',["type"=>"file",'class'=>'ref','multiple','label'=>__("Attachment File")]) ?>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-4">
			<?= $this->Form->input('description',['type'=>'textarea','label'=>__("Remark")]) ?>
		</div>
		<div class="col-md-4">
			<?= $this->Form->input('subject',['placeholder' => "Spare Part"]) ?>
			<?= $this->Form->input('status',['value' => 1, 'class' => 'hidden','label' => false]) ?>
			<?= $this->Form->input('type',['value' => UNAVAILABLE, 'class' => 'hidden','label' => false]) ?>
		</div>
		<?= $this->Form->end(); ?>
		<div class="clearfix"></div><br>
		<div id="exampleAdd"></div>
	</div>
</div>


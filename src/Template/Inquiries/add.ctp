
<div class="row">
	<button name="save" class="btn btn-success float-right" id="save"><i class="fa fa-paper-plane"></i> Send</button>
	<div class="col-md-12 item-unavailable" id="AddNewIqr" inqid="">
	<?= $this->Form->create(null, ['id' => 'InqSuppsInfo']); ?>
		<div class="col-md-4">
			<label><?php echo __("Vessel Name"); ?></label>
			<div class="clearfix"></div>
			<!-- <?php //$data = ['Alabama'=>'Alabama','Wyoming'=>'Wyoming']; ?>
			<?php //echo $this->Form->input('vessel',['class'=>'js-example-tags','multiple','label'=>false,'options'=> $data]) ?> -->
			<?= $this->Form->input('vessel',['class'=>'vessel','label'=>false]) ?>
		</div>
		<div class="col-md-4">
			<label><?php echo __("IMO No"); ?></label>
			<?= $this->Form->input('imo_no',['class'=>'imo_no','label'=>false]) ?>
		</div>
		<div class="col-md-4">
			
			<label><?php echo __("Hull No"); ?></label>
			<?= $this->Form->input('hull_no',['class'=>'hull_no','label'=>false]) ?>
		</div>
		<div class="col-md-4">
			<label><?php echo __("Date"); ?></label>
			<?= $this->Form->input('date',['class'=>'date','id'=>'datepicker','label'=>false,'value' => date("Y-m-d") ]) ?>
		</div>
		<div class="col-md-4">
			<label><?php echo __("Ref"); ?></label>
			<?= $this->Form->input('ref',['class'=>'ref','label'=>false]) ?>
		</div>
		<div class="col-md-4">
			<label><?php echo __("Attachment File"); ?></label>
			<?= $this->Form->input('file.',["type"=>"file",'class'=>'ref','multiple','label'=>false]) ?>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-4">
			<label><?php echo __("Remark"); ?></label>
			<?= $this->Form->input('description',['type'=>'textarea','label'=>false]) ?>
		</div>
		<?= $this->Form->end(); ?>
		<div class="clearfix"></div><br>
		<div id="exampleAdd"></div>
	</div>
</div>

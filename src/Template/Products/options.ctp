	<div class="panel panel-white" id="order_id">
		<div class="panel-body">
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs nav-justified" role="tablist">
					<li role="presentation" class="active">
						<a href="#tab1" class="bold" role="tab" data-toggle="tab"><?php echo __("Options Groups") ?></a>
					</li>
					<li role="presentation">
						<a href="#tab2" class="bold" role="tab" data-toggle="tab"><?php echo __("Options Attributes"); ?></a>
					</li>
					
				</ul>
				<!-- Tab panes -->
				<div class="tab-content tab-content-order" id="tab-content">

					<div role="tabpanel" class="tab-pane  active fade in" id="tab1">
						<div class="panel-heading-order ">
							<h4 class="order_summary"><?= __('Options Groups'); ?></h4>
						</div>
						
						<div class="table-responsive col-lg-9">
							
							<table class="table table-striped ">
								<thead>
									<tr>
										<th class="width1">#</th>
										<th><?php echo __("Name");?></th>
										<th><?php echo __("Description");?></th>
										<th class="width20"><?php echo __("Created");?></th>
										<th class="width1"><?php echo __("&nbsp;");?></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($options as $key => $option): ?>
										<tr>
											<td><?php echo $key+1; ?></td>
											<td><?php echo $option->name; ?></td>
											<td><?php echo $option->description; ?></td>
											<td><?php echo $option->created; ?></td>
											<td><span class="btn btn-info trash-att" id="<?= $option->id;?>"><i class=" fa fa-trash"></i></span></td>
										</tr>
									<?php endforeach ?>
									
								</tbody>
							</table>
							
						</div>
						
						<fieldset class="col-sm-9">
							<legend><?php echo __("Add New Group"); ?></legend>
							<div class="order_status billing-address">
								<?php
									echo $this->Form->create(NULL,['url'=>['controller'=>'Products','action'=>'options'],'horizontal' => true]);
									echo $this->Form->input('name');
									echo $this->Form->input('descriptions');
									echo $this->Form->button('Submit',array('class' => 'btn btn-success'));
									echo $this->Form->end();
								?>
							</div>
						</fieldset>
						
						<div class="clearfix"></div>
					</div>

					<div role="tabpanel" class="tab-pane fade" id="tab2">
						<div class="panel-heading-order ">
							<h4 class="order_summary"><?= __('Options Attributes'); ?></h4>
						</div>
						<div class="col-sm-2">
							<?php echo $this->Form->create(NULL,['url'=>['controller'=>'Products','action'=>'options'],'horizontal' => true,"onsubmit"=>"return checkatt()"]);?>
							<?php echo $this->Form->input('name',['class'=>'form-control hidden','label'=>false ,'id' => 'chil-att']);?>
							<select name="parent_id" id="slt-parent-id" class="form-control">
								<?php foreach ($options as $key => $option): ?>
									<option value="<?php echo __($option->id) ?>"><?php echo __($option->name) ?></option>
								<?php endforeach ?>
							</select>
							<div class="clearfix"></div>
						
						</div>
							<div class="clearfix divider15"></div>
						
						<fieldset class="col-sm-5">
							<legend>Attributes</legend>
							<div class="order_status attribute-list billing-address">
								<?php foreach ($options as $key => $option): ?>
									<div class="parent-att parent-<?= $option->id;?> <?= $key == 0 ?'':'hidden' ?>">
										<?php foreach ($option->children as $key => $children): ?>
											<div class="attribute">
												<span class="col-sm-6"><?= $children->name; ?></span>
												<span class="col-sm-6"><i class="trash-att fa fa-trash" id="<?= $children->id; ?>"></i></span>
											</div>
										<?php endforeach ?>
									</div>
								<?php endforeach ?>
								
							</div>
						</fieldset>

						<div class="clearfix divider15"></div>
						
						<fieldset class="col-sm-5">
							<legend><?php echo __("Add New attribute"); ?></legend>
							<div class="order_status billing-address">
								<div class="input-group m-b-sm">
									<input type="text" class="form-control" id="ipt-att">
									<span class="input-group-btn">
										<button class="btn btn-default" id="btn-att" type="button"><i class="fa fa-plus"></i></button>
									</span>
								</div>
							</div>
						</fieldset>

						<div class="clearfix divider15"></div>
							<?php echo $this->Form->button('Submit',array('class' => 'btn btn-success'));?>
							<?php echo $this->Form->end();?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	function checkatt () {
		var id = $('select#slt-parent-id').val();
		var chil_name = '';
		jQuery.each(jQuery('.parent-'+id+' .attribute .chil-name'), function() {
			chil_name +=  jQuery(this).html()+'----';
		});
		jQuery('#chil-att').val(chil_name);
	}
</script>
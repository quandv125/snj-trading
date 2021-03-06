<span class="btn btn-success btn-addon m-b-sm waves-effect waves-button waves-red float-right margin-bottom10" data-toggle="modal" data-target="#myModal">
	<i class="fa fa-plus"></i>Add
</span>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg ">
		<div class="modal-content">
			<div class="modal-header" style="margin-bottom: 0em;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Product</h4>
			</div>
			<div class="modal-body">
				<div class="panel-body">
					<div role="tabpanel">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<li role="presentation" class="active">
								<a href="#tab1" role="tab" data-toggle="tab"><?php echo __("General") ?></a>
							</li>
							<li role="presentation">
								<a href="#tab2" role="tab" data-toggle="tab"><?php echo __("Infomations"); ?></a>
							</li>
							<li role="presentation">
								<a href="#tab3" role="tab" data-toggle="tab"><?php echo __("Descriptions"); ?></a>
							</li>
							<li role="presentation">
								<a href="#tab5" role="tab" data-toggle="tab"><?php echo __("Options"); ?></a>
							</li>
							<li role="presentation">
								<a href="#tab4" role="tab" data-toggle="tab"><?php echo __("Image") ?></a>
							</li>
						</ul>
						<!-- Tab panes -->
						<?php echo $this->Form->create('add',['url'=>['action'=>'add'],'enctype'=>'multipart/form-data', "onSubmit"=>"return myFunctionName()"]);?>
						<div class="tab-content add-new-products">
							<div role="tabpanel" class="tab-pane active fade in" id="tab1">
								<div class="col-lg-6 col-md-6">
									<?php echo $this->Form->input('sku',['class'=>'sku','placeholder' => 'Product Code','label' => 'Product Code']); ?>
									<?php echo $this->Form->input('product_name',['class' => 'product_name','placeholder' => 'Products Name']); ?>
									<?php echo $this->Form->input('retail_price',['class' => 'currency','placeholder' => '원']); ?>
									<?php echo $this->Form->input('supply_price',['class'=>'currency','label'=>"Supplier's Price",'placeholder' => '원']); ?>
									<?php echo $this->Form->input('vat',['type'=>'checkbox','label' => 'VAT (10%)']); ?>
								</div>
								<div class="col-lg-6 col-md-6">
									<?php echo $this->Form->input('quantity',['class'=>'auto quantity','placeholder' => 'Quantity']); ?>
									<?php echo $this->Form->input('conditions',[ 'type' => 'select', 'options' => PRODUCT_CONDITION]); ?>
									<?php echo $this->Form->input('categorie_id', ['label'=>'Categories', 
										'class' => 'categorie_id js-states selectpicker', "data-live-search"=>"true", 'id' => 'PCategorie_Id',
										'append' => [
											$this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModal2'])]
									]);	?>
									<?php echo $this->Form->input('supplier_id',['class' => 'categorie_id js-states selectpicker', "data-live-search"=>"true",'label' => __('Manufacturer / Brand'),'id' => 'PSupplier_Id',
											'append' => [
											$this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModalSupplier'])]
									]); ?>
									<?php echo $this->Form->input('actived',['type'=>'checkbox','label' => 'Active']); ?>
								</div>
							</div>
							
							<div role="tabpanel" class="tab-pane fade" id="tab2">
								<div class="col-lg-4 col-md-4">
									<?php echo $this->Form->input('release_date',['type'=>'text','placeholder' => 'Release date','class'=>'date-picker','value'=> date("Y-m-d") ]); ?>
									<?php echo $this->Form->input('size',['class'=>'size','placeholder' => 'Size']); ?>
									
									<?php echo $this->Form->input('brand',['class'=>'brand','placeholder' => 'Brand']); ?>
								</div>
								<div class="col-lg-4 col-md-4">
									<?php echo $this->Form->input('weight',['class' => 'Weight','placeholder' => 'Weight']); ?>
									<?php echo $this->Form->input('color',['class' => 'Color','placeholder' => 'Color']); ?>
									<?php echo $this->Form->input('meterial',['class'=>'Material','placeholder'=>'Material']); ?>
									
								</div>
								<div class="col-lg-4 col-md-4">
									<?php echo $this->Form->input('manufacturer',['class'=>'Manufacturer','placeholder'=>'Manufacturer']); ?>
									<?php echo $this->Form->input('composition',['class' => 'Composition','placeholder' => 'Composition']); ?>
									<?php echo $this->Form->input('origin',['class' => 'origin','placeholder' => 'Origin']); ?>
								</div>
								<div class="clearfix"></div>
								<?php echo $this->Form->input('properties',['class' => 'hidden','label'=>false,'id'=>"result"]); ?>
								
								<span class="btn btn-success btn-trash-image waves-effect waves-button waves-red" id="add-mtd-prd"><i class="fa fa-plus"></i></span><div class="clearfix"></div><br>
								<div class="menthod-product col-lg-10">
									<div class="mth-prd">
										<span class="col-md-6"><input type="text" placeholder="Label" name="" class="label123 form-control"></span>
										<span class="col-md-5"><input type="text" placeholder="Value" name="" class="value123 form-control"></span>
										<span class="col-md-1 remove-jtfd"><i class="fa fa-trash-o margin-top10"></i></span>
									</div>
								</div>
							</div>

							<div role="tabpanel" class="tab-pane fade" id="tab3">
								<div class="col-lg-12 col-md-6">
									<label class="control-label" for="Short_Description">Short Description</label>
									<?php echo $this->Form->textarea('short_description',['class'=>'ckeditor']);?>
								</div>
								<div class="col-lg-12 col-md-6">
									<label class="control-label" for="Description">Description</label>
									<?php echo $this->Form->textarea('description',['class'=>'ckeditor']);?>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab5">
								<h4 class="order_summary"><?= __('Products Options'); ?></h4>
								<div class="table-responsive col-lg-12">
									<table class="table table-striped ">
										<thead>
											<tr>
												<th class="width15"><?php echo __("Status");?></th>
												<th><?php echo __("Name");?></th>
												<th class="width20"><?php echo __("Default");?></th>
												<th class="width1"><?php echo __("&nbsp;");?></th>
											</tr>
										</thead>
										<tbody id="tbody-options">
										</tbody>
										<tfoot>
											<tr>
												<td><span><?php echo __("Add New"); ?></span></td>
												<td>
													<select id="slt-options" class="form-control">
														<option value="NULL">-- Please Select --</option>
														<?php foreach ($options as $key => $option): ?>
															<optgroup label="<?php echo __($option->name) ?>">
																<?php foreach ($option->children as $key => $children): ?>
																	<option parent_id="<?php echo __($option->id) ?>" parent_name="<?php echo __($option->name) ?>" value="<?php echo __($children->id) ?>"><?php echo __($children->name) ?></option>
																<?php endforeach ?>
															</optgroup>
														<?php endforeach ?>
													</select>
												</td>
												<td colspan="2">
													<?php echo $this->Html->link('<i class="fa fa-plus"></i>',['controller' => 'Products', 'action' => 'options'],['escape'=>false,'class'=>'btn btn-info btn-options']) ?>
												</td>
											</tr>
										</tfoot>
									</table>
									<?php echo $this->Form->input('product_options',['class'=>'hidden','label'=>false,'id'=>"ipt_options"]); ?>
								</div>
							</div>
							
							<div role="tabpanel" class="tab-pane fade" id="tab4">
								<?php echo $this->Form->input('files.',[ 'type'=>'file', 'id' => 'ProductFile', 'multiple',
									'append' => [
										$this->Html->tag('span', '<i class="fa fa-trash"></i>', array('class' => 'btn btn-success btn-trash-image waves-effect waves-button waves-red'))]]); 
								?>
								<output id="listProductFile"></output>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- modal-body -->
			<div class="modal-footer">
				<?php echo $this->Form->button('Submit',array('class' => 'btn btn-success')); ?>
				<!--  <?php echo $this->Html->tag('span','Reset', array('id' => 'ProductResetForm','class' => 'btn btn-success m-b-sm btn-addon waves-effect waves-button waves-red'));?> -->
				<?php echo $this->Form->end(); ?>
			</div>

		</div>
	</div>
</div>  <!-- End Modal -->
<script type="text/javascript">
	function myFunctionName() {
		var options = new Array();
		jQuery.each(jQuery('.tr_options_1'), function(i, v) {
			var parent_id 	= jQuery(this).attr('parant_id');
			var parent_name = jQuery(this).attr('parant_name');
			var child_id 	= jQuery(this).attr('chil_id');
			var child_name 	= jQuery(this).attr('chil_name');
			options.push({'parent_id':parent_id,'parent_name':parent_name,'child_id':child_id, 'child_name': child_name });
		});
		jQuery("#ipt_options").val(JSON.stringify(options));
		var array		= new Array();
		jQuery.each(jQuery('.mth-prd'), function(i, v) {
			if (jQuery(this).find('.label123').val() != '') {
				var label123	= jQuery(this).find('.label123').val();
				var value123	= jQuery(this).find('.value123').val();
				array.push({'label':label123,'value':value123});
			}
		});
		jQuery("#result").val(JSON.stringify(array)); 
		return true;
	}
</script>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm modal-center">
		<div class="modal-content" style=" margin-top: 100px; ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php echo __("Add Category") ?></h4>
			</div>
			<div class="modal-body">
				<?php echo $this->Form->input('name',['id' => 'category-name']);?> 
				<?php echo $this->Form->input('parent_id',['id' =>'category-parent','options'=>$categories,'empty' => '-- No parent --']);?>
			</div>
			
			<div class="modal-footer">
				<button class="btn btn-success float-right" id="btn-add-categories">Submit</button>
			</div>
		</div>
	</div>
</div><!-- End -->

<div class="modal fade" id="myModalOutlet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm modal-center">
		<div class="modal-content" style=" margin-top: 100px; ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php echo __("Add Outlet") ?></h4>
			</div>
			<div class="modal-body">
				<?php echo $this->Form->input('name*',['id' => 'outlet-name']);?> 
				<?php echo $this->Form->input('tel',['id' => 'outlet-tel']);?> 
				<?php echo $this->Form->input('address',['id' => 'outlet-address']);?> 
			</div>
			<div class="modal-footer">
				<button class="btn btn-success float-right" id="btn-add-outlet">Submit</button>
			</div>
		</div>
	</div>
</div>  <!-- End -->
<!--  -->
<div class="modal fade" id="myModalSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm modal-center">
		<div class="modal-content" style=" margin-top: 100px; ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php echo __("Add Manufacturer / Brand") ?></h4>
			</div>
			<div class="modal-body">
				<?php echo $this->Form->input('code',['id' => 'supplier-code']);?> 
				<?php echo $this->Form->input('name',['id' => 'supplier-name']);?> 
			</div>
			<div class="modal-footer">
				<button class="btn btn-success float-right" id="btn-add-supplier">Submit</button>
			</div>
		</div>
	</div>
</div>  <!-- End -->
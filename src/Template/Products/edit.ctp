<div class="panel panel-white">
	<div class="panel-body">
		<div role="tabpanel">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li role="presentation" class="active">
					<a href="#tab11" class="bold" role="tab" data-toggle="tab"><?php echo __("Products") ?></a>
				</li>
				<li role="presentation">
					<a href="#tab22" class="bold" role="tab" data-toggle="tab"><?php echo __("Infomations"); ?></a>
				</li>
				<li role="presentation">
					<a href="#tab33" class="bold" role="tab" data-toggle="tab"><?php echo __("Descriptions"); ?></a>
				</li>
				<li role="presentation">
					<a href="#tab44" class="bold" role="tab" data-toggle="tab"><?php echo __("Options") ?></a>
				</li>
				<li role="presentation">
					<a href="#tab55" class="bold" role="tab" data-toggle="tab"><?php echo __("Images") ?></a>
				</li>
			</ul>
			<!-- Tab panes -->
				<?= $this->Form->create(NULL,['url'=>['action'=>'edit',$product->id],'enctype'=>'multipart/form-data','horizontal' => true, "onSubmit"=>"return iptformat($product->id)"]);?>
					<div class="tab-content tab-content-order" id="tab-content">
						<div role="tabpanel" class="tab-pane  active fade in" id="tab11">
							<fieldset class="col-sm-8 order_status">
								<legend><?= __('Products'); ?></legend>
								<div class="divider10"></div>
								<div class="col-lg-6 col-md-6 ">
									<?= $this->Form->input('sku',['value' => $product->sku,'placeholder' => 'Product Code','label' => 'Product Code']); ?>
									<?= $this->Form->input('product_name',['value' => $product->product_name,'placeholder' => 'Name']); ?>
									<?= $this->Form->input('retail_price',['placeholder'=>'USD','value'=>number_format($product->retail_price,0,'.',',')]); ?>
									<?= $this->Form->input('supply_price',['label' => "Supplier's Price",'placeholder' => 'USD','value '=>number_format($product->supply_price, 2, '.', ',')]); ?>
									<?= $this->Form->input('vat',['label'=>'VAT(10%)','type'=>'checkbox','checked'=>$product->vat?"checked":""])?>
								</div>
								<div class="col-lg-6 col-md-6 ">
									<?= $this->Form->input('quantity',['class'=>'auto','placeholder' => 'Quantity','value'=>$product->quantity]); ?>
									<?= $this->Form->input('conditions',['type'=>'select','options'=>PRODUCT_CONDITION,'default'=>$product->conditions]); ?>
									<?= $this->Form->input('categorie_id', [
										'label'=>__('Category'), 'class' => 'categorie_id js-states selectpicker', "data-live-search"=>"true", 'value' => $product->categorie_id, 'id' => 'PCategorie_Id', 'append' => [
											$this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModalEC'.$product->id])]
										]);
									?>
									<?= $this->Form->input('supplier_id',[
										'class' => 'supplier_id selectpicker', "data-live-search"=>"true", 'value' => $product->supplier_id, 'id' => 'PSupplier_Id', 'append' => [
											$this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModalES'.$product->id])]]); ?>
									<?= $this->Form->input('actived',['type'=>'checkbox','checked'=>$product->actived?"checked":""]); ?>
								</div>
							</fieldset>
							<div class="clearfix"></div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab22">
							<fieldset class="col-sm-8 order_status">
								<legend><?= __('Infomations'); ?></legend>
								<div class="divider10"></div>
								<div class="col-lg-4 col-md-4">
									<?= $this->Form->input('release_date',['type'=>'text','placeholder' => 'Release date','class'=>'date-picker','value'=> date("Y-m-d", strtotime($product->release_date)) ]); ?>
									<?= $this->Form->input('size',['class'=>'size','placeholder' => 'Size','value'=>$product->size]); ?>
									<?= $this->Form->input('brand',['class'=>'brand','placeholder' => 'Brand','value'=>$product->brand]); ?>
								</div>
								<div class="col-lg-4 col-md-4">
									<?= $this->Form->input('weight',['class' => 'Weight','placeholder' => 'Weight','value'=>$product->weight]); ?>
									<?= $this->Form->input('color',['class' => 'Color','placeholder' => 'Color','value'=>$product->color]); ?>
									<?= $this->Form->input('meterial',['class' => 'Material','placeholder' => 'Material','value'=>$product->meterial]); ?>
								</div>
								<div class="col-lg-4 col-md-4">
									<?= $this->Form->input('manufacturer',['class'=>'Manufacturer','placeholder'=>'Manufacturer','value'=>$product->manufacturer]); ?>
									<?= $this->Form->input('composition',['class' => 'Composition','placeholder' => 'Composition','value'=>$product->composition]); ?>
									 <?= $this->Form->input('origin',['class' =>'origin','placeholder'=>'Origin','value'=>$product->origin]); ?>
								</div>
								<div class="clearfix"></div>
								<?= $this->Form->input('properties',['class' =>'result_'.$product->id.' hidden', 'label' => false]); ?>
								<div class="col-sm-1">
									<span class="btn btn-success btn-trash-image waves-effect waves-button waves-red margin-left15" onclick="aiptf(<?= $product->id;?>)"><i class="fa fa-plus"></i></span><div class="clearfix"></div>
								</div>
								<div class="menthod-product menthod-product-<?php echo $product->id;?> col-sm-11">
									<?php if (isset($product->properties) && !empty($product->properties)): ?>
										<?php foreach (json_decode($product->properties) as $key => $propertie): ?>
											<div class="mth-prd">
												<span class="col-md-6"><input type="text" placeholder="Label" value="<?php echo $propertie->label ?>" class="label123 form-control"></span>
												<span class="col-md-5"><input type="text" placeholder="Value" value="<?php echo $propertie->value ?>" class="value123 form-control"></span>
												<span class="col-md-1 remove-jtfd"><i class="fa fa-trash-o margin-top10"></i></span>
											</div>
										<?php endforeach ?>
									<?php endif ?>
									<div class="mth-prd">
										<span class="col-md-6"><input type="text" placeholder="Label" name="" class="label123 form-control"></span>
										<span class="col-md-5"><input type="text" placeholder="Value" name="" class="value123 form-control"></span>
										<span class="col-md-1 remove-jtfd"><i class="fa fa-trash-o margin-top10"></i></span>
									</div>
								</div>
							</fieldset>
							<div class="clearfix"></div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab33">
							<fieldset class="col-sm-8 order_status">
								<legend><?= __('Descriptions'); ?></legend>
								<div class="divider10"></div>
								<div class="col-lg-12 col-md-6">
									<label class="control-label" for="Short_Description">Short Description</label>
									<?= $this->Form->textarea('short_description',['value' => $product->short_description,'class'=>'ckeditor']);?>
								</div>
								<div class="col-lg-12 col-md-6">
									<label class="control-label" for="Description">Description</label>
									<?= $this->Form->textarea('description',['value' => $product->description,'class'=>'ckeditor']);?>
								</div>
							</fieldset>
							<div class="clearfix"></div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab44">
							<fieldset class="col-sm-8 order_status">
								<legend><?= __('Products Options'); ?></legend>
								<div class="divider10"></div>
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
												<?php if (!empty($product->p_option)): ?>
													<?php foreach (json_decode($product->p_option) as $key => $P_options): ?>
														<?php foreach ($P_options as $key1 => $value): ?>
															<tr>
																<td><input type="checkbox"></td>
																<td>
																	<span class="tr_options_1" parant_id="1" parant_name="<?php echo $key ?>" chil_name="<?php echo $value ?>" chil_id="<?php echo $key1; ?>">
																		<b><?php echo $key ?></b>: <?php echo $value ?>
																	</span>
																</td>
																<td>None</td>
																<td><span class="trash-option"><i class="fa fa-trash"></i></span></td>
															</tr>
														<?php endforeach ?>
													<?php endforeach ?>
												<?php endif ?>
											</tbody>	
											<tfoot>
												<tr>
													<td><span><?php echo __("Add New"); ?></span></td>
													<td>
														<select id="slt-options" class="form-control">
															<option value="NULL">-- <?php echo __("Please Select") ?> --</option>
															<?php foreach ($options as $key => $option): ?>
																<optgroup label="<?php echo __($option->name) ?>">
																	<?php foreach ($option->children as $key => $children): ?>
																		<option parent_id="<?php echo __($option->id) ?>" parent_name="<?php echo __($option->name) ?>" value="<?php echo __($children->id) ?>"><?php echo __($children->name) ?></option>
																	<?php endforeach ?>
																</optgroup>
															<?php endforeach ?>
														</select>
													</td>
													<td colspan="2"><span class="btn btn-info btn-options"><i class="fa fa-plus"></i></span></td>
												</tr>
											</tfoot>
										</table>
										<?= $this->Form->input('product_options',['class'=>'hidden','label'=>false,'id'=>"ipt_options"]); ?>
									</div>
							</fieldset>
							<div class="clearfix"></div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab55">
							<fieldset class="col-sm-8 order_status">
								<legend><?= __('Images'); ?></legend>
								<div class="divider10"></div>
								<div class="col-sm-8">
									<?= $this->Form->input('files'.$product->id.'.',[ 'type'=>'file',  'multiple',
										// 'append' => [
										// 	$this->Html->tag('span', '<i class="fa fa-trash"></i>', array('class' => 'btn btn-success btn-trash-image waves-effect waves-button waves-red'))]
										]); 
									?>
									<output id="list"></output>
									<?php if (isset($product->images) && !empty($product->images)): ?>
										<?php foreach ($product->images as $key => $image):?>
											<div class="show-image show-image-<?= $image->id?>">
												<?= $this->Html->image($image->thumbnail,['class'=>'image-border','width'=>100, 'height'=> 100]) ?>
												<span class="btn btn-success star" id="<?= $image->id?>"><i class="fa fa-star" aria-hidden="true"></i> </span>
												<span class="btn btn-danger delete deletePI" id="<?= $image->id?>"><i class="fa fa-trash-o" aria-hidden="true"></i> </span>
											</div>
										<?php endforeach; ?>
									<?php endif ?>
								</div>
							</fieldset>
							<div class="clearfix"></div>
						</div>
						<div class="clearfix divider10"></div>
						<?= $this->Form->button('Submit',['class' => 'btn btn-success ']);?>
						<div class="clearfix"></div>
					</div>
				<?= $this->Form->end(); ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	function aiptf(id) {
		jQuery(".menthod-product-"+id).append('<div class="mth-prd"><span class="col-md-6"><input type="text" placeholder="Label" name="" class="label123 form-control"></span> <span class="col-md-5"><input type="text" placeholder="Value" name="" class="value123 form-control"></span><span class="col-md-1 remove-jtfd"><i class="fa fa-trash-o margin-top10"></i></span></div><br/>');
		jQuery('.remove-jtfd').click(function(){
			jQuery(this).parent().remove();
		});
	}
	function iptformat(id) {
		jQuery(".result_"+id).val('');
		var array       = new Array();
		jQuery.each(jQuery('.menthod-product-'+id+' .mth-prd'), function(i, v) {
			var label123    = jQuery(this).find('.label123').val();
			var value123    = jQuery(this).find('.value123').val();
			if (label123 != '' && value123 != '') {
				array.push({'label':label123,'value':value123});
			}
		});
		jQuery(".result_"+id).val(JSON.stringify(array));

		var options = new Array();
		jQuery.each(jQuery('.tr_options_1'), function(i, v) {
			var parent_id = jQuery(this).attr('parant_id');
			var parent_name = jQuery(this).attr('parant_name');
			var child_id = jQuery(this).attr('chil_id');
			var child_name = jQuery(this).attr('chil_name');
			options.push({'parent_id':parent_id,'parent_name':parent_name,'child_id':child_id, 'child_name': child_name });
		});
		jQuery("#ipt_options").val(JSON.stringify(options));
		return true;
	}
	jQuery('.remove-jtfd').click(function(){
		jQuery(this).parent().remove();
	});
</script>
<div class="modal fade" id="myModalEC<?= $product->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm modal-center">
		<div class="modal-content" style=" margin-top: 100px; ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php echo __("Add Category") ?></h4>
			</div>
			<div class="modal-body">
				<?= $this->Form->input('name',['id' => 'category-name']);?> 
				<?= $this->Form->input('parent_id',['id' =>'category-parent','options'=>$categories,'empty' => '-- No parent --']);?>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success float-right" id="btn-add-categories">Submit</button>
			</div>
		</div>
	</div>
</div>  <!-- End -->

<div class="modal fade" id="myModalEO<?= $product->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm modal-center">
		<div class="modal-content" style=" margin-top: 100px; ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php echo __("Add Outlet") ?></h4>
			</div>
			<div class="modal-body">
				<?= $this->Form->input('name*',['id' => 'outlet-name']);?> 
				<?= $this->Form->input('tel',['id' => 'outlet-tel']);?> 
				<?= $this->Form->input('address',['id' => 'outlet-address']);?> 
			</div>
			<div class="modal-footer">
				<button class="btn btn-success float-right" id="btn-add-outlet">Submit</button>
			</div>
		</div>
	</div>
</div>  
<!-- End -->
<div class="modal fade" id="myModalES<?= $product->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm modal-center">
		<div class="modal-content" style=" margin-top: 100px; ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php echo __("Add Supplier") ?></h4>
			</div>
			<div class="modal-body">
				<?= $this->Form->input('code',['id' => 'supplier-code']);?> 
				<?= $this->Form->input('name',['id' => 'supplier-name']);?> 
			</div>
			<div class="modal-footer">
				<button class="btn btn-success float-right" id="btn-add-supplier">Submit</button>
			</div>
		</div>
	</div>
</div>  <!-- End -->
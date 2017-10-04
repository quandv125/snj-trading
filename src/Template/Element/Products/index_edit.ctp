
<div class="modal fade" id="ProductEdit<?= $product->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg ">
		<div class="modal-content">
			<?= $this->Form->create(NULL,['url'=>['action'=>'edit',$product->id],'enctype'=>'multipart/form-data', "onSubmit"=>"return iptformat($product->id)"]);?>
			<div class="modal-header" style="margin-bottom: 0em;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Product</h4>
			</div>
			<div class="modal-body row">
				<div class="panel-body">
					<div role="tabpanel">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<li role="presentation" class="active">
								<a href="#tabs1<?= $product->id;?>" role="tab" data-toggle="tab"><?php echo __("General") ?></a>
							</li>
							<li role="presentation">
								<a href="#tabs2<?= $product->id;?>" role="tab" data-toggle="tab"><?php echo __("Infomations") ?></a>
							</li>
							<li role="presentation">
								<a href="#tabs3<?= $product->id;?>" role="tab" data-toggle="tab"><?php echo __("Descriptions"); ?></a>
							</li>
							<li role="presentation">
								<a href="#tabs4<?= $product->id;?>" role="tab" data-toggle="tab"><?php echo __("Image") ?></a>
							</li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active fade in" id="tabs1<?= $product->id;?>">
								<div class="col-lg-6 col-md-6">
									<?= $this->Form->input('sku',['class'=>'sku','value' => $product->sku,'placeholder' => 'Product Code','label' => 'SKU/Part No']); ?>
									<?= $this->Form->input('product_name',['class' => 'product_name','value' => $product->product_name,'placeholder' => 'Name']); ?>
									<?= $this->Form->input('supplier_id',[
										'class' => 'supplier_id', 'label' => __('Manufacturer / Brand'),
										'value' => $product->supplier_id,
										'id' => 'PSupplier_Id',
										'append' => [
											$this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModalES'.$product->id])]]); ?>
									<?= $this->Form->input('retail_price',['class' => 'currency','placeholder' => 'USD','value'=>number_format($product->retail_price, 2, '.', ',')]); ?>
									
									<?= $this->Form->input('vat',['label'=>'VAT(10%)','type'=>'checkbox','checked'=>$product->vat?"checked":""])?>
								</div>
								<div class="col-lg-6 col-md-6">
									<?= $this->Form->input('quantity',['class'=>'auto','placeholder' => 'Quantity','value'=>$product->quantity]); ?>
									<?= $this->Form->input('unit',['class' => 'unit','placeholder' => 'Unit','value'=>$product->unit]); ?>
									<?= $this->Form->input('categorie_id', [
										'label'=>__('Category'), 
										'class' => 'categorie_id js-states', 
										'value' => $product->categorie_id,
										'id' => 'PCategorie_Id',
										'append' => [
											$this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModalEC'.$product->id])]
										]);
									?>
									<?= $this->Form->input('supply_price',['class' => 'currency','label' => "Supplier's Price",'placeholder' => 'USD','value'=>number_format($product->supply_price, 2, '.', ',')]); ?>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tabs2<?= $product->id;?>">
								<div class="col-lg-4 col-md-4">
									<?= $this->Form->input('release_date',['type'=>'text','placeholder' => 'Release date','class'=>'date-picker','value'=> date("Y-m-d", strtotime($product->release_date)) ]); ?>
									<?= $this->Form->input('size',['class'=>'size','placeholder' => 'Size','value'=>$product->size]); ?>
									<?= $this->Form->input('status',['class' => 'status','placeholder' => 'Status','value'=>$product->status]); ?>
									<?= $this->Form->input('brand',['class'=>'brand','placeholder' => 'Brand','value'=>$product->brand]); ?>
								</div>
								<div class="col-lg-4 col-md-4">
									<?= $this->Form->input('weight',['class' => 'Weight','placeholder' => 'Weight','value'=>$product->weight]); ?>
									<?= $this->Form->input('color',['class' => 'Color','placeholder' => 'Color','value'=>$product->color]); ?>
									<?= $this->Form->input('meterial',['class' => 'Material','placeholder' => 'Material','value'=>$product->meterial]); ?>
									<?= $this->Form->input('origin',['class' => 'origin','placeholder' => 'Origin','value'=>$product->origin]); ?>									
								</div>
								<div class="col-lg-4 col-md-4">
									<?= $this->Form->input('manufacturer',['class'=>'Manufacturer','placeholder'=>'Manufacturer','value'=>$product->manufacturer]); ?>
									<?= $this->Form->input('composition',['class' => 'Composition','placeholder' => 'Composition','value'=>$product->composition]); ?>
								</div>
								<div class="clearfix"></div>
								<?= $this->Form->input('properties',['class' =>'result_'.$product->id.' hidden', 'label' => false]); ?>
								
								<div class="menthod-product menthod-product-<?php echo $product->id;?> col-lg-10">
									<span class="btn btn-success btn-trash-image waves-effect waves-button waves-red" onclick="aiptf(<?= $product->id;?>)"><i class="fa fa-plus"></i></span><div class="clearfix"></div><br>
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
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tabs3<?= $product->id;?>">
							   	<div class="col-lg-12 col-md-6">
									<label class="control-label" for="Short_Description">Short Description</label>
									<?= $this->Form->textarea('short_description',['value' => $product->short_description,'class'=>'ckeditor']);?>
								</div>
								<div class="col-lg-12 col-md-6">
									<label class="control-label" for="Description">Description</label>
									<?= $this->Form->textarea('description',['value' => $product->description,'class'=>'ckeditor']);?>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tabs4<?= $product->id;?>">
								<?= $this->Form->input('files'.$product->id.'.',[ 'type'=>'file',  'multiple',
									'append' => [
										$this->Html->tag('span', '<i class="fa fa-trash"></i>', array('class' => 'btn btn-success btn-trash-image waves-effect waves-button waves-red'))]]); 
								?>
								<output id="list"></output>
							  
								<?php foreach ($product->images as $key => $image):?>
									<div class="show-image show-image-<?= $image->id?>">
										<?= $this->Html->image($image->thumbnail,['class'=>'image-border','width'=>100, 'height'=> 100]) ?>
										<span class="btn btn-success star" id="<?= $image->id?>"><i class="fa fa-star" aria-hidden="true"></i> </span>
										<span class="btn btn-danger delete deletePI" id="<?= $image->id?>"><i class="fa fa-trash-o" aria-hidden="true"></i> </span>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- modal-body -->
			<div class="modal-footer">
				<?= $this->Form->button('Submit',array('class' => 'btn btn-success waves-effect waves-button waves-red')); ?>
				<!-- <?= $this->Html->tag('span','Reset', array('id' => 'ProductResetForm','class' => 'btn btn-success m-b-sm btn-addon waves-effect waves-button waves-red'));?> -->
				<?= $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>  <!-- End Modal -->
<script type="text/javascript">
	function aiptf(id) {
		jQuery(".menthod-product-"+id).append('<div class="mth-prd"><span class="col-md-6"><input type="text" placeholder="Label" name="" class="label123 form-control"></span>	<span class="col-md-5"><input type="text" placeholder="Value" name="" class="value123 form-control"></span><span class="col-md-1 remove-jtfd"><i class="fa fa-trash-o margin-top10"></i></span></div><br/>');
		jQuery('.remove-jtfd').click(function(){
			jQuery(this).parent().remove();
		});
	}
	function iptformat(id) {
		jQuery(".result_"+id).val('');
		var array		= new Array();
		jQuery.each(jQuery('.menthod-product-'+id+' .mth-prd'), function(i, v) {
			var label123	= jQuery(this).find('.label123').val();
			var value123	= jQuery(this).find('.value123').val();
			if (label123 != '' && value123 != '') {
				array.push({'label':label123,'value':value123});
			}
		});
		jQuery(".result_"+id).val(JSON.stringify(array));
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
</div>  <!-- End -->
<!--  -->
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
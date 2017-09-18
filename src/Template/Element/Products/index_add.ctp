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
			<div class="modal-body row">
				<div class="panel-body">
					<div role="tabpanel">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<li role="presentation" class="active">
								<a href="#tab1" role="tab" data-toggle="tab"><?php echo __("Products") ?></a>
							</li>
							<li role="presentation">
								<a href="#tab2" role="tab" data-toggle="tab"><?php echo __("Infomations"); ?></a>
							</li>
							<li role="presentation">
								<a href="#tab3" role="tab" data-toggle="tab"><?php echo __("Descriptions"); ?></a>
							</li>
							<li role="presentation">
								<a href="#tab4" role="tab" data-toggle="tab"><?php echo __("Image") ?></a>
							</li>
						</ul>
						<!-- Tab panes -->
						<?php echo $this->Form->create('add',['url'=>['action'=>'add'],'enctype'=>'multipart/form-data', "onSubmit"=>"return myFunctionName()"]);?>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active fade in" id="tab1">
								<div class="col-lg-6 col-md-6">
									<?= $this->Form->input('sku',['class'=>'sku','placeholder' => 'SKU/Item Number','label' => 'SKU/Item Number']); ?>
									<?= $this->Form->input('product_name',['class' => 'product_name','placeholder' => 'Name']); ?>
									<?= $this->Form->input('supplier_id',['class' => 'supplier_id','id' => 'PSupplier_Id','append' => [
											$this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModalSupplier'])]]); ?>

									<?= $this->Form->input('retail_price',['class' => 'currency','placeholder' => 'USD']); ?>
									<?= $this->Form->input('vat',['type'=>'checkbox','label' => 'VAT (10%)']); ?>
								</div>
								<div class="col-lg-6 col-md-6">
									<?= $this->Form->input('quantity',['class'=>'auto quantity','placeholder' => 'Quantity']); ?>
									<?= $this->Form->input('unit',['class' => 'unit','placeholder' => 'Unit']); ?>
									<?= $this->Form->input('categorie_id', ['label'=>__('Category'), 
										'class' => 'categorie_id js-states', 
										'id' => 'PCategorie_Id',
										'append' => [
											$this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModal2'])]
										]);
									?>
									<?= $this->Form->input('supply_price',['class' => 'currency','label' => "Supplier's Price",'placeholder' => 'USD']); ?>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab2">
								<div class="col-lg-4 col-md-4">
									<?= $this->Form->input('release_date',['type'=>'text','placeholder' => 'Release date','class'=>'date-picker','value'=> date("Y-m-d") ]); ?>
									<?= $this->Form->input('size',['class'=>'size','placeholder' => 'Size']); ?>
									<?= $this->Form->input('status',['class' => 'status','placeholder' => 'Status']); ?>
									<?= $this->Form->input('brand',['class'=>'brand','placeholder' => 'Brand']); ?>
								</div>
								<div class="col-lg-4 col-md-4">
									<?= $this->Form->input('weight',['class' => 'Weight','placeholder' => 'Weight']); ?>
									<?= $this->Form->input('color',['class' => 'Color','placeholder' => 'Color']); ?>
									<?= $this->Form->input('meterial',['class' => 'Material','placeholder' => 'Material']); ?>
									<?= $this->Form->input('origin',['class' => 'origin','placeholder' => 'Origin']); ?>
								</div>
								<div class="col-lg-4 col-md-4">
									<?= $this->Form->input('manufacturer',['class'=>'Manufacturer','placeholder'=>'Manufacturer']); ?>
									<?= $this->Form->input('composition',['class' => 'Composition','placeholder' => 'Composition']); ?>
								</div>
								<div class="clearfix"></div>
								<?= $this->Form->input('properties',['class' => 'hidden','label'=>false,'id'=>"result"]); ?>
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
									<?= $this->Form->textarea('short_description',['class'=>'summernote']);?>
								</div>
								<div class="col-lg-12 col-md-6">
									<label class="control-label" for="Description">Description</label>
									<?= $this->Form->textarea('description',['class'=>'summernote']);?>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab4">
								<?= $this->Form->input('files.',[ 'type'=>'file', 'id' => 'ProductFile', 'multiple',
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
				<?= $this->Form->button('Submit',array('class' => 'btn btn-success')); ?>
				<!--  <?= $this->Html->tag('span','Reset', array('id' => 'ProductResetForm','class' => 'btn btn-success m-b-sm btn-addon waves-effect waves-button waves-red'));?> -->
				<?php echo $this->Form->end(); ?>
			</div>

		</div>
	</div>
</div>  <!-- End Modal -->
<script type="text/javascript">
	function myFunctionName() {
		
			var array		= new Array();
			jQuery.each(jQuery('.mth-prd'), function(i, v) {
				var label123	= jQuery(this).find('.label123').val();
				var value123	= jQuery(this).find('.value123').val();
				array.push({'label':label123,'value':value123});
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
				<?= $this->Form->input('name',['id' => 'category-name']);?> 
				<?= $this->Form->input('parent_id',['id' =>'category-parent','options'=>$categories,'empty' => '-- No parent --']);?>
			</div>
			
			<div class="modal-footer">
				<button class="btn btn-success float-right" id="btn-add-categories">Submit</button>
			</div>
		</div>
	</div>
</div>  <!-- End -->

<div class="modal fade" id="myModalOutlet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
<div class="modal fade" id="myModalSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
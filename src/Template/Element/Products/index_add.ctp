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
                                <a href="#tab1" role="tab" data-toggle="tab"><?php echo __("Infomations") ?></a>
                            </li>
                            <li role="presentation">
                                <a href="#tab2" role="tab" data-toggle="tab"><?php echo __("Descriptions"); ?></a>
                            </li>
                            <li role="presentation">
                                <a href="#tab3" role="tab" data-toggle="tab"><?php echo __("Image") ?></a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <?php echo $this->Form->create('add',['url'=>['action'=>'add'],'enctype'=>'multipart/form-data']);?>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active fade in" id="tab1">
                                <div class="col-lg-6 col-md-6">
                                    <?= $this->Form->input('sku',['class'=>'sku','placeholder' => 'SKU/Part No','label' => 'SKU/Part No']); ?>
                                    <?= $this->Form->input('product_name',['class' => 'product_name','placeholder' => 'Name']); ?>
                                    <?= $this->Form->input('categorie_id', ['label'=>__('Category'), 
                                        'class' => 'categorie_id js-states', 
                                        'id' => 'PCategorie_Id',
                                        'append' => [
                                            $this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModal2'])]
                                        ]);
                                    ?>
                                   <!--  <?= $this->Form->input('outlet_id',['class' => 'outlet_id','id' => 'POutlet_Id','append' => [
                                            $this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModalOutlet'])]]); ?> -->
                                    <?= $this->Form->input('supplier_id',['class' => 'supplier_id','id' => 'PSupplier_Id','append' => [
                                            $this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModalSupplier'])]]); ?>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label class="control-label" for="Status">Status</label>
                                    <?= $this->Form->select('status',[1 => 'InStock', 2 => 'Order', 3 => 'OutStock']); ?>
                                    <div class="divider15"></div>
                                    <?= $this->Form->input('retail_price',['class' => 'auto retail_price','placeholder' => 'USD']); ?>
                                    <?= $this->Form->input('quantity',['class'=>'auto quantity','placeholder' => 'Quantity']); ?>
                                    <?= $this->Form->input('origin',['class' => 'origin','placeholder' => 'Origin']); ?>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab2">
                                <div class="col-lg-6 col-md-6">
                                    <?= $this->Form->input('stock_min',array('class' => 'stock_min','value' => '1')); ?>
                                    <?= $this->Form->input('stock_level',array('class' => 'stock_level','value' => '1')); ?>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <?= $this->Form->input('stock_max',array('class'=>'stock_max')); ?>
                                    <?= $this->Form->input('unit',array('class' => 'unit')); ?>    
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <label class="control-label" for="Short_Description">Short Description</label>
                                    <?= $this->Form->textarea('short_description',['class'=>'summernote']);?>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <label class="control-label" for="Description">Description</label>
                                    <?= $this->Form->textarea('description',['class'=>'summernote']);?>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab3">
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
                <?= $this->Html->tag('span','Reset', array('id' => 'ProductResetForm','class' => 'btn btn-success m-b-sm btn-addon waves-effect waves-button waves-red'));?>
                <?= $this->Form->end(); ?>
            </div>

        </div>
    </div>
</div>  <!-- End Modal -->

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
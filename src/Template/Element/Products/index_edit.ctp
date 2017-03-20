
<div class="modal fade" id="ProductEdit<?= $product->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <?= $this->Form->create(NULL,['url'=>['action'=>'edit',$product->id],'enctype'=>'multipart/form-data']);?>
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
                                <a href="#tabep1<?= $product->id;?>" role="tab" data-toggle="tab"><?php echo __("Infomations") ?></a>
                            </li>
                            <li role="presentation">
                                <a href="#tabep2<?= $product->id;?>" role="tab" data-toggle="tab"><?php echo __("Descriptions"); ?></a>
                            </li>
                            <li role="presentation">
                                <a href="#tabep3<?= $product->id;?>" role="tab" data-toggle="tab"><?php echo __("Image") ?></a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active fade in" id="tabep1<?= $product->id;?>">
                                <div class="col-lg-6 col-md-6">

                                    <?= $this->Form->input('sku',['class'=>'sku','value' => $product->sku,'placeholder' => 'SKU/Part No','label' => 'SKU/Part No']); ?>
                                    <?= $this->Form->input('product_name',['class' => 'product_name','value' => $product->product_name,'placeholder' => 'Name']); ?>
                                    <?= $this->Form->input('retail_price',['class' => 'auto','placeholder' => 'USD','value'=>$product->retail_price]); ?>
                                    <?= $this->Form->input('categorie_id', [
                                        'label'=>__('Category'), 
                                        'class' => 'categorie_id js-states', 
                                        'value' => $product->categorie_id,
                                        'id' => 'PCategorie_Id',
                                        'append' => [
                                            $this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModalEC'.$product->id])]
                                        ]);
                                    ?>
                                  
                                    <?= $this->Form->input('supplier_id',[
                                        'class' => 'supplier_id',
                                        'value' => $product->supplier_id,
                                        'id' => 'PSupplier_Id',
                                        'append' => [
                                            $this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModalES'.$product->id])]]); ?>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <?= $this->Form->input('serial_no',['class' => 'serial_no','placeholder'=>'Serial No','value'=>$product->serial_no]); ?>
                                    <?= $this->Form->input('type_model',['placeholder'=>'Type Model','value'=>$product->type_model]); ?>
                                    <?= $this->Form->input('quantity',['class'=>'auto','placeholder' => 'Quantity','value'=>$product->quantity]); ?>
                                    <?= $this->Form->input('origin',['class' => 'origin','placeholder' => 'Origin','value'=>$product->origin]); ?>
                                    <?= $this->Form->input('unit',array('class' => 'unit','placeholder' => 'Unit','value'=>$product->unit)); ?>    
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <label class="control-label" for="Short_Description">Short Description</label>
                                    <?= $this->Form->textarea('short_description',['value' => $product->short_description,'id'=>'editor1']);?>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tabep2<?= $product->id;?>">
                               
                                <div class="col-lg-12 col-md-6">
                                    <label class="control-label" for="Description">Description</label>
                                    <?= $this->Form->textarea('description',['value' => $product->description,'class'=>'summernote']);?>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tabep3<?= $product->id;?>">
                                <?= $this->Form->input('files'.$product->id.'.',[ 'type'=>'file',  'multiple',
                                    'append' => [
                                        $this->Html->tag('span', '<i class="fa fa-trash"></i>', array('class' => 'btn btn-success btn-trash-image waves-effect waves-button waves-red'))]]); 
                                ?>
                                <output id="list"></output>
                              
                                <?php foreach ($product->images as $key => $image):?>
                                    <div class="show-image show-image-<?= $image->id?>">
                                        <?= $this->Html->image($image->thumbnail,['class'=>'image-border','width'=>100, 'height'=> 80]) ?>
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
                <?= $this->Html->tag('span','Reset', array('id' => 'ProductResetForm','class' => 'btn btn-success m-b-sm btn-addon waves-effect waves-button waves-red'));?>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>  <!-- End Modal -->

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
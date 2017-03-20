
<div class="row">
    <div class="col-md-3 col-sm-4 col-xs-12 ">
        <div class="sidebar-shop sidebar-left ">
            <?php echo $this->element('font-end/Pages/menu_account_info') ?>
        </div>
    </div>
    <div class="col-md-9 col-sm-8 col-xs-12 wapper-content">
        <h4><?php echo $this->Html->link(__("Add Products"), ['action' => 'accounts#']);?> </h4>
       <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Infomations</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Descriptions</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Images</a></li>
            </ul>
            <!-- Tab panes -->
             <?php echo $this->Form->create('add',['url'=>['controller'=>'Products','action'=>'SupplierAddProduct'],'enctype'=>'multipart/form-data']);?>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home"><br/>
                    <div class="col-lg-6 col-md-6">
                        <?= $this->Form->input('sku',['class'=>'sku','placeholder' => 'Part No/ Code/ SKU','label' => 'Part No/ Code/ SKU']); ?>
                        <?= $this->Form->input('product_name',['label'=>"Products Name/ Part Name",'class' => 'product_name','placeholder' => 'Products Name/ Part Name']); ?>
                        <?= $this->Form->input('retail_price',['class' => 'auto retail_price','placeholder' => 'USD']); ?>
                        <!-- <?= $this->Form->input('quantity',['class'=>'auto quantity','placeholder' => 'Quantity']); ?> -->
                        <?= $this->Form->input('categorie_id',[ 'label'=>"Categories/ Machinery's Name",'type'=>'select','multiple'=>false,
                                'options'=>$categorie, "class" => "selectpicker", "data-live-search" => "true",
                                // 'append' => [ $this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModalSupplier'])]
                            ]
                        ); ?>
                   
                        <?= $this->Form->input('supplier_id',['label'=>"Suppliers/ Maker's Name",'class' => 'supplier_id',"class" => "selectpicker", "data-live-search" => "true", 
                            'append' => [ $this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModal2'])]
                        ]); ?>
                        
                        <!-- <?= $this->Form->input('outlet_id',['class' => 'outlet_id','id' => 'PSupplier_Id','append' => [
                            $this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModalSupplier'])]]); ?> -->
                        
                    </div>
                    <div class="col-lg-6 col-md-6">
                      
                        <?= $this->Form->input('serial_no',['class' => 'serial_no','placeholder' => 'Serial No']); ?>
                        <?= $this->Form->input('type_model',['class'=>'type_model','placeholder' => 'Type Model']); ?>
                       <!--  <?= $this->Form->input('maker_name',['class' => 'auto maker_name','label' => "Maker's Name",'placeholder' => "Maker's Name"]); ?> -->
                       <?= $this->Form->input('quantity',['class'=>'auto quantity','placeholder' => 'Quantity']); ?>
                        <?= $this->Form->input('origin',['class' => 'origin','placeholder' => 'Origin']); ?>
                        <?= $this->Form->input('unit',array('class' => 'unit','placeholder' => 'Unit')); ?>    
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <label class="control-label" for="Short_Description">Remark/ Short Description</label>
                        <?= $this->Form->textarea('short_description',['id'=>'editor1','class'=>'summernote']);?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile"><br/>
                   <!--  <div class="col-lg-6 col-md-6">
                        <?= $this->Form->input('stock_min',array('class' => 'stock_min','value' => '1')); ?>
                        <?= $this->Form->input('stock_level',array('class' => 'stock_level','value' => '1')); ?>
                    </div> -->
                   <!--  <div class="col-lg-6 col-md-6">
                        <?= $this->Form->input('stock_max',array('class'=>'stock_max')); ?>
                        <?= $this->Form->input('unit',array('class' => 'unit')); ?>    
                    </div> -->
                    <div class="col-lg-12 col-md-6">
                        <label class="control-label" for="Description">Description</label>
                        <?= $this->Form->textarea('description',['id'=>'editor2','class'=>'summernote']);?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="messages"><br/>
                    <?= 
                        $this->Form->input('files.',[ 'type'=>'file', 'id' => 'ProductFile', 'multiple',
                            'append' => [
                                $this->Html->tag('span', '<i class="fa fa-trash"></i>', array('class' => 'btn btn-success btn-trash-image waves-effect waves-button waves-red'))]
                    ]);?>
                    <output id="listProductFile"></output>
                </div>
               
            </div>
        </div> 
            <?= $this->Form->button('Submit',array('class' => 'btn btn-success',"style"=>"margin-top: 10px;margin-left: 15px;")); ?>
            <?= $this->Form->end(); ?>
    </div>
</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm modal-center">
        <div class="modal-content" style=" margin-top: 100px; ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo __("Add Suppliers/ Maker's Name") ?></h4>
            </div>
            <div class="modal-body">
                <?= $this->Form->input('name',['id' => 'supplier-name']);?> 
            </div>
            
            <div class="modal-footer">
                <button class="btn btn-success float-right" count="<?= $suppliers->count()?>" id="btn-add-suppliers">Submit</button>
            </div>
        </div>
    </div>
</div>  <!-- End -->
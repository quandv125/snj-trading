 <span class="btn btn-success btn-addon m-b-sm waves-effect waves-button waves-red float-right margin-bottom10" data-toggle="modal" data-target="#myModalSuppliers">
    <i class="fa fa-plus"></i>Add
</span>

<div class="modal fade" id="myModalSuppliers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header" style="margin-bottom: 0em;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Suppliers</h4>
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
                                    <?php
                                        echo $this->Form->input('code');
                                        echo $this->Form->input('name');
                                        echo $this->Form->input('tel');
                                        echo $this->Form->input('address');
                                    ?>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <?php 
                                        echo $this->Form->input('location');
                                        echo $this->Form->input('email');
                                        echo $this->Form->input('tax_registration_number');
                                        echo $this->Form->input('note');
                                    ?>
                                    
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab2">
                               
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab3">
                                
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


<div class="modal fade" id="SuppliersEdit<?= $supplier->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <?= $this->Form->create(NULL,['url'=>['action'=>'edit',$supplier->id],'enctype'=>'multipart/form-data']);?>
            <div class="modal-header" style="margin-bottom: 0em;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit supplier</h4>
            </div>
            <div class="modal-body row">
                <div class="panel-body">
                    <div class="col-lg-6 col-md-6">
                        <?php
                            echo $this->Form->input('code',['value'=>$supplier->code]);
                           
                            // echo $this->Form->input('supplier_group',['value'=>$supplier->supplier_group]);
                             echo $this->Form->input('tel',['value'=>$supplier->tel,'label' => 'Phone']);
                            echo $this->Form->input('note',['type'=>'textarea','value'=>$supplier->note]);
                        ?>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <?php 
                            echo $this->Form->input('name',['value'=>$supplier->name]);
                            echo $this->Form->input('address',['value'=>$supplier->address]);
                            // echo $this->Form->input('location',['value'=>$supplier->location]);
                            // echo $this->Form->input('date_of_birth',['type' => 'text','class' => 'date-picker','value' => date('Y-m-d', strtotime($supplier->date_of_birth))]); 
                            echo $this->Form->input('email',['value'=>$supplier->email]);
                            // echo $this->Form->input('tax_registration_number',['value'=>$supplier->tax_registration_number]);
                        ?>
                        <!-- <label class="control-label" for="Gender">Gender</label> -->
                        <!-- <?= $this->Form->radio('gender',[1=> 'Male', 2=>'Female'],['default'=>1],['value'=>$supplier->gender]); ?> -->
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

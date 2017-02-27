
<div class="modal fade" id="partnerDeliverysEdit<?= $partnerDelivery->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <?= $this->Form->create(NULL,['url'=>['action'=>'edit',$partnerDelivery->id],'enctype'=>'multipart/form-data']);?>
            <div class="modal-header" style="margin-bottom: 0em;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit partnerDelivery</h4>
            </div>
            <div class="modal-body row">
                <div class="panel-body">
                    <div class="col-lg-6 col-md-6">
                        <?php
                            echo $this->Form->input('code',['value'=>$partnerDelivery->code]);
                            echo $this->Form->input('name',['value'=>$partnerDelivery->name]);
                            echo $this->Form->input('partnerDelivery_group',['value'=>$partnerDelivery->partnerDelivery_group]);
                            echo $this->Form->input('tel',['value'=>$partnerDelivery->tel]);
                            echo $this->Form->input('note',['type'=>'textarea','value'=>$partnerDelivery->note]);
                        ?>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <?php 
                            echo $this->Form->input('address',['value'=>$partnerDelivery->address]);
                            echo $this->Form->input('location',['value'=>$partnerDelivery->location]);
                            echo $this->Form->input('email',['value'=>$partnerDelivery->email]);
                            echo $this->Form->input('tax_registration_number',['value'=>$partnerDelivery->tax_registration_number]);
                        ?>
                        
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

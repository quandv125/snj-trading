<?php foreach ($partnerDeliverys as $partnerDelivery): ?>
     <tr class="row-cz-<?= $str_rand ?> cursor-pointer">
        <td style="width: 1px;">
            <input tabindex="1" type="checkbox" class="icheck-<?= $str_rand ?> Checkbox-<?= $str_rand ?>" id="input-1">
        </td>
        <td class="text-center"><?= ($partnerDelivery->code) ?></td>
        <td class="text-center"><?= h($partnerDelivery->name) ?></td>
        <td class="text-center"><?= h($partnerDelivery->tel) ?></td>
        <td class="text-center"><?= h($partnerDelivery->email) ?></td>
    </tr>
    <tr class="row-cz-details hidden">
        <td colspan="5">
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#tab1<?= $partnerDelivery->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Infomations") ?></a>
                    </li>
                    <li role="presentation">
                        <a href="#tab2<?= $partnerDelivery->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Stock card"); ?></a>
                    </li>
                    <li role="presentation">
                        <a href="#tab3<?= $partnerDelivery->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Stock Level") ?></a>
                    </li>
                    <li role="presentation">
                        <a href="#tab4<?= $partnerDelivery->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Image") ?></a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active fade in" id="tab1<?= $partnerDelivery->id?>">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!-- <article class="customer-title"><?php echo $partnerDelivery->customer_name; ?></article> -->
                        </div>
                        <div class="clearfix"></div>
                        <div class="content">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <table class="table table-striped">
                                        <tr>
                                            <td class="bold"><?php echo __('Code')?></td>
                                            <td><?= $partnerDelivery->code; ?></td>
                                            <td class="bold"><?php echo __('Tel')?></td>
                                            <td><?= $partnerDelivery->tel; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="bold"><?php echo  __('Name')?></td>
                                            <td><?= $partnerDelivery->name?></td>
                                            <td class="bold"><?php echo __('Tax') ?>:</td>
                                            <td><?= $partnerDelivery->tax_registration_number; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="bold"><?= __('C.Group')?>:</td>
                                            <td><?= $partnerDelivery->customer_group?></td>
                                            <td class="bold"><?= __('Email')?>:</td>
                                            <td><?= $partnerDelivery->email?></td>
                                        </tr>
                                        <tr>
                                            <td class="bold"><?php echo __('Address')?>:</td>
                                            <td><?= $partnerDelivery->address; ?></td>
                                             <td class="bold"><?php echo __('Location')?>:</td>
                                            <td><?= $partnerDelivery->location; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="bold"><?php echo  __('Birthday')?></td>
                                            <td><?= date("Y-m-d", strtotime($partnerDelivery->date_of_birth));?></td>
                                           
                                            <td class="bold"><?php echo __('Gender') ?>:</td>
                                            <td><?= ($partnerDelivery->gender == 1)?'Male':'Female'; ?></td>
                                        </tr>
                                    </table>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="customers">
                                    <h5><?php echo __('Descriptions')?></h5><div class="divider10"></div>
                                    <div class="content">
                                        <textarea cols="33" rows="7"><?= $partnerDelivery->note; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix divider10"> </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-success btn-addon m-b-sm waves-effect waves-button waves-red" data-toggle="modal" data-target="#customerEdit<?= $partnerDelivery->id;?>"><i class="fa fa-check-square"></i> Update</button>
                                <!-- Modal -->
                                <?= $this->element('Customers/index_edit',['customer'=> $partnerDelivery]);?>
                           
                                <?= $this->Form->postLink(__('<i class="fa fa-trash"></i> Delete'),
                                    ['action' => 'delete', $partnerDelivery->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $partnerDelivery->id),'class' => 'btn btn-danger btn-addon m-b-sm waves-effect waves-button waves-red', 'escape' => false])?>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab2<?= $partnerDelivery->id?>">
                        comming soon
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab3<?= $partnerDelivery->id?>">
                        comming soon
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab4<?= $partnerDelivery->id?>">
                        comming soon
                    </div>
                </div>
            </div>
        </td>
    </tr>
<?php endforeach; ?>
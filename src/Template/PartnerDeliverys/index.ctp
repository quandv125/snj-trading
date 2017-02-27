
<div class="row">
    <div class="col-lg-12 col-md-12 panel panel-white">
        <div class="col-lg-2 col-md-2 col-sm-3">
        <!-- Searchbox -->
         <?php echo $this->element('partnerDeliverys/Searchbox') ?>
        </div>
        <!-- col-lg-3 -->
        <div class="col-lg-10 col-md-10 col-sm-9">
            <div class="panel-heading clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    partnerDeliverys
                </div> 
                <!-- col-lg-8 -->
                <div class="col-lg-4 col-md-4 col-md-4 col-xs-4">
                    <!-- Add new partnerDeliverys -->
                     <?= $this->element('partnerDeliverys/index_add') ?>
                </div> 
                <!-- col-lg-4 -->
            </div> 
            <!-- panel-heading -->
            <div class="panel-body">
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 1px;">
                                        <input tabindex="10" type="checkbox" class="icheck CheckboxAll" id="input-10">
                                    </th>
                                    <th class="text-center" scope="col"><?= $this->Paginator->sort('code') ?></th>
                                    <th class="text-center" scope="col"><?= $this->Paginator->sort('name') ?></th>
                                    <th class="text-center" scope="col"><?= $this->Paginator->sort('tel') ?></th>
                                    <th class="text-center" scope="col"><?= $this->Paginator->sort('email') ?></th>
                                </tr>
                            </thead>
                            <tbody id="partnerDeliverys-details">
                                <?php foreach ($partnerDeliverys as $partnerDelivery): ?>
                                     <tr class="row-cz cursor-pointer">
                                        <td style="width: 1px;">
                                            <input tabindex="1" type="checkbox" class="icheck Checkbox" id="input-1">
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
                                                            <article class="partnerDeliverys-title"></article>
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
                                                                           
                                                                            <td class="bold"><?= __('Fax')?>:</td>
                                                                            <td><?= $partnerDelivery->fax?></td>
                                                                            <td class="bold"><?= __('Email')?>:</td>
                                                                            <td><?= $partnerDelivery->email?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="bold"><?php echo __('Address')?>:</td>
                                                                            <td><?= $partnerDelivery->address; ?></td>
                                                                             <td class="bold"><?php echo __('Location')?>:</td>
                                                                            <td><?= $partnerDelivery->location; ?></td>
                                                                        </tr>
                                                                        
                                                                    </table>
                                                            </div>
                                                            
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <div class="partnerDeliverys">
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
                            </tbody>
                        </table>
                    </div>
                </div><!-- col-lg-4 -->
            </div> <!-- panel-body -->
        </div> <!-- col-lg-9 -->
    </div><!-- col-lg-12 -->
</div> <!-- row -->

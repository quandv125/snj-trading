
<div class="row">
    <div class="col-lg-12 col-md-12 panel panel-white">
        <div class="col-lg-2 col-md-2 col-sm-3">
        <!-- Searchbox -->
            <?php echo $this->element('Customers/searchbox') ?>
        </div>
        <!-- col-lg-3 -->
        <div class="col-lg-10 col-md-10 col-sm-9">
            <div class="panel-heading clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    Customers
                </div> 
                <!-- col-lg-8 -->
                <div class="col-lg-4 col-md-4 col-md-4 col-xs-4">
                    <!-- Add new customers -->
                     <?= $this->element('Customers/index_add') ?>
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
                            <tbody id="customers-details">
                                <?php foreach ($customers as $customer): ?>
                                     <tr class="row-cz cursor-pointer">
                                        <td style="width: 1px;">
                                            <input tabindex="1" type="checkbox" class="icheck Checkbox" id="input-1">
                                        </td>
                                        <td class="text-center"><?php echo 'C.'.str_pad($customer->id,5,"0",STR_PAD_LEFT); ?></td>
                                        <td class="text-center"><?= h($customer->name) ?></td>
                                        <td class="text-center"><?= h($customer->tel) ?></td>
                                        <td class="text-center"><?= h($customer->email) ?></td>
                                    </tr>
                                    <tr class="row-cz-details hidden">
                                        <td colspan="5">
                                            <div role="tabpanel">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs nav-justified" role="tablist">
                                                    <li role="presentation" class="active">
                                                        <a href="#tab1<?= $customer->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Infomations") ?></a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="#tab2<?= $customer->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("History"); ?></a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="#tab3<?= $customer->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Địa chỉ khách hàng") ?></a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="#tab4<?= $customer->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Công nợ") ?></a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane active fade in" id="tab1<?= $customer->id?>">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <article class="customer-title"><?php echo $customer->customer_name; ?></article>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="content">
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <table class="table table-striped">
                                                                        <tr>
                                                                            <td class="bold"><?php echo __('Code')?></td>
                                                                            <td><?php echo 'C.'.str_pad($customer->id,5,"0",STR_PAD_LEFT); ?></td>
                                                                            <td class="bold"><?php echo __('Tel')?></td>
                                                                            <td><?= $customer->tel; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="bold"><?php echo  __('Name')?></td>
                                                                            <td><?= $customer->name?></td>
                                                                            <td class="bold"><?php echo __('Tax') ?>:</td>
                                                                            <td><?= $customer->tax_registration_number; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="bold"><?= __('C.Group')?>:</td>
                                                                            <td><?= $customer->customer_group?></td>
                                                                            <td class="bold"><?= __('Email')?>:</td>
                                                                            <td><?= $customer->email?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="bold"><?php echo __('Address')?>:</td>
                                                                            <td><?= $customer->address; ?></td>
                                                                             <td class="bold"><?php echo __('Location')?>:</td>
                                                                            <td><?= $customer->location; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="bold"><?php echo  __('Birthday')?></td>
                                                                            <td><?= date("Y-m-d", strtotime($customer->date_of_birth));?></td>
                                                                           
                                                                            <td class="bold"><?php echo __('Gender') ?>:</td>
                                                                            <td><?= ($customer->gender == 1)?'Male':'Female'; ?></td>
                                                                        </tr>
                                                                    </table>
                                                            </div>
                                                            
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <div class="customers">
                                                                    <h5><?php echo __('Descriptions')?></h5><div class="divider10"></div>
                                                                    <div class="content">
                                                                        <textarea cols="33" rows="7"><?= $customer->note; ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix divider10"> </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <button class="btn btn-success btn-addon m-b-sm waves-effect waves-button waves-red" data-toggle="modal" data-target="#customerEdit<?= $customer->id;?>"><i class="fa fa-check-square"></i> Update</button>
                                                                <!-- Modal -->
                                                                <?= $this->element('Customers/index_edit',['customer'=> $customer]);?>
                                                           
                                                                <?= $this->Form->postLink(__('<i class="fa fa-trash"></i> Delete'),
                                                                    ['action' => 'delete', $customer->id],
                                                                    ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id),'class' => 'btn btn-danger btn-addon m-b-sm waves-effect waves-button waves-red', 'escape' => false])?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="tab2<?= $customer->id?>">
                                                                <table class="table table-bordered table-color">
                                                                     <thead>
                                                                        <tr>
                                                                            <th class="text-center width5">Code</th>
                                                                            <th class="text-center">Time</th>
                                                                            <th class="text-center">Users</th>
                                                                            <th class="text-center">Total</th>
                                                                        </tr>
                                                                    </thead>
                                                                <?php foreach ($customer->invoices as $key => $invoices): ?>
                                                                    <tr>
                                                                        <td class="text-center"><span class="invoices-detail cursor-pointer" id="<?= $invoices->id?>"><?php echo 'HD.'.str_pad($invoices->id,5,"0",STR_PAD_LEFT); ?></span></td>
                                                                        <td class="text-center"><?= h(date("Y-m-d ", strtotime($invoices->created))) ?></td>
                                                                       
                                                                        <td class="text-center"><?= $invoices['_matchingData']['Users']->username; ?></td>
                                                                        
                                                                        <td class="text-center"><span class="auto"><?= $invoices->total?></span>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach ?>
                                                                </table>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="tab3<?= $customer->id?>">
                                                        comming soon
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="tab4<?= $customer->id?>">
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

<div id="modalStocks" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body modal-Stocks"></div>
        </div>
    </div>
</div>











<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customers index large-9 medium-8 columns content">
    <h3><?= __('Customers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_of_birth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tax_registration_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $this->Number->format($customer->id) ?></td>
                <td><?= h($customer->code) ?></td>
                <td><?= h($customer->name) ?></td>
                <td><?= $this->Number->format($customer->customer_group) ?></td>
                <td><?= h($customer->tel) ?></td>
                <td><?= h($customer->address) ?></td>
                <td><?= h($customer->location) ?></td>
                <td><?= h($customer->data_of_birth) ?></td>
                <td><?= h($customer->email) ?></td>
                <td><?= h($customer->gender) ?></td>
                <td><?= h($customer->tax_registration_number) ?></td>
                <td><?= h($customer->note) ?></td>
                <td><?= h($customer->created) ?></td>
                <td><?= h($customer->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
 -->
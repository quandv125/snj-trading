<tr>
    <td colspan="4"></td>
    <td class="text-center"><?= number_format($total['final_price'], DECIMALS) ?> VNĐ</td>
    <td></td>
    <td class="text-center"><?= number_format($total['total_paid'], DECIMALS) ?> VNĐ</td>
</tr>
<?php foreach ($invoices as $invoice): ?>
    <tr class="row-cz-<?= $str_rand;?> cursor-pointer">
        <td style="width: 1px;">
            <input tabindex="1" type="checkbox" class="icheck-<?= $str_rand;?> Checkbox" id="input-1">
        </td>
        <td class="text-center"><?php echo INVOICE.str_pad($invoice->id,ZEROFILL,ZERO,STR_PAD_LEFT); ?></td>
        <td class="text-center"><?= h(date("Y-m-d ", strtotime($invoice->created))) ?></td>
        <td class="text-center"><?= h($invoice->customer->name) ?></td>
        <td class="text-center"><?= number_format($invoice->total, DECIMALS) ?></td>
        <td class="text-center"><?= h($invoice->discount) ?></td>
        <td class="text-center"><?= number_format($invoice->customers_paid, DECIMALS); ?></td>
    </tr>
    <tr class="row-cz-details hidden">
        <td colspan="7">
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#tab1<?= $invoice->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Infomations") ?></a>
                    </li>
                    <li role="presentation">
                        <a href="#tab3<?= $invoice->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("History") ?></a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active fade in" id="tab1<?= $invoice->id?>">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <article class="customer-title"></article>
                        </div>
                        <div class="clearfix"></div>
                        <div class="content">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <table class="table table-striped">
                                    <tr>
                                        <td class="bold"><?php echo __('Invoice Code')?></td>
                                        <td><?php echo INVOICE.str_pad($invoice->id,ZEROFILL,ZERO,STR_PAD_LEFT); ?></td>
                                        <td class="bold"><?php echo __('Status')?></td>
                                        <td><?= $invoice->status; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold"><?php echo  __('Time')?></td>
                                        <td><?= h(date("Y-m-d H:m:s", strtotime($invoice->created))) ?></td>
                                        <td class="bold"><?php echo __('Outlet') ?>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="bold"><?= __('Customer')?>:</td>
                                        <td><?= h($invoice->customer->name) ?></td>
                                        <td class="bold"><?= __('User')?>:</td>
                                        <td><?= $invoice->user['username']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold"><?= __('Order code')?>:</td>
                                        <td></td>
                                        <td class="bold"><?= __('Create By')?>:</td>
                                        <td><?= $invoice->CreateBy['username']; ?></td>
                                    </tr>
                                </table>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="invoices">
                                    <h5><?php echo __('Descriptions')?></h5><div class="divider10"></div>
                                    <div class="content">
                                        <textarea cols="33" rows="6"><?= $invoice->note; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                                <table class="table table-bordered table-color">
                                     <thead>
                                        <tr>
                                            <th class="width5">
                                                <button class="btn btn-danger del-invoice-products"  invoice_id="<?= $invoice->id?>" >
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </th>
                                            <th><?php echo __("SKU");?></th>
                                            <th><?php echo __("Product Name");?></th>
                                            <th><?php echo __("Price");?></th>
                                            <th><?php echo __("Quantity");?></th>
                                            <th><?php echo __("Total");?></th>
                                            <th class="width5">Action</th>
                                        </tr>
                                    </thead>
                                <?php foreach ($invoice->invoice_products as $key => $InvoiceProducts): ?>
                                    <?php $IP =  $InvoiceProducts['_matchingData']['Products'];?>
                                    
                                    <tr class="invoice_products_<?= $InvoiceProducts->id?>">
                                        <th class="text-center"> <input tabindex="100<?= $key?>" type="checkbox" class="icheck-<?= $str_rand;?> invoice-product-chbox-<?= $invoice->id;?>" invoice-product-id="<?= $InvoiceProducts->id?>" cid="<?= $key?>" id="input-100<?= $key?>" name="chbox-invoice"></th>
                                        <td><?= PRODUCT.str_pad($IP->id, ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
                                        <td><?= $IP->product_name?></td>
                                        <td><?= number_format($IP->retail_price, DECIMALS) ?></td>
                                        <td><?= $InvoiceProducts->quantity?></td>
                                        <td><?= number_format($InvoiceProducts->quantity*($IP->retail_price), DECIMALS) ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" data-toggle="modal", data-target= "#myModal-<?= $invoice->id.$IP->id?>"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                        </td>
                                        <!--  -->
                                        <div class="modal fade" id="myModal-<?= $invoice->id.$IP->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-sm modal-center">
                                                <div class="modal-content" style=" margin-top: 100px; ">
                                                    <?= $this->Form->create(NULL,['url'=>['action'=>'ChangeInvoicesProducts',$InvoiceProducts->id]]);?>
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"><?php echo __("invoices") ?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php
                                                            echo $this->Form->input('id',['value'=>$IP->id,'class'=>'hidden','label'=>false]);
                                                            echo $this->Form->input('name',['value'=>$IP->product_name,'disabled']);
                                                            echo $this->Form->input('price',['class'=>'auto','disabled','value'=> $IP->retail_price]);
                                                            echo $this->Form->input('quantity',['value'=> $InvoiceProducts->quantity]);
                                                        ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                       
                                                        <!-- <?= $this->Form->button('Submit',array('class' => 'btn btn-success float-right waves-effect waves-button waves-red')); ?> -->
                                                        <?= $this->Form->end(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                        <!-- End -->
                                    </tr>
                                <?php endforeach ?>
                                </table>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 table-responsive float-right">
                            <table class="table table-striped">
                                <tr>
                                    <td>Total value:</td>
                                    <td><?= number_format($invoice->total, DECIMALS);?></td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td><?= number_format($invoice->discount, DECIMALS);?>%</td>
                                </tr>
                                <tr>
                                    <td>Total:</td>
                                    <td><?= number_format($invoice->customers_paid, DECIMALS);?></td>
                                </tr>
                                <tr>
                                    <td>Paid amount:</td>
                                    <td><?= number_format($invoice->money, DECIMALS);?></td>
                                </tr>
                                <tr>
                                    <td>Return Money:</td>
                                    <td><?= number_format($invoice->return_money, DECIMALS);?></td>
                                </tr>
                            </table>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-success btn-addon m-b-sm waves-effect waves-button waves-red" data-toggle="modal" data-target="#customerEdit<?= $invoice->id;?>"><i class="fa fa-check-square"></i> Update</button>
                                <button class="btn btn-danger btn-addon m-b-sm waves-effect waves-button waves-red" ><i class="fa fa-trash"></i> Cancel</button>
                                
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab3<?= $invoice->id?>">
                        comming soon
                    </div>
                </div>
            </div>
        </td>
    </tr>
<?php endforeach; ?>
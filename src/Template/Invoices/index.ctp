
<div class="row">
    <div class="col-lg-12 col-md-12 panel panel-white">
        <div class="col-lg-2 col-md-2 col-sm-3">
        <!-- Searchbox -->
            <?php echo $this->element('Invoices/searchbox') ?>
        </div>
        <!-- col-lg-3 -->
        <div class="col-lg-10 col-md-10 col-sm-9">
            <div class="panel-heading clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    Invoices
                </div> 
                <!-- col-lg-8 -->
                <div class="col-lg-4 col-md-4 col-md-4 col-xs-4">
                    <!-- Add new invoices -->
                   
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
                                    <th class="text-center" scope="col"><?= $this->Paginator->sort(__('Code')) ?></th>
                                    <th class="text-center" scope="col"><?= $this->Paginator->sort('Customer') ?></th>
                                    <th class="text-center" scope="col"><?= $this->Paginator->sort('Status') ?></th>
                                    <th class="text-center" scope="col"><?= $this->Paginator->sort('Time') ?></th>
                                    
                                </tr>
                            </thead>
                            <tbody id="invoices-details">
                              <!--   <tr>
                                    <td colspan="4"></td>
                                    <td class="text-center"><?= number_format($total['final_price'], DECIMALS) ?> VNĐ</td>
                                    <td></td>
                                    <td class="text-center"><?= number_format($total['total_paid'], DECIMALS) ?> VNĐ</td>
                                </tr> -->
                                <?php foreach ($invoices as $invoice): ?>
                                    <tr class="row-cz cursor-pointer">
                                        <td style="width: 1px;">
                                            <input tabindex="1" type="checkbox" class="icheck Checkbox" id="input-1">
                                        </td>
                                        <td class="text-center"><?php echo '#'.$invoice->id; ?></td>
                                        <td class="text-center"><?= $invoice->user['username']; ?></td>
                                        <td class="text-center"><?php echo $invoice->status ?></td>
                                        <td class="text-center"><?= h(date("Y-m-d H:s:i", strtotime($invoice->created))) ?></td>
                                    </tr>
                                    <tr class="row-cz-details hidden">
                                        <td colspan="7">
                                            <div role="tabpanel">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs nav-justified" role="tablist">
                                                    <li role="presentation" class="active">
                                                        <a href="#tab1<?= $invoice->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Infomations") ?></a>
                                                    </li>
                                                    <!-- <li role="presentation">
                                                        <a href="#tab3<?= $invoice->id?>" class="bold" role="tab" data-toggle="tab"><?php //echo __("History") ?></a>
                                                    </li> -->
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
                                                                        <td class="bold"><?= __('Customer')?>:</td>
                                                                        <td><?= $invoice->user['username']; ?></td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                       
                                                                        <td class="bold"><?= __('Create By')?>:</td>
                                                                        <td><?= $invoice->CreateBy['username']; ?></td>
                                                                         <td class="bold"><?= __('')?></td>
                                                                        <td></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <div class="invoices">
                                                                    <!-- <h5><?php echo __('Remark')?></h5><div class="divider10"></div> -->
                                                                    <div class="content">
                                                                        <textarea cols="33" rows="6" class="form-control" placeholder="Remark..."><?= $invoice->note; ?></textarea>
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
                                                                            <th><?php echo __("Product Name");?></th>
                                                                            <th><?php echo __("Price");?></th>
                                                                            <th><?php echo __("Quantity");?></th>
                                                                            <th><?php echo __("Total");?></th>
                                                                            <th><?php echo __("Remark");?></th>
                                                                            <th class="width5">Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                <?php foreach ($invoice->invoice_products as $key => $InvoiceProducts): ?>
                                                                    <?php $IP =  $InvoiceProducts['_matchingData']['Products'];?>
                                                                    
                                                                    <tr class="invoice_products_<?= $InvoiceProducts->id?>">
                                                                        <th class="text-center"> <input tabindex="100<?= $key?>" type="checkbox" class="icheck invoice-product-chbox-<?= $invoice->id;?>" invoice-product-id="<?= $InvoiceProducts->id?>" cid="<?= $key?>" id="input-100<?= $key?>" name="chbox-invoice"></th>
                                                                        <td><?= $IP->product_name?></td>
                                                                        <td><?= number_format($IP->retail_price, DECIMALS) ?></td>
                                                                        <td><?= $InvoiceProducts->quantity?></td>
                                                                        <td><?= number_format($InvoiceProducts->quantity*($IP->retail_price), DECIMALS) ?>
                                                                        </td>
                                                                        <td><?= $InvoiceProducts->remark?></td>
                                                                        <td>
                                                                            <button class="btn btn-success" data-toggle="modal", data-target= "#myModal-<?= $invoice->id.$IP->id?>"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                                        </td>
                                                                        <!-- Modal -->
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
                                                                        <!-- End Modal-->
                                                                    </tr>
                                                                <?php endforeach ?>
                                                                </table>
                                                            </div>
                                                            <div class="clearfix"> </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 table-responsive float-right">
                                                            <!-- <table class="table table-striped">
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
                                                            </table> -->
                                                            </div>
                                                            <div class="clearfix"> </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <button class="btn btn-success btn-addon m-b-sm waves-effect waves-button waves-red" data-toggle="modal" data-target="#customerEdit<?= $invoice->id;?>"><i class="fa fa-check-square"></i> Update</button>
                                                                <button class="btn btn-danger btn-addon m-b-sm waves-effect waves-button waves-red" ><i class="fa fa-trash"></i> Cancel</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div role="tabpanel" class="tab-pane fade" id="tab3<?= $invoice->id?>">
                                                        comming soon
                                                    </div> -->
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

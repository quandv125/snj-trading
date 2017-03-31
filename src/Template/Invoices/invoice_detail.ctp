
<div class="row">
    <div class="col-lg-12 col-md-12 panel panel-white">
        <div class="col-lg-2 col-md-2 col-sm-3">
        <!-- Searchbox -->
            <?php echo $this->element('Invoices/searchbox') ?>
        </div>
        <!-- col-lg-3 -->
        <div class="col-lg-10 col-md-10 col-sm-9">
            <div class="panel-heading clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php echo __('Order'); ?>
                </div> 
                <!-- col-lg-8 -->
            </div> 
            <!-- panel-heading -->
            <div class="panel-body">
                <div class="">
                    <div class="table-responsive">
                        <div role="tabpanel">
                            <?php foreach ($invoices as $key => $invoice): ?>
                                  <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active fade in" id="tab1<?= $invoice->id?>">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <article class="customer-title"></article>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="content">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <td class="bold"><?php echo __('Code')?></td>
                                                        <td><?php echo '#'.str_pad($invoice->id,ZEROFILL,ZERO,STR_PAD_LEFT); ?></td>
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
                                                        <td class="bold"><?= __('Vessel Name')?>:</td>
                                                        <td><?= $invoice->vessel; ?></td>
                                                        <td class="bold"><?= __('IMO No')?></td>
                                                        <td><?= $invoice->imo_no; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold"><?= __('Maker/Type Ref')?>:</td>
                                                        <td><?= $invoice->maker_type_ref; ?></td>
                                                        <td class="bold"><?= __('Description')?></td>
                                                        <td><?= $invoice->note; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            
                                          <!--   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="invoices">
                                                    <div class="content">
                                                        <textarea cols="33" rows="6" class="form-control" placeholder="Note..."><?= $invoice->note; ?></textarea>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                                             <?php $tp = 0; $user = array();?>
                                            <?php if (!empty($invoice->invoice_products)): ?>
                                                
                                          
                                                <table class="table table-bordered table-color">
                                                     <thead>
                                                        <tr>
                                                           
                                                            <th><?php echo __("Product Name");?></th>
                                                            <th><?php echo __("Price");?></th>
                                                            <th><?php echo __("Quantity");?></th>
                                                            <th><?php echo __("Price(profit)");?></th>
                                                            <th><?php echo __("Unit");?></th>
                                                            <th><?php echo __("Total");?></th>
                                                            <th><?php echo __("Remark");?></th>
                                                            <th class="width5">
                                                                <!-- <button class="btn btn-danger del-invoice-products" invoice_id="<?= $invoice->id?>" >
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </button> -->
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                   
                                                    <?php foreach ($invoice->invoice_products as $key => $InvoiceProducts): ?>
                                                        <?php $IP = $InvoiceProducts['_matchingData']['Products'];?>
                                                        <?php if (!in_array($IP->user_id, $user)){ $user[] = $IP->user_id; } ?>
                                                        <?php $tp = $tp+($InvoiceProducts->quantity*($IP->retail_price)); ?>
                                                        <tr class="invoice_products_<?= $InvoiceProducts->id?>">
                                                           
                                                            <td class="cursor-pointer show-detail-product" id="<?= $IP->id?>"><?= $IP->product_name?></td>
                                                            <td><?= ($IP->retail_price) ?></td>
                                                            <td><?= $InvoiceProducts->quantity?></td>
                                                            <td><?= $IP->retail_price+(($IP->retail_price*$invoice->profit)/100) ?></td>
                                                            <td><?= $IP->unit?></td>
                                                            <td><?= ($InvoiceProducts->quantity*($IP->retail_price)) ?></td>
                                                            <td><?= $InvoiceProducts->remark?></td>
                                                            <td><span class="btn btn-danger btn-remove-invp" product_id="<?= $InvoiceProducts->id?>"><i class="fa fa-trash"></i></span></td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </table>
                                            <?php elseif(!empty($invoice->unavailables)): ?>
                                                <table class="table table-bordered table-color">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo __("#");?></th>
                                                            <th><?php echo __("Name");?></th>
                                                            <th><?php echo __("Part No");?></th>
                                                            <th><?php echo __("Model/Serial No");?></th>
                                                            <th><?php echo __("Quantity");?></th>
                                                            <th><?php echo __("Unit");?></th>
                                                            <th><?php echo __("Remark");?></th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="tbody-unavailable">
                                                        <?php foreach ($invoice->unavailables as $key => $products): ?>
                                                            <tr class="tr-unavailable">
                                                                <td><?= ($key+1)?></td>
                                                                <td><?= $products->product_name?></td>
                                                                <td><?= $products->part_no?></td>
                                                                <td><?= $products->model_serial_no?></td>
                                                                <td><?= $products->quantity?></td>
                                                                <td><?= $products->unit?></td>
                                                                <td><?= $products->remark?></td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            <?php endif ?>
                                            </div>
                                            <div class="clearfix"> </div>
                                          <!--   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 table-responsive float-right">
                                                <table class="table table-striped">
                                                    <?php $profit_money = ($tp*$invoice->profit)/100; ?>
                                                    <tr class="">
                                                        <td><b><?php echo __("Price");?>:</b></td>
                                                        <td>$ <span price="<?php echo $tp; ?>" class="cart-price-<?= $invoice->id;?>"><?= ($tp);?></span></td>
                                                    </tr>
                                                    <tr class="info">
                                                        <td><b><?php echo __("Profit (%)");?>:</b></td>
                                                        <td><input type="number" value="<?php echo $invoice->profit ?>" id="<?= $invoice->id;?>" class="form-control profit-jobs profit-jobs-<?= $invoice->id;?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b><?php echo __("Price Profit");?>:</b></td>
                                                        <td>$ <span class="price-profit-<?= $invoice->id;?>"><?= $profit_money;?></span></td>
                                                    </tr>
                                                    <tr class="info">
                                                        <td><b><?php echo __("Delivery cost");?>:</b></td>
                                                        <td>
                                                        <?php $i = false; ?>
                                                        <?php foreach ($deliverys as $key => $delivery): ?>
                                                            <?php 
                                                                if ($key == $invoice->delivery_cost) {
                                                                    $checked = "checked";
                                                                    $i = true;
                                                                } else {
                                                                    $checked = "";
                                                                }
                                                            ?>
                                                            <input tabindex="a<?= $key?>" <?= $checked;?> type="radio" id="<?= $invoice->id;?>" value="<?php echo $key; ?>" class="icheck" name="del-cost">
                                                            <label class="cursor-pointer" for="input-a<?= $key?>"><?php echo $delivery; ?> (<?php echo $key; ?>)</label>
                                                        <?php endforeach ?>

                                                        <input tabindex="2002" type="radio" <?php echo ($i == false)?"checked":"" ?> id="<?= $invoice->id;?>" value="0" class="icheck" name="del-cost">
                                                        <label class="cursor-pointer" for="input-2002">Custom</label>

                                                        <input type="number" style="margin-top: 5px;" value="<?php echo $invoice->delivery_cost ?>" id="<?= $invoice->id;?>" class="<?php echo ($i == false)?"":"hidden" ?> form-control delivery_cost delivery_cost_<?= $invoice->id;?>">
                                                       
                                                        <textarea class="form-control remark_delivery_<?= $invoice->id;?>" style="margin-top: 5px;" placeholder="Remark"><?php echo $invoice->note; ?></textarea>
                                                    </tr>
                                                    <tr>
                                                        <td><b><?php echo __("Packing cost");?>:</b></td>
                                                        <td><input type="number" value="<?php echo $invoice->packing_cost ?>" id="<?= $invoice->id;?>" class="form-control packing_cost packing_cost_<?= $invoice->id;?>"></td>
                                                    </tr>
                                                    <tr class="info">
                                                        <td><b><?php echo __("Insurance cost");?>:</b></td>
                                                        <td><input type="number" value="<?php echo $invoice->insurance_cost ?>" id="<?= $invoice->id;?>" class="form-control insurance_cost insurance_cost_<?= $invoice->id;?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b><?php echo __("Total");?>:</b></td>
                                                        <td><span class="total-price-<?= $invoice->id;?>"><b>
                                                      
                                                        $ <?= $profit_money+$tp+$invoice->delivery_cost+$invoice->packing_cost+$invoice->insurance_cost;?>
                                                        </b></span></td>
                                                    </tr>
                                                </table>
                                            </div> -->
                                            <div class="clearfix"> </div>
                                           <!--  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                <button class="float-right btn btn-danger btn-addon m-b-sm waves-effect waves-button waves-red" ><i class="fa fa-trash"></i> Cancel</button>
                                                <button title="Save and Send Email Supplier" class="float-right btn btn-info btn-addon m-b-sm waves-effect waves-button waves-red send-invoices-supplier" style="margin-right: 10px;" user="<?php echo json_encode($user) ?>" id="<?= $invoice->id;?>"><i class="fa fa-envelope"></i> Send</button>
                                                <button title="Save and Send Email Customer" class="float-right btn btn-success btn-addon m-b-sm waves-effect waves-button waves-red update-invoices" style="margin-right: 10px;" id="<?= $invoice->id;?>"><i class="fa fa-check-square"></i> Save</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div><!-- col-lg-4 -->
            </div> <!-- panel-body -->
        </div> <!-- col-lg-9 -->
    </div><!-- col-lg-12 -->
</div> <!-- row -->

 <!-- Modal -->
<div class="modal fade" id="ModalX" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg modal-center">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo __("Products") ?></h4>
            </div>
            <div class="modal-body modal-x"></div>
        </div>
    </div>
</div>  
<!-- End Modal-->

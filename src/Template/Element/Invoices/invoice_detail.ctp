<div class="table-responsive">
    <table class="table table-striped">
        <tbody id="invoices-details">
            <?php foreach ($invoices as $invoice): ?>
                <tr>
                    <td>
                        <div class="clearfix"></div>
                        <div class="content">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <table class="table table-striped">
                                    <tr>
                                        <td class="bold"><?php echo __('Invoice Code')?></td>
                                        <td><?php echo 'HD.'.str_pad($invoice->id,5,"0",STR_PAD_LEFT); ?></td>
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
                                            <th>SKU</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                <?php foreach ($invoice->invoice_products as $key => $InvoiceProducts): ?>
                                    <tr>
                                        
                                        <td><?php echo 'SP.'.str_pad($InvoiceProducts['_matchingData']['Products']->id,5,"0",STR_PAD_LEFT); ?></td>
                                        <td><?= $InvoiceProducts['_matchingData']['Products']->product_name?></td>
                                        <td><span class="auto"><?= number_format($InvoiceProducts['_matchingData']['Products']->retail_price, DECIMALS) ?></span></td>
                                        <td><?= $InvoiceProducts->quantity?></td>
                                        
                                        <td><span class="auto"><?= number_format($InvoiceProducts->quantity*($InvoiceProducts['_matchingData']['Products']->retail_price), DECIMALS) ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </table>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 table-responsive float-right">
                                <table class="table table-striped">
                                    <tr>
                                        <td>Total value:</td>
                                        <td><span class="auto"><?= number_format($invoice->total, DECIMALS)?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Discount</td>
                                        <td><span class="auto"><?= $invoice->discount?>%</span></td>
                                    </tr>
                                    <tr>
                                        <td>Total:</td>
                                        <td><span class="auto"><?= number_format($invoice->customers_paid, DECIMALS)?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Paid amount:</td>
                                        <td><span class="auto"><?= number_format($invoice->money, DECIMALS)?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Return Money:</td>
                                        <td><span class="auto"><?= number_format($invoice->return_money, DECIMALS)?></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
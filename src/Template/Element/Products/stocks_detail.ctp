<div class="table-responsive">
    <table class="table table-striped">
        <tbody id="stocks-details">
            <?php foreach ($stocks as $stock): ?>
                <tr class="row-cz-details">
                    <td colspan="5">
                        <div role="tabpanel">
                            <div class="tab-content">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <article class="customer-title"><?php echo $stock->customer_name; ?></article>
                                </div>
                                <div class="clearfix"></div>
                                <div class="content">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                        <table class="table table-striped">
                                            <tr>
                                                <td class="bold"><?php echo __('Code')?></td>
                                                <td><?= $stock->code; ?></td>
                                                <td class="bold"><?php echo __('Status')?></td>
                                                <td><?= $stock->actions; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="bold"><?php echo  __('Time')?></td>
                                                <td><?= $stock->created?></td>
                                                <td class="bold"><?php echo __('Outlet') ?>:</td>
                                                <td><?= h($stock->address) ?></td>
                                            </tr>
                                            <tr>
                                                <td class="bold"><?= __('Suppliers')?>:</td>
                                                <td><?= h($stock->supplier->name) ?></td>
                                                <td class="bold"><?= __('Created')?>:</td>
                                                <td><?= $stock->user->username?></td>
                                            </tr>
                                            <tr>
                                                <td class="bold"><?= __('Payment')?>:</td>
                                                <td><?= h($stock->payment) ?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="stocks">
                                            <h5><?php echo __('Descriptions')?></h5><div class="divider10"></div>
                                            <div class="content">
                                                <textarea cols="33" rows="6"><?= $stock->note; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                                        <table class="table table-bordered table-color">
                                             <thead>
                                                <tr>
                                                    <th><?php echo __("SKU")?></th>
                                                    <th><?php echo __("Product Name")?></th>
                                                    <th><?php echo __("Price")?></th>
                                                    <th><?php echo __("Quantity")?></th>
                                                    <th><?php echo __("Discount")?></th>
                                                    <th><?php echo __("Total")?></th>
                                                </tr>
                                            </thead>
                                        <?php foreach ($stock->stock_products as $key => $StockProducts): ?>
                                            <?php $SP = $StockProducts['_matchingData']['Products']; ?>
                                            <tr id="<?php echo ($id == $SP->id)?'special':''?>">
                                                <td><?php echo 'SP.'.str_pad($SP->id, ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
                                                <td><?= $SP->product_name?></td>
                                                <td><?= number_format($SP->supply_price, DECIMALS); ?></td>
                                                <td><?= $StockProducts->quantity?></td>
                                                <td><?= $StockProducts->discount?></td>
                                                <td><?= 
                                                    number_format($StockProducts->quantity*($SP->supply_price*((100-$StockProducts->discount)/100)), DECIMALS);?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        </table>
                                    </div>
                                    <div class="clearfix divider10"> </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 table-responsive float-right">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>Quantity</td>
                                            <td><?= $stock->total_quantity?></td>
                                        </tr>
                                        <tr>
                                            <td>Total value:</td>
                                            <td><?= number_format($stock->total_price, DECIMALS) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Discount</td>
                                            <td><?= $stock->discount_stock?></td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td><?= number_format($stock->final_price, DECIMALS) ?></td>
                                        </tr>
                                    </table>
                                    </div>
                                    <div class="clearfix divider10"> </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
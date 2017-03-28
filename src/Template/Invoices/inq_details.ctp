
<div id="content">
    <div class="content-page woocommerce">
        <div class="container">
            <div class="cart-content-page">
                <h2 class="title-shop-page"></h2>
                <div class="table-responsive">
                    <table cellspacing="0" class="shop_table cart table">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo __('#'); ?></th>
                                <th class="text-center" style="max-width: 100px;"><?php echo __('Name'); ?></th>
                                <th class="text-center"><?php echo __('Category'); ?></th>
                                <th class="text-center"><?php echo __('Serial No'); ?></th>
                                <th class="text-center"><?php echo __('Type Model'); ?></th>
                                <th class="text-center"><?php echo __('Origin'); ?></th>
                                <th class="text-center"><?php echo __('Price'); ?></th>
                                <th class="text-center"><?php echo __('Quantity'); ?></th>
                                <th class="text-center"><?php echo __('Remark'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0; ?><?php $total_qty = 0; ?>
                            <?php foreach ($inquiry->invoice_products as $key => $inq): ?>
                                <?php $total_qty = $total_qty + $inq->quantity?>
                                <tr class="cart_item cart_item_<?php echo $inq->id; ?>" invoice_product_id="<?php echo $inq->id; ?>">
                                    <td class="text-center">
                                       
                                        <span class="" product_id=""><i class="fa fa-times"></i></span>
                                       
                                    </td>
                                    <td class="text-center">
                                        <?= $this->Html->link($inq['Products']['product_name'], ['controller'=>'pages','action'=>'Products', $inq['Products']['id']], array('escape' => false)); ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $this->Html->link($inq['Categories']['name'], ['controller'=>'pages','action'=>'categoriesParent', $inq['Categories']['id']], array('escape' => false)); ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $inq['Products']['serial_no'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $inq['Products']['type_model'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $inq['Products']['origin'] ?>
                                    </td>
                                   
                                        <td class="text-center">
                                            $ <?= $price = $inq['Products']['retail_price']; ?>
                                            <?php $total = $total+($price*$inq->quantity); ?>
                                        </td>
                                  
                                    <td class="text-center">
                                        <div class="info-qty" id="<?php echo $key; ?>">
                                            <span class="qty-val"><?php echo $inq->quantity ?></span>
                                        </div>          
                                    </td>
                                    <td class="text-center">
                                        <?php echo $inq->remark ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <div class="table-responsive float-right" style="width:412px;">
                        <table class="table table-striped">
                             <tr>
                                <td><b><?php echo __("Quantity"); ?>:</b></td>
                                <td>
                                    <span class="total-price">
                                        <?php echo $total_qty; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><b><?php echo __("Total"); ?>:</b></td>
                                <td>
                                    <span class="total-price">
                                    $ <?php echo $total; ?>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="clearfix"></div><br>
                </div>
            </div>
        </div>  
    </div>
</div>

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
                                <?php if ($orders->status == 2): ?>
                                <th class="text-center"><?php echo __('Price'); ?></th>
                                <?php endif ?>
                                <th class="text-center"><?php echo __('Quantity'); ?></th>
                                <th class="text-center"><?php echo __('Remark'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0; ?>
                            <?php foreach ($orders->invoice_products as $key => $ip): ?>
                                <tr class="cart_item cart_item_<?php echo $ip->id; ?>" invoice_product_id="<?php echo $ip->id; ?>">
                                    <td class="text-center">
                                        <?php if ($orders->status == 2): ?>
                                            <!-- <span class="" product_id=""><i class="fa fa-times"></i></span> -->
                                            <?php echo $key+1 ?>
                                        <?php endif ?>
                                        
                                    </td>
                                    <td class="text-center">
                                        <?= $this->Html->link($ip['products']['product_name'], ['controller'=>'pages','action'=>'products', $ip['products']['id']], array('escape' => false)); ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $this->Html->link($ip['categories']['name'], ['controller'=>'pages','action'=>'categoriesParent', $ip['categories']['id']], array('escape' => false)); ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $ip['products']['serial_no'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $ip['products']['type_model'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $ip['products']['origin'] ?>
                                    </td>
                                     <?php if ($orders->status == 2): ?>
                                         <td class="text-center">
                                        $ <?= $price = ($ip['products']['retail_price']+($ip['products']['retail_price']*$orders->profit)/100); ?>
                                        <?php $total = $total+($price*$ip->quantity); ?>
                                    </td>
                                     <?php endif ?>
                                    
                                    <td class="text-center">
                                        <div class="info-qty" id="<?php echo $key; ?>">
                                            <!-- <a href="#" class="qty-down qty-down-<?php //echo $key; ?>"><i class="fa fa-angle-left"></i></a> -->
                                            <span class="qty-val"><?php echo $ip->quantity ?></span>
                                            <!-- <a href="#" class="qty-up qty-up-<?php //echo $key; ?>"><i class="fa fa-angle-right"></i></a> -->
                                        </div>          
                                    </td>
                                    <td class="text-center">
                                        <textarea class="form-control remark-item" disabled rows="2" cols="30"><?php echo $ip->remark ?></textarea>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                   <?php if ($orders->status == 2): ?>
                        <div class=" table-responsive float-right" style="width:412px;">
                        <table class="table table-striped">
                            <tr>
                                <td><b><?php echo __("Delivery cost"); ?>:</b></td>
                                <td><?= '$ '.$orders->delivery_cost?></td>
                            </tr>
                            <tr>
                                <td><b><?php echo __("Packing cost"); ?>:</b></td>
                                <td><?= '$ '.$orders->packing_cost?></td>
                            </tr>
                            <tr>
                                <td><b><?php echo __("Insurance cost"); ?>:</b></td>
                                <td><?= '$ '.$orders->insurance_cost?></td>
                            </tr>
                            <tr>
                                <td><b><?php echo __("Total"); ?>:</b></td>
                                <td><span class="total-price">
                                    $ <?php echo $total+$orders->delivery_cost+$orders->packing_cost+$orders->insurance_cost  ?>
                                    </span></td>
                            </tr>
                        </table>
                    </div>
                   <?php endif ?>
                    <div class="clearfix"></div><br>
                    <?php if ($orders->status < 2): ?>
                         <button id="save_cart" class="float-right">Update</button>
                    <?php endif ?>
                   
                </div>
            </div>
        </div>  
    </div>
</div>
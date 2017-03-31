
<div id="content">
    <div class="content-page woocommerce">
        <div class="container">
            <div class="cart-content-page">
                <h2 class="title-shop-page"></h2>
                <div class="table-responsive">

                    <!-- <div class="timeline-horizontal-wap">
                        <ul class="timeline timeline-horizontal">
                            <li class="timeline-item">
                                <div class="timeline-badge <?php //echo ($orders->status >= 1)? "success":"default"?>"><i class="glyphicon glyphicon-check"></i></div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-badge <?php //echo ($orders->status >= 2)? "success":"default"?>"><i class="glyphicon glyphicon-check"></i></div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-badge <?php //echo ($orders->status >= 3)? "success":"default"?>"><i class="glyphicon glyphicon-check"></i></div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-badge <?php //echo ($orders->status >= 4)? "success":"default"?>"><i class="glyphicon glyphicon-check"></i></div>
                            </li>
                        </ul>
                    </div> -->
                    
                    <?php if (!empty($orders->invoice_products)): ?>
                    <table cellspacing="0" class="shop_table cart table">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo __('#'); ?></th>
                                <th class="text-center" style="max-width: 100px;"><?php echo __('Name'); ?></th>
                                <th class="text-center"><?php echo __('Category'); ?></th>
                                <th class="text-center"><?php echo __('Serial No'); ?></th>
                                <th class="text-center"><?php echo __('Type Model'); ?></th>
                                <th class="text-center"><?php echo __('Origin'); ?></th>
                                <?php if ($orders->status >= 2): ?>
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
                                        <?php if ($orders->status < 3): ?>
                                            <span class="del-items-order" product_id="<?= $ip->id ?>"><i class="fa fa-times"></i></span>
                                       
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
                                    <?php if ($orders->status >= 2): ?>
                                        <td class="text-center">
                                            $ <?= $price = ($ip['products']['retail_price']+($ip['products']['retail_price']*$orders->profit)/100); ?>
                                            <?php $total = $total+($price*$ip->quantity); ?>
                                        </td>
                                    <?php endif ?>
                                    <?php if ($orders->status < 3): ?>
                                        <td class="text-center">
                                            <div class="info-qty" id="<?php echo $key; ?>">
                                                <a href="#" class="qty-down qty-down-<?php echo $key; ?>"><i class="fa fa-angle-left"></i></a>
                                                <span class="qty-val"><?php echo $ip->quantity ?></span>
                                                <a href="#" class="qty-up qty-up-<?php echo $key; ?>"><i class="fa fa-angle-right"></i></a>
                                            </div>          
                                        </td>
                                        <td class="text-center">
                                            <textarea class="form-control remark-item" rows="2" cols="30"><?php echo $ip->remark ?></textarea>
                                        </td>
                                    <?php else: ?>
                                        <td class="text-center">
                                            <div class="info-qty" id="<?php echo $key; ?>">
                                                <span class="qty-val"><?php echo $ip->quantity ?></span>
                                            </div>          
                                        </td>
                                        <td class="text-center">
                                            <textarea class="form-control" disabled rows="2" cols="30"><?php echo $ip->remark ?></textarea>
                                        </td>
                                    <?php endif ?>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php endif ?>
                  
                   <?php if ($orders->status >= 2): ?>
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
                                <td>
                                    <span class="total-price">
                                        $ <?php echo $total+$orders->delivery_cost+$orders->packing_cost+$orders->insurance_cost  ?>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                   <?php endif ?>
                    
                </div>

            </div>
        </div>  
    </div>
    <?php if (!empty($orders->unavailables)): ?>
        
    
    <div class="col-md-12 item-unavailable">
            <div class="col-md-4">
                <label>Vessel Name</label>
                <input type="text" class="form-control vessel_name" value="<?= $orders->vessel; ?>" name="">
            </div>
            <div class="col-md-4">
                <label>IMO No</label>
                <input type="text" class="form-control imo_no" value="<?= $orders->imo_no; ?>" name="">
            </div>
            <div class="col-md-4">
                
                <label>Maker/Type Ref</label>
                <input type="text" class="form-control maker_type" value="<?= $orders->maker_type; ?>" name="">
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <label>Description</label>
                <textarea class="form-control textarea-available note"><?= $orders->note; ?></textarea>
            </div>
                <div class="clearfix"></div><br>
            <table class="table table-bordered table-color">
                <thead style="background: rgba(77, 101, 101, 0.16);">
                    <tr>
                        <th><?php echo __("Part No*");?></th>
                        <th><?php echo __("Name*");?></th>
                        <th><?php echo __("Model/Serial No");?></th>
                        <th><?php echo __("Quantity*");?></th>
                        <th><?php echo __("Unit");?></th>
                        <th><?php echo __("Remark");?></th>
                    </tr>
                </thead>
                <tbody class="tbody-unavailable">
                <?php foreach ($orders->unavailables as $key => $products): ?>
                    <tr class="tr-unavailable">
                        <td><input type="text" class="form-control part_no" value="<?= $products->part_no?>" name=""></td>
                        <td><input type="text" class="form-control product_name" value="<?= $products->product_name?>" name=""></td>
                        <td><input type="text" class="form-control model_serial_no" value="<?= $products->model_serial_no?>" name=""></td>
                        <td><input type="text" class="form-control quantity" value="<?= $products->quantity?>" name=""></td>
                        <td><input type="text" class="form-control unit" value="<?= $products->quantity?>" name=""></td>
                        <td><textarea class="form-control textarea-available remark"><?= $products->remark?></textarea></td>
                    </tr>
                 <?php endforeach ?>
                </tbody>
            </table>
    </div>
    <div class="clearfix"></div>
    <?php endif ?>
</div>
<?php if ($orders->status <= 2): ?>
    <!-- <button id="save_cart" invoice_id="<?php echo $orders->id ?>" class="float-right" style="margin-right: 10px;">Update</button> -->
<?php endif ?>
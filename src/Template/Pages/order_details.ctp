
<div id="content">
    <div class="content-page woocommerce">
        <div class="container">
            <div class="cart-content-page">
                <h2 class="title-shop-page"></h2>
                <div class="table-responsive">
                    <table cellspacing="0" class="shop_table cart table">
                        <thead>
                            <tr>
                                <th class="text-center product-remove"><?php echo __('#'); ?></th>
                                <th class="text-center product-thumbnail"><?php echo __('Picture'); ?></th>
                                <th class="text-center product-name" style="max-width: 100px;"><?php echo __('Name'); ?></th>
                                <th class="text-center product-subtotal"><?php echo __('Category'); ?></th>
                                <th class="text-center product-thumbnail"><?php echo __('Serial No'); ?></th>
                                <th class="text-center product-subtotal"><?php echo __('Type Model'); ?></th>
                                <th class="text-center product-thumbnail"><?php echo __('Origin'); ?></th>
                                <th class="text-center product-quantity"><?php echo __('Quantity'); ?></th>
                                <th class="text-center product-subtotal"><?php echo __('Remark'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders->invoice_products as $key => $products): ?>
                                <tr>
                                    <td class="text-center product-remove">
                                        <?php echo $key+1; ?>
                                    </td>
                                    <td class="text-center"> <!-- Picture -->
                                        <?= $this->Html->link($this->Html->image($products['Products']['thumbnail'],['width'=>70]), ['controller'=>'pages','action'=>'products',$products['Products']['id']], array('escape' => false)); ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $this->Html->link($products['Products']['product_name'], ['controller'=>'pages','action'=>'products', $products->id], array('escape' => false)); ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $this->Html->link($products['categories']['name'], ['controller'=>'pages','action'=>'products', $products->id], array('escape' => false)); ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $products['Products']['serial_no'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $products['Products']['type_model'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $products['Products']['origin'] ?>
                                    </td>
                                    <td class="text-center product-quantity">
                                        <div class="info-qty">
                                            <span class="qty-val"><?php echo $products->quantity ?></span>
                                        </div>          
                                    </td>
                                    <td class="text-center product-subtotal">
                                        <span class="amount"><textarea class="form-control remark-item" rows="2" cols="30" id="comment"><?php echo $products->remark ?></textarea></span>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
</div>
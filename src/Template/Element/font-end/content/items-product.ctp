
<div role="tabpanel" class="tab-pane fade " id="product-list">
    <ul class="row product-grid live-search-list vertical highlight_list" >
        <?php foreach ($products as $key => $product): ?>
            <li data-search-term="supplier<?= $product->supplier['id'];?> active<?= $key?>" class="supplier-search-<?= $product->supplier['id'];?> supplier-search col-md-3 col-sm-6 col-xs-12">
                <div class="item-product">
                    <div class="product-thumb">
                        <a class="product-thumb-link" href="<?= $this->Url->build(['controller'=>'pages','action'=>'products', $product->id]) ?>">
                        <?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'first-thumb','width' => 193]); ?>
                        <?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'second-thumb','width' => 193]); ?>
                        </a>
                        <div class="product-info-cart">
                            <div class="product-extra-link">
                                <span class="wishlist-link" product_id="<?= $product->id;?>" href="#"><i class="fa fa-heart-o"></i></span>
                                <span class="compare-link" href="#"><i class="fa fa-toggle-on"></i></span>
                                <span class="quickview-link1 fancybox.ajax" href="quick-view.html"><i class="fa fa-search"></i></span>
                            </div>
                            <span class="addcart-link cursor-point" price="<?= $product->retail_price;?>" name="<?= $product->product_name; ?>" product_id="<?= $product->id; ?>" picture="<?php echo $product->images[0]['thumbnail'] ?>">
                                <i class="fa fa-shopping-cart"></i> Add to Cart
                            </span>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="title-product"><?php echo $this->Html->link(ucfirst($product->product_name),[ 'controller' => 'Pages',  'action' => 'products',$product->id]) ?></h3>
                    </div>
                </div>
            </li>
        <?php endforeach ?>
    </ul>
</div>
<div role="tabpanel" class="tab-pane fade in active" id="product-grid">
    <ul class="product-list vertical highlight_list">
        <?php foreach ($products as $key => $product): ?>

            <li data-search-term="supplier<?= $product->supplier['id'];?> active<?= $key?>" class="supplier-search-<?= $product->supplier['id'];?> supplier-search">
                <div class="item-product">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="product-thumb">
                                <a class="product-thumb-link" href="<?= $this->Url->build(['controller'=>'pages','action'=>'products', $product->id]) ?>">
                                    <?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'first-thumb']); ?>
                                    <?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'second-thumb']); ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <div class="product-info">
                                <h3 class="title-product"><?php echo $this->Html->link($product->product_name,[ 'controller' => 'Pages',  'action' => 'products',$product->id]) ?> </h3>
                                <table class="table table-hover" style=" max-width: 73%;">
                                    <tbody>
                                        <tr class="info-category">
                                            <td><b> <?php echo __("Maker's name") ?>:</b></td>
                                            <td><?= $product->supplier['name'] ?></td>
                                        </tr>
                                        <tr class="info-category">
                                            <td><b> <?php echo __("Categories") ?>:</b></td>
                                            <td><?= $product->category['name']?></td>
                                        </tr>
                                        <tr class="info-category">
                                            <td><b> <?php echo __("Part No") ?>:</b></td>
                                            <td><?= $product->sku; ?></td>
                                        </tr>
                                        <tr class="info-category">
                                            <td><b> <?php echo __("Availability") ?>:</b></td>
                                            <td>In stock</td>
                                        </tr>
                                        <tr class="info-category">
                                            <td><b> <?php echo __("Serial No") ?>:</b></td>
                                            <td><?= $product->serial_no ?></td>
                                        </tr>
                                        <tr class="info-category">
                                            <td><b> <?php echo __("Type Model") ?>:</b></td>
                                            <td><?= $product->type_model; ?></td>
                                        </tr>
                                         <tr class="info-category">
                                            <td><b> <?php echo __("Quantity") ?>:</b></td>
                                            <td><?= $product->quantity; ?></td>
                                        </tr>
                                         <tr class="info-category">
                                            <td><b> <?php echo __("Origin") ?>:</b></td>
                                            <td><?= $product->origin; ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                                 <label><b> <?php echo __("Remark") ?>:</b> </label>
                            <p class="product-description"><?= $product->short_description; ?> </p>
                                <div class="product-info-cart">
                                    <span class="addcart-link cursor-point" price="<?= $product->retail_price;?>" name="<?= $product->product_name; ?>" product_id="<?= $product->id; ?>" picture="<?php echo $product->images[0]['thumbnail'] ?>">
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </span>
                                   
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach ?>
    </ul>
</div>
<div role="tabpanel" class="tab-pane fade in active" id="product-grid">
    <ul class="row product-grid live-search-list vertical highlight_list" >
    <?php foreach ($products as $key => $product): ?>
        <li data-search-term="supplier<?= $product->supplier['id'];?> active<?= $key?>" class="supplier-search-<?= $product->supplier['id'];?> supplier-search col-md-3 col-sm-6 col-xs-12">
            <div class="item-product">
                <div class="product-thumb">
                    <a class="product-thumb-link" href="../products/<?= $product->id?>">
                    <?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'first-thumb','width' => 193]); ?>
                    <?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'second-thumb','width' => 193]); ?>
                    </a>
                    <div class="product-info-cart">
                        <div class="product-extra-link">
                            <a class="wishlist-link" href="#"><i class="fa fa-heart-o"></i></a>
                            <a class="compare-link" href="#"><i class="fa fa-toggle-on"></i></a>
                            <a class="quickview-link fancybox.ajax" href="quick-view.html"><i class="fa fa-search"></i></a>
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
    <!-- End Sort Pagibar -->
</div>
<div role="tabpanel" class="tab-pane fade" id="product-list">
    <ul class="product-list vertical highlight_list">
        <?php foreach ($products as $key => $product): ?>
         <li data-search-term="supplier<?= $product->supplier['id'];?> active<?= $key?>" class="supplier-search-<?= $product->supplier['id'];?> supplier-search">
            <div class="item-product">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="product-thumb">
                            <a class="product-thumb-link" href="../pages/products/<?= $product->id?>">
                                <?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'first-thumb']); ?>
                                <?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'second-thumb']); ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="product-info">
                            <h3 class="title-product"><?php echo $this->Html->link($product->product_name,[ 'controller' => 'Pages',  'action' => 'products',$product->id]) ?> </h3>
                           <div class="info-category">
                                <label><b>Maker's name:</b> </label> 
                                <span><?php echo $this->Html->link($product->supplier['name'],['controller'=>'Pages','action'=>'Categories',$product->category['id']])?></span>
                            </div>
                            <div class="info-category">
                                <label><b>Categories:</b> </label> 
                                <span><?php echo $this->Html->link($product->category['name'],['controller'=>'Pages','action'=>'Categories',$product->category['id']])?></span>
                            </div>
                            <div class="info-category">
                                <label><b>Part No: </b></label> 
                                <span><?php echo $product->sku; ?></span>
                            </div>
                            <div class="info-category">
                                <label><b>Availability:</b> </label> <span>In stock</span>
                            </div>
                            <div class="info-category">
                                <label>Serial No: </label> <span><?php echo $product->serial_no ?></span>
                            </div>
                            <div class="info-category">
                                <label>Type Model: </label> <span><?php echo $product->type_model ?></span>
                            </div>
                            <div class="info-category">
                                <label>Quantity: </label> <span><?php echo $product->quantity ?></span>
                            </div>
                            <div class="info-category">
                                <label>Origin: </label> <span><?php echo $product->origin ?></span>
                            </div>
                            <div class="product-info-cart">
                                <span class="addcart-link cursor-point" price="<?= $product->retail_price;?>" name="<?= $product->product_name; ?>" product_id="<?= $product->id; ?>" picture="<?php echo $product->images[0]['thumbnail'] ?>">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </span>
                               
                            </div>
                        </div>
                        <label><b>Remark:</b> </label> <div class="clearfix"></div>
                        <p class="product-description"><?= $product->short_description; ?> </p>
                    </div>
                </div>
            </div>
        </li>
        <?php endforeach ?>
    </ul>
</div>
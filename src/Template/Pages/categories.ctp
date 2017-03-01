
<div class="row">
    <div class="col-md-3 col-sm-4 col-xs-12">
        <?php echo $this->element('font-end/sidebar-left') ?>
    </div>
    <div class="col-md-9 col-sm-8 col-xs-12">
       <div class="main-content-shop">
            <div class="banner-shop-slider">
                <div class="wrap-item" data-navigation="true" data-pagination="false" data-itemscustom="[[0,1]]">
                   
                    <div class="item">
                        <div class="item-shop-slider">
                            <div class="shop-slider-thumb">
                                <a href="#"><?php echo $this->Html->image('assets/images/bn2.jpg') ?></a>
                            </div>
                            <div class="shop-slider-info">
                                <h3>jewelry-bracelets</h3>
                                <h2>exta 35% off </h2>
                                <a href="#" class="shop-now">shop now</a>
                            </div>
                        </div>
                    </div>
                   
                    <div class="item">
                        <div class="item-shop-slider">
                            <div class="shop-slider-thumb">
                                <a href="#"><?php echo $this->Html->image('assets/images/bn5.jpg') ?></a>
                            </div>
                            <div class="shop-slider-info">
                                <h3>jewelry-bracelets</h3>
                                <h2>exta 35% off </h2>
                                <a href="#" class="shop-now">shop now</a>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <!-- End Banner Slider -->
           
            <div class="shop-tab-product">
                <div class="shop-tab-title">
                    <h2></h2>
                    <ul class="shop-tab-select">
                        <li class="active"><a href="#product-grid" class="grid-tab" data-toggle="tab"></a></li>
                        <li><a href="#product-list" class="list-tab" data-toggle="tab"></a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="product-grid">
                        <ul class="row product-grid live-search-list vertical highlight_list" >
                        <?php foreach ($products as $key => $product): ?>
                            <li data-search-term="supplier<?= $product->supplier['id'];?> active<?= $key?>" class="col-md-3 col-sm-6 col-xs-12">
                                <div class="item-product">
                                    <div class="product-thumb">
                                        <a class="product-thumb-link" href="../../pages/products/<?= $product->id?>">
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
                                       <!--  <div class="info-price">
                                            <span><?php //echo number_format($product->retail_price, DECIMALS)?></span>
                                            <del>$17.96</del> 
                                        </div> -->
                                       
                                    </div>
                                </div>
                            </li>
                        <?php endforeach ?>
                        </ul>
                        <!-- <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="sort-pagi-bar">
                                    <div class="product-order">
                                        <a href="#" class="product-order-toggle">Position</a>
                                        <ul class="product-order-list">
                                            <li><a href="#">Name</a></li>
                                            <li><a href="#">Price</a></li>
                                        </ul>
                                    </div>
                                    <div class="product-per-page">
                                        <a href="#" class="per-page-toggle">show <span>6</span></a>
                                        <ul class="per-page-list">
                                            <li><a href="#">6</a></li>
                                            <li><a href="#">9</a></li>
                                            <li><a href="#">12</a></li>
                                            <li><a href="#">18</a></li>
                                            <li><a href="#">24</a></li>
                                        </ul>
                                    </div>
                                    <div class="product-pagi-nav">
                                        <a href="#" class="active">1</a>
                                        <a href="#">2</a>
                                        <a href="#">3</a>
                                        <a href="#" class="next">next <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- End Sort Pagibar -->
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="product-list">
                        <ul class="product-list vertical highlight_list">
                            <?php foreach ($products as $key => $product): ?>

                            <li  data-search-term="supplier<?= $product->supplier['id'];?> active<?= $key?>">
                                <div class="item-product">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <div class="product-thumb">
                                                <a class="product-thumb-link" href="../../pages/products/<?= $product->id?>">
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
                                                    <!-- <div class="product-extra-link">
                                                        <a class="wishlist-link" href="#"><i class="fa fa-heart-o"></i></a>
                                                        <a class="compare-link" href="#"><i class="fa fa-toggle-on"></i></a>
                                                        <a class="quickview-link fancybox.ajax" href="quick-view.html"><i class="fa fa-search"></i></a>
                                                    </div> -->
                                                </div>
                                            </div>
                                           <!--  <label><b>Remark:</b> </label> <div class="clearfix"></div>
                                            <p class="product-description"><?= $product->short_description; ?> </p> -->
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach ?>
                        </ul>
                        <!-- <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="sort-pagi-bar">
                                    <div class="product-order">
                                        <a href="#" class="product-order-toggle">Position</a>
                                        <ul class="product-order-list">
                                            <li><a href="#">Name</a></li>
                                            <li><a href="#">Price</a></li>
                                        </ul>
                                    </div>
                                    <div class="product-per-page">
                                        <a href="#" class="per-page-toggle">show <span>6</span></a>
                                        <ul class="per-page-list">
                                            <li><a href="#">6</a></li>
                                            <li><a href="#">9</a></li>
                                            <li><a href="#">12</a></li>
                                            <li><a href="#">18</a></li>
                                            <li><a href="#">24</a></li>
                                        </ul>
                                    </div>
                                    <div class="product-pagi-nav">
                                        <a href="#" class="active">1</a>
                                        <a href="#">2</a>
                                        <a href="#">3</a>
                                        <a href="#" class="next">next <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- End Sort Pagibar -->
                    </div>
                </div>
            </div>
            <!-- End Shop Tab -->
        </div>
        <!-- End Main Content Shop -->
    </div>
</div>


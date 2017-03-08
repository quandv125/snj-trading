<div class="row">
    <div class="col-md-3 col-sm-4 col-xs-12 ">
        <div class="sidebar-shop sidebar-left ">
			<?php echo $this->element('font-end/Pages/menu_account_info') ?>
        </div>
       
    </div>
    <div class="col-md-9 col-sm-8 col-xs-12 wapper-content">
       <div class="main-content-shop ">
           <div class="shop-tab-title">
                    <h3><?php echo 'Wishlists' ?></h3>
                    <ul class="shop-tab-select">
                        <li class="active"><a href="#product-grid" class="grid-tab" data-toggle="tab"></a></li> 
                        <li><a href="#product-list" class="list-tab" data-toggle="tab"></a></li>
                    </ul>
                </div>    
                 <div class="tab-content">            
                <div role="tabpanel" class="tab-pane fade in active" id="product-grid">
                    <ul class="row product-grid live-search-list vertical highlight_list" >
                    <?php foreach ($wishlists as $key => $product): ?>
                       
                        <li id="item-product-<?= $product->id?>" class="col-md-3 col-sm-6 col-xs-12">
                           
                            <div class="item-product show-image ">
                             <span class="btn btn-danger delete-wishlist" id="<?= $product->id?>"><i class="fa fa-trash-o" aria-hidden="true"></i> </span>
                                <div class="product-thumb">
                                    <a class="product-thumb-link" href="<?= $this->Url->build(['controller'=>'pages','action'=>'products', $product->products['id']]) ?>">
                                        <?php echo $this->Html->image($product->products['thumbnail'],['class'=>'first-thumb','width' => 193]); ?>
                                        <?php echo $this->Html->image($product->products['thumbnail'],['class'=>'second-thumb','width' => 193]); ?>
                                    </a>
                                    <div class="product-info-cart">
                                        <div class="product-extra-link">
                                            <span class="wishlist-link1" product_id="<?= $product->products['id'];?>" href="#">
                                                <i class="fa fa-heart-o"></i>
                                            </span>
                                            <span class="compare-link" href="#"><i class="fa fa-toggle-on"></i></span>
                                            <span class="quickview-link1 fancybox.ajax" href="quick-view.html"><i class="fa fa-search"></i></span>
                                        </div>
                                        <span class="addcart-link cursor-point" name="<?= $product->products['product_name']; ?>" product_id="<?= $product->products['id']; ?>" picture="<?php echo $product->products['thumbnail'] ?>">
                                            <i class="fa fa-shopping-cart"></i> Add to Cart
                                        </span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h3 class="title-product"><?php echo $this->Html->link(ucfirst($product->products['product_name']),[ 'controller' => 'Pages',  'action' => 'products',$product->products['id']]) ?></h3>
                                </div>
                            </div>

                        </li>
                    <?php endforeach ?>
                    </ul>
                    <!-- End Sort Pagibar -->
                </div>
                
                <div role="tabpanel" class="tab-pane fade" id="product-list">
                    <ul class="product-list vertical highlight_list">
                        <?php foreach ($wishlists as $key => $product): ?>
                         <li class="item-product-<?= $product->id?>">
                            <div class="item-product">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="product-thumb">
                                            <a class="product-thumb-link" href="<?= $this->Url->build(['controller'=>'pages','action'=>'products', $product->products['id']]) ?>">
                                                <?php echo $this->Html->image($product->products['thumbnail'],['class'=>'first-thumb','width' => 193]); ?>
                                                <?php echo $this->Html->image($product->products['thumbnail'],['class'=>'second-thumb','width' => 193]); ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <div class="product-info">
                                            <h3 class="title-product"><?php echo $this->Html->link($product->products['product_name'],[ 'controller' => 'Pages', 'action' => 'products',$product->products['id']]) ?> </h3>
                                           <div class="info-category">
                                                <label><b>Maker's name:</b> </label> 
                                                <span><?php echo $this->Html->link($product->Suppliers['name'],['controller'=>'Pages','action'=>'Categories',$product->category['id']])?></span>
                                            </div>
                                            <div class="info-category">
                                                <label><b>Categories:</b> </label> 
                                                <span><?php echo $this->Html->link($product->Categories['name'],['controller'=>'Pages','action'=>'Categories',$product->Categories['id']])?></span>
                                            </div>
                                            <div class="info-category">
                                                <label><b>Part No: </b></label> 
                                                <span><?php echo $product->products['sku']; ?></span>
                                            </div>
                                            <div class="info-category">
                                                <label><b>Availability:</b> </label> <span>In stock</span>
                                            </div>
                                            <div class="info-category">
                                                <label>Serial No: </label> <span><?php echo $product->products['serial_no'] ?></span>
                                            </div>
                                            <div class="info-category">
                                                <label>Type Model: </label> <span><?php echo $product->products['type_model'] ?></span>
                                            </div>
                                            <div class="info-category">
                                                <label>Quantity: </label> <span><?php echo $product->products['quantity'] ?></span>
                                            </div>
                                            <div class="info-category">
                                                <label>Origin: </label> <span><?php echo $product->products['origin'] ?></span>
                                            </div>
                                            <div class="product-info-cart">
                                                <span class="addcart-link cursor-point" name="<?= $product->products['product_name']; ?>" product_id="<?= $product->products['id']; ?>" picture="<?php echo $product->products['thumbnail'] ?>">
                                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                                </span>
                                                <br/>
                                                 <span class="addcart-link cursor-point delete-wishlist" id="<?= $product->id; ?>" >
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
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
            </div>
        </div>
        <!-- End Main Content Shop -->
    </div>
</div>


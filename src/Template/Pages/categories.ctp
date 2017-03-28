
<div class="row">
    <div class="col-md-3 col-sm-4 col-xs-12">
          <?php echo $this->element('font-end/sidebar-left',['type' => 'categories']) ?>
    </div>
    <div class="col-md-9 col-sm-8 col-xs-12">
       <div class="main-content-shop">
            <!-- <div class="banner-shop-slider">
                <div class="wrap-item" data-navigation="true" data-pagination="false" data-itemscustom="[[0,1]]">
                    <div class="item">
                        <div class="item-shop-slider">
                            <div class="shop-slider-thumb">
                                <a href="#"><?php //echo $this->Html->image('assets/images/bn2.jpg') ?></a>
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
                                <a href="#"><?php //echo $this->Html->image('assets/images/bn5.jpg') ?></a>
                            </div>
                            <div class="shop-slider-info">
                                <h3>jewelry-bracelets</h3>
                                <h2>exta 35% off </h2>
                                <a href="#" class="shop-now">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- End Banner Slider -->
            <div class="shop-tab-product">
                <div class="shop-tab-title">
                    <h2>  <?php echo ($info->name) ?></h2>
                    <ul class="shop-tab-select">
                        <li class="active"><a href="#product-grid" class="grid-tab" data-toggle="tab"></a></li>
                        <li><a href="#product-list" class="list-tab" data-toggle="tab"></a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <?php echo $this->element('font-end/content/items-product') ?>
                </div>
            </div>
        </div>
    </div>
</div>


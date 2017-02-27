<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="main-content-shop">
          <?php echo $this->element('font-end/shipping') ?>
           
            <!-- End List Shop Cat -->
            <div class="shop-tab-product">
               
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="product-grid">
                        <ul class="row product-grid">
                        <?php foreach ($cat_list as $key => $category): ?>
                            
                            <li class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item-category">
                                    <div class="col-md-6 col-sm-6 zoom-image-thumb">
                                            <?php echo $this->Html->link($this->Html->image($category->picture), ['controller'=>'Pages','action'=>'categories',$category->id], array('escape' => false)); ?>
                                        </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="wapper-category">
                                            <div class="list-cat-mega-menu">
                                                <h2 class="title-cat-mega-menu"> <?= $this->Html->link($category->name, ['controller'=>'Pages','action'=>'categories',$category->id]); ?></h2>
                                                <ul>
                                                    <?php foreach ($category->children as $key => $children): ?>
                                                        <li><?= $this->Html->link($children->name, ['controller'=>'Pages','action'=>'categories',$children->id]); ?></li>
                                                    <?php endforeach ?>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach ?>
                        </ul>
                        <!-- End Sort Pagibar -->
                    </div>
                </div>
                <!-- <div class="shop-tab-title">
                    <h2></h2>
                    <ul class="shop-tab-select">
                        <li class="active"><a href="#product-grid" class="grid-tab" data-toggle="tab"></a></li>
                        <li><a href="#product-list" class="list-tab" data-toggle="tab"></a></li>
                    </ul>
                </div> -->
             
            </div>
            <!-- End Shop Tab -->
        </div>
        <!-- End Main Content Shop -->
    </div>
</div>
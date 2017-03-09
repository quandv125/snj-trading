
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12 hidden-sm hidden-xs">
        <div class="wrap-category-hover4">
            <div class="inner-category-hover4">
                <h2 class="title-category-hover"><span><?php echo __('Categories') ?></span></h2>
                <ul class="list-category-hover">
                    <?php foreach ($categories as $key => $category): ?>

                        <li class="<?php if (isset($category->children) && !empty($category->children)){echo 'has-cat-mega';} ?>">
                            <?php echo $this->Html->link($category->name,[ 'controller' => 'Pages',  'action' => 'categories_parent',$category->id]) ?>
                            <?php if (isset($category->children) && !empty($category->children)): ?>
                                <div class="cat-mega-menu cat-mega-style1">
                                <div class="row">
                                    <div class="col-md-9">
                                        <?php foreach ($category->children as $children): ?>
                                            <div class="col-md-4 col-sm-3">
                                                <div class="list-cat-mega-menu">
                                                    <h2 class="title-cat-mega-menu"><?php echo $this->Html->link($children->name,[ 'controller' => 'Pages', 'action' => 'categories',$children->id]) ?></h2>
                                                    <ul>
                                                        <?php if (!empty($children->children)): ?>
                                                            <?php foreach ($children->children as $key => $c): ?>
                                                                <li>
                                                                <?= $this->Html->link($c->name,['controller'=>'Pages','action'=>'categories',$c->id]) ?>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                    <div class="col-md-3">
                                        <?php if (!empty($category->picture) && isset($category->children) && !empty($category->children)): ?>
                                            <div class="zoom-image-thumb" style="border: 1px solid #e4e4e4; border-radius: 10px;">
                                                <a href="#"><?php echo $this->Html->image($category->picture)  ?></a>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div> 
                            <?php endif ?>
                        </li>
                    <?php endforeach ?>
                </ul>
                <a class="expand-list-link" href="#"></a>
            </div>
        </div>
    </div>

    <!-- SLIDESHOW -->
    <div class="col-md-9 col-sm-8 col-xs-12">
        <div class="banner-home4 simple-owl-slider">
            <div class="wrap-item" data-navigation="true" data-autoplay="true" data-pagination="false" data-itemscustom="[[0,1]]">
                
                <div class="item-banner4">
                    <div class="banner-thumb">
                        <a href="#"><?php echo $this->Html->image('assets/images/slide21-1.jpg') ?></a>
                    </div>
                    <div class="banner-info">
                        <h2>Pizza Hut - Royal City</h2>
                        <h3>Disscount 30% off</h3>
                    </div>
                </div>
                <div class="item-banner4">
                    <div class="banner-thumb">
                        <a href="#"><?php echo $this->Html->image('assets/images/slide21-2.jpg') ?></a>
                    </div>
                    <div class="banner-info">
                        <h2>Pizza Hut - Royal City</h2>
                        <h3>Disscount 30% off</h3>
                    </div>
                </div>
                <div class="item-banner4">
                    <div class="banner-thumb">
                        <a href="#"><?php echo $this->Html->image('assets/images/slide21-3.jpg') ?></a>
                    </div>
                    <div class="banner-info">
                        <h2>Pizza Hut - Royal City</h2>
                        <h3>Disscount 30% off</h3>
                    </div>
                </div>
                <div class="item-banner4">
                    <div class="banner-thumb">
                        <a href="#"><?php echo $this->Html->image('assets/images/slide21-1.jpg') ?></a>
                    </div>
                    <div class="banner-info rotate-text">
                        <h2>Glasse for Men’s</h2>
                        <h3>Model 2016</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
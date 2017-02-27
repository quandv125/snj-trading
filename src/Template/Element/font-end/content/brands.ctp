<div class="col-md-3 col-sm-4 col-xs-12">
    <div class="sidebar-cat-brand">
        <h2 class="title-special">brands</h2>
        <div class="category-brand-slider">
            <div class="wrap-item" data-pagination="false" data-autoplay="true" data-navigation="true" data-itemscustom="[[0, 1]]">
                <div class="item">
                    <div class="item-category-brand">
                        <a href="#"><?php echo $this->Html->image('assets/images/pn18.png') ?></a>
                    </div>
                </div>
                <div class="item">
                    <div class="item-category-brand">
                        <a href="#"><?php echo $this->Html->image('assets/images/pn19.png') ?></a>
                    </div>
                </div>
                <div class="item">
                    <div class="item-category-brand">
                        <a href="#"><?php echo $this->Html->image('assets/images/pn20.png') ?></a>
                    </div>
                </div>
                <div class="item">
                    <div class="item-category-brand">
                        <a href="#"><?php echo $this->Html->image('assets/images/pn21.png') ?></a>
                    </div>
                </div>
                <div class="item">
                    <div class="item-category-brand">
                        <a href="#"><?php echo $this->Html->image('assets/images/pn22.png') ?></a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-cat-childrent">
            <?php foreach ($brands as $key => $brand): ?>
                <li class="<?php if($key == 0) echo 'active' ?>">
                    <a data-toggle="tab" href="#s<?php echo $key;?>"><?php echo $brand->name ?></a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>
<div class="col-md-9 col-sm-8 col-xs-12">
    <div class="tab-content">
        <?php foreach ($brands as $key => $brand): ?>
        <div role="tabpanel" class="tab-pane fade <?php if($key == 0) echo "in active"; ?>" id="s<?php echo $key;?>">
            <div class="brand-cat-slider slider-home5">
                <div class="wrap-item" data-pagination="false" data-autoplay="true" data-navigation="true" data-itemscustom="[[0, 1],[480, 2],[768, 1],[992, 2],[1200,3]]">
                    <?php echo $this->element('font-end/content/items',['products'=> $brand->products]) ?>
                </div>
            </div>  
        </div>
        <?php endforeach ?>
    </div>
</div>
<div class="sidebar-shop sidebar-left">

    <div class="widget widget-filter">
        <div class="box-filter">
            <h2 class="widget-title"><?php echo __('Search') ?></h2>
            <ul>
                <li> 
                    <input id="search-highlight" class="form-control" name="search-highlight" placeholder="Products Name" type="text" data-list=".highlight_list" autocomplete="off">
                </li>
                <br/>
                <!-- <li>
                    <?php //echo __("Maker' Name") ?>
                    <select class="live-search-box form-control">
                    <option value="all">All</option>
                    <?php //foreach ($suppliers as $key => $supplier): ?>
                        <option value="supplier<?php //echo $key?>"><?php //echo $supplier; ?></option>
                    <?php //endforeach ?>
                    </select>
                </li> -->
               <!--  <li> 
                    <div class="sidebar-left sidebar-post">
                        <div class="widget widget-post-cat">
                             <?php// foreach ($suppliers as $key => $supplier): ?>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" id="<?php //echo $key?>" class="custom-control-input">
                                    <?php// echo $supplier; ?>
                                </label>
                               <br/>
                            <?php// endforeach ?>
                        </div>
                    </div>
                </li> -->
            </ul>
        </div>
    </div>

    <?php if ($type == 'categories' ): ?>
        <div class="sidebar-left sidebar-post">
            <div class="widget widget-post-cat">
                <h2 class="widget-title"><?php echo __('Categoties') ?></h2>
                <ul>
                    <?php foreach ($category as $key => $c): ?>
                        <li>
                        <?php echo $this->Html->link($c->name.'<span>('.count($c->products).')</span>',['controller' => 'pages','action' => 'categories', $parent_id,$c->id],['escape' => false]) ?>
                            <ul class="sub-widget-post-cat">
                                <?php if (!empty($c->children)): ?>
                                    <?php foreach ($c->children as $key => $children): ?>
                                        <li>
                                            <?php echo $this->Html->link($children->name.'<span>('.count($children->products).')</span>',['controller' => 'pages','action' => 'categories', $parent_id,$children->id],['escape' => false]) ?>
                                        </li>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </ul>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    <?php endif ?>

    <div class="divider25"></div>
    
   
    <div class="widget widget-adv">
        <h2 class="title-widget-adv">
            <span>Week</span>
            <strong>big sale</strong>
        </h2>
        <div class="wrap-item" data-navigation="false" data-pagination="true" data-itemscustom="[[0,1]]">
            <div class="item">
                <div class="item-widget-adv">
                    <div class="adv-widget-thumb">
                        <?php echo $this->Html->image('assets/images/sl1.jpg') ?>
                    </div>
                    <div class="adv-widget-info">
                        <h3>New Collection</h3>
                        <h2><span>from</span> 40% off</h2>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="item-widget-adv">
                    <div class="adv-widget-thumb">
                        <?php echo $this->Html->image('assets/images/sl2.jpg') ?>
                    </div>
                    <div class="adv-widget-info">
                        <h3>Quality usinesswear </h3>
                        <h2><span>from</span> 30% off</h2>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="item-widget-adv">
                    <div class="adv-widget-thumb">
                        <?php echo $this->Html->image('assets/images/sl3.jpg') ?>
                    </div>
                    <div class="adv-widget-info">
                        <h3>Hanbags Style 2016</h3>
                        <h2><span>from</span> 20% off</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
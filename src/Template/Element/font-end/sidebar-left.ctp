<div class="sidebar-shop sidebar-left">

    <div class="widget widget-filter">
        <div class="box-filter">
            <h2 class="widget-title"><?php echo __('Search') ?></h2>
            <ul>
                <li> 
                    <input id="search-highlight" class="form-control" name="search-highlight" placeholder="Products Name" type="text" data-list=".highlight_list" autocomplete="off">
                </li>
                <br/>
                <li>
                    <?php echo __("Maker' Name") ?>
                    <select class="live-search-box form-control">
                    <option value="all">All</option>
                    <?php foreach ($suppliers as $key => $supplier): ?>
                        <option value="supplier<?= $key?>"><?php echo $supplier; ?></option>
                    <?php endforeach ?>
                    </select>
                </li>
            </ul>
        </div>
    </div>
    <?php if ($type == 'categories'): ?>
        <div class="sidebar-left sidebar-post">
            <div class="widget widget-post-cat">
                <h2 class="widget-title"><?php echo __('Categoties') ?></h2>
                <ul>
                     <?php foreach ($category as $key => $category1): ?>
                        <li>
                        <?php echo $this->Html->link($category1->name.'<span>('.count($category1->products).')</span>',['controller' => 'pages','action' => 'categories', $parent_id,$category1->id],['escape' => false]) ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    <?php endif ?>

    <div class="sidebar-left sidebar-post">
        <div class="widget widget-post-cat">
             <?php foreach ($suppliers as $key => $supplier): ?>
                <label class="custom-control custom-checkbox">
                    <input type="checkbox" id="<?= $key?>" class="custom-control-input">
                    <?php echo $supplier; ?>
                </label>
               <br/>
            <?php endforeach ?>
        </div>
    </div>
 
    
   

    <div class="divider25"></div>
  
    <!-- <div class="widget widget-filter">
        <div class="box-filter category-filter">
            <h2 class="widget-title">CATEGORY</h2>
            <ul>
                <li><a href="#"> Maxi Dresses (32)</a></li>
                <li><a href="#"> Vintage Dresses (15)</a></li>
                <li><a href="#"> Bodycon Dresses (24)</a></li>
                <li><a href="#"> Fit & Flare Dresses (8)</a></li>
            </ul>
        </div>
        
        <div class="box-filter price-filter">
            <h2 class="widget-title">price</h2>
            <div class="inner-price-filter">
                <ul>
                    <li><a href="#">$ Under-10 (29)</a></li>
                    <li><a href="#">$ 10-20 (29)</a></li>
                    <li><a href="#">$ 20-40 (29)</a></li>
                    <li><a href="#">$ 40-50 (29)</a></li>
                    <li><a href="#">$ 50-80 (29)</a></li>
                </ul>
                <div class="range-filter">
                    <label>$</label>
                    <div id="amount"></div>
                    <button class="btn-filter">Filter</button>
                    <div id="slider-range"></div>
                </div>
            </div>
        </div>
        
       
        <div class="box-filter manufacturer-filter">
            <h2 class="widget-title">Manufacturers</h2>
            <ul>
                <li><a href="#">D&D Fashion</a></li>
                <li><a href="#">London Fashion</a></li>
                <li><a href="#">Milanno Fashion</a></li>
                <li><a href="#">Gucci</a></li>
                <li><a href="#">CK Fashion</a></li>
            </ul>
        </div>
        
    </div> -->
        <!-- End Filter -->
   
    
    <div class="widget widget-adv">
        <h2 class="title-widget-adv">
            <span>Week</span>
            <strong>big sale</strong>
        </h2>
        <div class="wrap-item" data-navigation="false" data-pagination="true" data-itemscustom="[[0,1]]">
            <div class="item">
                <div class="item-widget-adv">
                    <div class="adv-widget-thumb">
                        <a href="#"><!-- <img src="images/grid/sl1.jpg" alt="" /> --></a>
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
                        <a href="#"><!-- <img src="images/grid/sl2.jpg" alt="" /> --></a>
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
                        <a href="#"><!-- <img src="images/grid/sl3.jpg" alt="" /> --></a>
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
    <!-- End Adv -->
</div>
<!-- End Sidebar Shop -->
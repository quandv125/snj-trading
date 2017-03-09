
    <div class="col-md-3 col-sm-2 col-xs-3">
        <div class="title-category-dropdown-hover category-dropdown1 category-dropdown8">
            <h2 class="title-category-dropdown "><span><?php echo __('Categories') ?></span></h2>
            <div class="wrap-category-dropdown wrap-category-dropdown-hover" style="border: 1px solid #e4e4e4; margin-left: 15px;">
                <ul class="list-category-dropdown8">
                     <?= $this->element('font-end/Pages/vertical_menu',['categories' => $categories]); ?>
                </ul>
                <a class="expand-category-link8" href="#">All</a>
            </div>
        </div>
    </div>
    <div class="col-md-7 col-sm-8 col-xs-9">
        <div class="smart-search search-form14">
             <?php echo $this->element('font-end/smart-search',['class'=>'smart-search-fixed']) ?>
        </div>
    </div>
    <div class="col-md-2 col-sm-2 hidden-xs">
        <?php echo $this->element('font-end/cart') ?>
    </div>
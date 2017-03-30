
<div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified" role="tablist">
        <li role="presentation" class="active">
            <a href="#tab1" class="bold" role="tab" data-toggle="tab"><?php echo __("Infomations") ?></a>
        </li>
        <li role="presentation">
            <a href="#tab2" class="bold" role="tab" data-toggle="tab"><?php echo __("Descriptions"); ?></a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active fade in" id="tab1">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <article class="product-title"><?php echo $products->product_name; ?></article>
            </div>
            <div class="clearfix"></div>
            <div class="content">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="col-lg-9 text-center">
                        <?= $this->Html->image($products->thumbnail,['class'=>'image-border img-responsive','width'=>200]) ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="table-responsive table-products">
                        <table class="table table-striped">
                            <tr>
                                <td class="bold"><?php echo __('SKU/Part No')?></td>
                                <td><?= PRODUCT.str_pad($products->sku, ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
                            </tr>
                            <tr>
                                <td class="bold"><?php echo  __('Category')?></td>
                                <td><?= $products->category->name?></td>
                            </tr>
                            <tr>
                                <td class="bold"><?php echo  __('Sold By')?></td>
                                <td><?= $products->user->username?></td>
                            </tr>
                            <tr>
                                <td class="bold"><?php echo __('Serial No') ?>:</td>
                                <td><?= $products->serial_no ?></td>
                            </tr>
                            <tr>
                                <td class="bold"><?php echo __('Type Model')?>:</td>
                                <td><?= $products->type_model ?></td>
                            </tr>
                            <tr>
                                <td class="bold"><?php echo __('Origin') ?>:</td>
                                <td><?= $products->origin ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 proInfo">
                    <div class="description-products">
                        <h5><?php echo __('Remark/Descriptions') ?></h5><div class="divider10"></div>
                        <div class="content-description">
                            <?= $products->short_description; ?>
                        </div>
                    </div>
                </div>
                <div class="clearfix divider10"> </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab2">
            <?= $products->description; ?>
        </div>
    </div>
</div>  

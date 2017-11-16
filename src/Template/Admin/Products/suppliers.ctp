
<div class="row">
    <div class="col-lg-12 col-md-12 panel panel-white">
        <div class="col-lg-2 col-md-2 col-sm-3">
        <!-- Searchbox -->
           <?= $this->element('Products/searchbox_product',['categories' => $categories]); ?>
        </div>
        <!-- col-lg-3 -->
        <div class="col-lg-10 col-md-10 col-sm-9">
            <div class="panel-heading clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    Products
                </div> 
                <!-- col-lg-8 -->
                <div class="col-lg-4 col-md-4 col-md-4 col-xs-4">
                    <!-- Add new products -->
                   <?= $this->element('Products/index_add',['categories' => $categories]) ?>
                </div> 
                <!-- col-lg-4 -->
            </div> 
            <!-- panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 1px;">
                                    <input tabindex="10" type="checkbox" class="icheck CheckboxAll" id="input-10">
                                </th>
                                <th class="text-center"><?php echo __('SKU/part no') ?></th>
                                <th class="text-center"><?php echo __('Product Name') ?></th>
                                <th class="text-center"><?php echo __('Retail Price') ?></th>
                                <th class="text-center"><?php echo __('Supply Price') ?></th>
                                <th class="text-center"><?php echo __('Quantity') ?></th>
                                <th class="text-center"><?php echo __('Order') ?></th>
                            </tr>
                        </thead>
                        <tbody id="products-details">
                            <?php foreach ($products as $key => $product): ?>
                            <tr class="row-cz cursor-pointer">
                                <td style="width: 1px;">
                                    <input tabindex="1" type="checkbox" class="icheck Checkbox" id="input-1">
                                    <?//= $key+1; ?>
                                </td>
                                <td class="text-center"><?= PRODUCT.str_pad($product->sku, ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
                                <td class="text-center"><?= $product->product_name; ?></td>
                                <td class="text-center"><?= number_format($product->retail_price, DECIMALS); ?></td>
                                <td class="text-center"><?= number_format($product->supply_price, DECIMALS); ?></td>
                                <td class="text-center"><?= $product->quantity; ?></td>
                                <td class="text-center"><?= "0"; ?></td>
                            </tr>
                            <tr class="row-cz-details hidden">
                                <td colspan="7">
                                    <div role="tabpanel">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-justified" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#tab1<?= $product->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Infomations") ?></a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#tab2<?= $product->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Descriptions"); ?></a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#tab3<?= $product->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Stock card"); ?></a>
                                            </li>
                                          
                                            <li role="presentation">
                                                <a href="#tab4<?= $product->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Invoice") ?></a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active fade in" id="tab1<?= $product->id?>">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <article class="product-title"><?php echo $product->product_name; ?></article>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="content">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <?php if (isset($product->images[0])): ?>
                                                        <div class="col-lg-9 text-center">
                                                            <a class="fancyboxs fancybox-thumbs-<?= $key; ?>" id="<?= $key; ?>" data-fancybox-group="thumb" href="../img/<?= $product->images[0]->path?>">
                                                                <?= $this->Html->image($product->images[0]->thumbnail,['class'=>'image-border zoom_05 img-responsive','width'=>200, 'data-zoom-image' => '../img/'.$product->images[0]->path]) ?>
                                                            </a><div class="divider5"></div>
                                                        </div>

                                                        <div class="col-lg-3 text-center">
                                                            <?php for ($i=1; $i < count($product->images); $i++):?>
                                                                <a class="fancyboxs fancybox-thumbs-<?= $key; ?>" id="<?= $key; ?>" data-fancybox-group="thumb" href="../img/<?= $product->images[$i]->path?>">
                                                                    <?= $this->Html->image($product->images[$i]->thumbnail,['class'=>'image-border zoom_05 img-responsive','width'=>50,'height'=>50, 'data-zoom-image' => '../img/'.$product->images[$i]->path]) ?>
                                                                </a>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <?php endif ?>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <div class="table-responsive table-products">
                                                            <table class="table table-striped">
                                                                <tr>
                                                                    <td class="bold"><?php echo __('SKU/Part No')?></td>
                                                                    <td><?= PRODUCT.str_pad($product->sku, ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bold"><?php echo __('Status')?></td>
                                                                    <td class="status-product-<?= $product->id?>">
                                                                    <?= ($product->status == PRODUCT_ACTIVE)? "Active":"Deactive" ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bold"><?php echo  __('Category')?></td>
                                                                    <td><?= $product->category->name?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bold"><?= __('Stock range')?>:</td>
                                                                    <td><?= $product->stock_min .'>'. $product->stock_max; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bold"><?php echo __('Retail Price') ?>:</td>
                                                                    <td><?= number_format($product->retail_price, DECIMALS); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bold"><?php echo __('Wholesale price')?>:</td>
                                                                    <td><?= number_format($product->wholesale_price, DECIMALS); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bold"><?php echo __('Supply Price') ?>:</td>
                                                                    <td><?= number_format($product->supply_price, DECIMALS); ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 proInfo">
                                                        <div class="description-products">
                                                            <h5><?php echo __('Descriptions') ?></h5><div class="divider10"></div>
                                                            <div class="content-description">
                                                                <?= $product->short_description; ?>
                                                            </div>
                                                        </div>
                                                        <div class="order-note-products">
                                                            <h5><?php echo __('Order Note') ?></h5><div class="divider10"></div>
                                                            <div class="content-order-note">
                                                                <?= $product->ordering_note; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix divider10"> </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <button class="btn btn-success btn-addon m-b-sm waves-effect waves-button waves-red" data-toggle="modal" data-target="#ProductEdit<?= $product->id;?>"><i class="fa fa-check-square"></i> Update</button>
                                                        <!-- Modal -->
                                                        <?= $this->element('Products/index_edit',['product'=> $product]);?>
                                                    <!-- End -->
                                                        <?php if ($product->status == PRODUCT_DEACTIVE): ?>
                                                             <button class="btn btn-info deactive-product btn-addon m-b-sm waves-effect waves-button waves-red" status="<?= PRODUCT_ACTIVE;?>" id="<?= $product->id?>"><i class="fa fa-unlock" aria-hidden="true"></i> Active</button>
                                                        <?php else: ?>
                                                             <button class="btn btn-primary deactive-product btn-addon m-b-sm waves-effect waves-button waves-red" status="<?= PRODUCT_DEACTIVE;?>" id="<?= $product->id?>"><i class="fa fa-lock" aria-hidden="true"></i> Deactive</button>
                                                        <?php endif ?>
                                                        <?= $this->Form->postLink(__('<i class="fa fa-trash"></i> Delete'),
                                                            ['action' => 'delete', $product->id],
                                                            ['confirm' => __('Are you sure you want to delete # {0}?', $product->id),'class' => 'btn btn-danger btn-addon m-b-sm waves-effect waves-button waves-red', 'escape' => false])?>
                                                            <button class="btn btn-success btn-addon m-b-sm waves-effect waves-button waves-red link" id="<?= $product->id;?>"><i class="fa fa-check-square"></i> Popup</button>

                                                           
                                                            <div id="popup" class="popUpDisplay popUpShow-<?= $product->id;?>">
                                                                <div class="popUpTitle">
                                                                    <span class="cancel""></span>
                                                                </div>
                                                                <div class="popUpContent">
                                                                    <h3>Welcome to Make Code Easy </h3>
                                                                    <br>
                                                                    For getting more knowledge click on Continue
                                                                    <ul class="buttons">
                                                                        <li><span class="button">Continue</span></li>
                                                                        <li><span class="button" class="cancel">Cancel</span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            

                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab2<?= $product->id?>">
                                                <?= $product->description; ?>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab3<?= $product->id?>">
                                                <table class="table table-bordered">
                                                     <thead>
                                                        <tr>
                                                            <th><?php echo __("Code")?></th>
                                                            <th><?php echo __("Quantity")?></th>
                                                            <th><?php echo __("Total value")?></th>
                                                            <th><?php echo __("Discount")?></th>
                                                            <th><?php echo __("Total")?></th>
                                                        </tr>
                                                    </thead>
                                                 <?php foreach ($product->stock_products as $key => $stocks): ?>
                                                    <?php $stock = $stocks['_matchingData']['Stocks']; ?>
                                                    <tr>
                                                        <td><span class="stocks-detail cursor-pointer" pid="<?= $product->id?>" id="<?= $stock['id'];?>">
                                                            <?php echo 'SK.'.str_pad($stock['id'], ZEROFILL, ZERO, STR_PAD_LEFT); ?></span>
                                                        </td>
                                                        <td><?= $stock['total_quantity'];?></td>
                                                        <td><?= number_format($stock['total_price'], DECIMALS);?></td>
                                                        <td><?= $stock['discount_stock'];?></td>
                                                        <td><?= number_format($stock['final_price'], DECIMALS);?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                                </table>
                                            </div>
                                           
                                            <div role="tabpanel" class="tab-pane fade" id="tab4<?= $product->id?>">
                                                <table class="table table-bordered">
                                                     <thead>
                                                        <tr>
                                                            <th><?php echo __("Code")?></th>
                                                            <th><?php echo __("Status")?></th>
                                                           
                                                            <th><?php echo __("Date")?></th>
                                                            <th><?php echo __("Total")?></th>
                                                        </tr>
                                                    </thead>
                                                <?php foreach ($product->invoice_products as $key => $invoices): ?>
                                                    <?php $invoice = $invoices['_matchingData']['Invoices']; ?>
                                                    <tr>
                                                        <td><span class="invoices-detail cursor-pointer" pid="<?= $product->id?>" id="<?= $invoice['id'];?>">
                                                            <?php echo INVOICE.str_pad($invoice['id'], ZEROFILL, ZERO, STR_PAD_LEFT); ?></span>
                                                        </td>
                                                        <td><?= $invoice['status'];?></td>
                                                        <td><?= $invoice['created'];?></td>
                                                        <td><?= number_format($invoice['total'], DECIMALS);?></td>
                                                        
                                                      
                                                    </tr>
                                                <?php endforeach ?>
                                                </table>
                                                 
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach ?>
                            <tr>
                                <td colspan="7" class="bg-white"><?= $this->element('pagination',['num_page'=>$num_page])?></td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div> <!-- panel-body -->
        </div> <!-- col-lg-9 -->
    </div><!-- col-lg-12 -->
</div> <!-- row -->

<div id="modalStocks" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body modal-Stocks"></div>
        </div>
    </div>
</div>

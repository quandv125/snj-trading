
<?php foreach ($products as $key => $product): ?>
    <tr class="row-cz-<?= $str_rand ?> cursor-pointer">
        <td style="width: 1px;">
            <input tabindex="1" type="checkbox" class="icheck-<?= $str_rand ?> Checkbox-<?= $str_rand ?>" id="input-1">
        </td>
        <td class="text-center"><?= PRODUCT.str_pad($product->sku, ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
        <td class="text-center"><?= $product->product_name; ?></td>
        <td class="text-center"><?= number_format($product->retail_price, DECIMALS); ?></td>
        <td class="text-center"><?= $product->quantity; ?></td>
      
        <td class="text-center actived-product-<?= $product->id?>"><?= ($product->actived == PRODUCT_ACTIVE)? '<span class="label label-primary">Active</span>':'<span class="label label-danger">Deactive</span>' ?> </td>
    </tr>
    <tr class="row-cz-details hidden">
        <td colspan="6">
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#tab1<?= $product->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Infomations") ?></a>
                    </li>
                    <li role="presentation">
                        <a href="#tab2<?= $product->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Descriptions"); ?></a>
                    </li>
                 <!--    <li role="presentation">
                        <a href="#tab3<?= $product->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Stock card"); ?></a>
                    </li> -->
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
                                <?php if ($user_info['group_id'] == CUSTOMERS): ?>
                                    <div class="col-lg-9 text-center">
                                        <a class="fancyboxs-<?= $str_rand ?> fancybox-thumbs-<?= $key; ?>" id="<?= $key; ?>" data-fancybox-group="thumb" href="../img/<?= $product->images[0]->path?>">
                                            <?= $this->Html->image($product->images[0]->thumbnail,["align"=>"middle",'class'=>'image-border zoom_05 img-responsive','width'=>200, 'data-zoom-image' => '../img/'.$product->images[0]->path]) ?>
                                        </a><div class="divider5"></div>
                                    </div>
                                    <div class="col-lg-3 text-center">
                                        <?php for ($i=1; $i < count($product->images); $i++):?>
                                            <a class="fancyboxs-<?= $str_rand ?> fancybox-thumbs-<?= $key; ?>" id="<?= $key; ?>" data-fancybox-group="thumb" href="../img/<?= $product->images[$i]->path?>">
                                                <?= $this->Html->image($product->images[$i]->thumbnail,["align"=>"middle",'class'=>'image-border zoom_05 img-responsive','width'=>50,'height'=>50, 'data-zoom-image' => '../img/'.$product->images[$i]->path]) ?>
                                            </a>
                                        <?php endfor; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="col-lg-9 text-center">
                                    <a class="fancyboxs-<?= $str_rand ?> fancybox-thumbs-<?= $key; ?>" id="<?= $key; ?>" data-fancybox-group="thumb" href="../img/<?= $product->images[0]->path?>">
                                        <?= $this->Html->image($product->images[0]->thumbnail,["align"=>"middle",'class'=>'image-border zoom_05 img-responsive','width'=>200, 'data-zoom-image' => '../img/'.$product->images[0]->path]) ?>
                                    </a><div class="divider5"></div>
                                </div>
                                <div class="col-lg-3 text-center">
                                    <?php for ($i=1; $i < count($product->images); $i++):?>
                                        <a class="fancyboxs-<?= $str_rand ?> fancybox-thumbs-<?= $key; ?>" id="<?= $key; ?>" data-fancybox-group="thumb" href="../img/<?= $product->images[$i]->path?>">
                                            <?= $this->Html->image($product->images[$i]->thumbnail,["align"=>"middle",'class'=>'image-border zoom_05 img-responsive','width'=>50,'height'=>50, 'data-zoom-image' => '../img/'.$product->images[$i]->path]) ?>
                                        </a>
                                    <?php endfor; ?>
                                </div>
                                <?php endif ?>
                                
                                <?php endif ?>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                <div class="table-responsive table-products">
                                    <table class="table table-striped">
                                        <tr>
                                            <td class="bold"><?php echo __('SKU/Part No')?></td>
                                            <td><?= PRODUCT.str_pad($product->sku, ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="bold"><?php echo  __('Category')?></td>
                                            <td><?= $product->category->name?></td>
                                        </tr>
                                        <tr>
                                            <td class="bold"><?= __("Maker's Name")?>:</td>
                                            <td><?= $product->supplier['name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="bold"><?php echo __('Serial No') ?>:</td>
                                            <td><?= $product->serial_no ?></td>
                                        </tr>
                                        <tr>
                                            <td class="bold"><?php echo __('Type Model')?>:</td>
                                            <td><?= $product->typ_model ?></td>
                                        </tr>
                                        <tr>
                                            <td class="bold"><?php echo __('Origin') ?>:</td>
                                            <td><?= $product->origin ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 proInfo">
                                <div class="description-products">
                                    <h5><?php echo __('Remark/Descriptions') ?></h5><div class="divider10"></div>
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
                                <?php if ($product->actived == PRODUCT_DEACTIVE): ?>
                                     <button class="btn btn-info deactive-product-<?= $str_rand ?> btn-addon m-b-sm waves-effect waves-button waves-red" actived="<?= PRODUCT_ACTIVE;?>" id="<?= $product->id?>"><i class="fa fa-unlock" aria-hidden="true"></i> Active</button>
                                <?php else: ?>
                                     <button class="btn btn-primary deactive-product-<?= $str_rand ?> btn-addon m-b-sm waves-effect waves-button waves-red" actived="<?= PRODUCT_DEACTIVE;?>" id="<?= $product->id?>"><i class="fa fa-lock" aria-hidden="true"></i> Deactive</button>
                                <?php endif ?>
                               
                                <?= $this->Form->postLink(__('<i class="fa fa-trash"></i> Delete'),
                                    ['action' => 'delete', $product->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $product->id),'class' => 'btn btn-danger btn-addon m-b-sm waves-effect waves-button waves-red', 'escape' => false])?>
                            </div>
                        </div>
                    </div>
                     <div role="tabpanel" class="tab-pane fade" id="tab2<?= $product->id?>">
                        <?= $product->description; ?>
                    </div>
                   <!--  <div role="tabpanel" class="tab-pane fade" id="tab3<?= $product->id?>">
                        <table class="table table-bordered">
                             <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Quantity</th>
                                    <th>Total value</th>
                                    <th>Discount</th>
                                    <th>Total</th>
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
                    </div> -->
                   
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
    <td colspan="7" class="bg-white"><?= $this->element('pagination',['num_page' => $num_page, 'type' => $type])?></td>
</tr>
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

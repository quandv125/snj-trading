
<?php foreach ($products as $key => $product): ?>
    <tr class="row-cz-<?= $str_rand ?> cursor-pointer">
        <td style="width: 1px;">
            <input tabindex="1" type="checkbox" class="icheck-<?= $str_rand ?> Checkbox-<?= $str_rand ?>" id="input-1">
        </td>
        <td class="text-center1 pulse"><?= str_pad($product->sku, ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
        <td class="text-center1 pulse"><?= $product->product_name; ?></td>
        <td class="text-center pulse"><?= number_format($product->retail_price, DECIMALS); ?></td>
        <td class="text-center pulse"><?= $product->created; ?></td>
        <td class="text-center pulse actived-product-<?= $product->id?>"><?= ($product->actived == PRODUCT_ACTIVE)? '<span class="label label-primary">Active</span>':'<span class="label label-danger">Deactive</span>' ?> </td>
        <td class="text-center">
            <div class="dropdown">
                <button class="dropbtn"><i class="fa fa-bars" aria-hidden="true"></i></button>
                <div class="dropdown-content">
                    <?php echo $this->Html->link('<i class="fa fa-eye" aria-hidden="true"></i> View', ['controller'=>'pages','action' => 'products',$product->id],['class'=>'','escape'=>false]); ?>
                    <?php echo $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i> Update', ['action' => 'edit',$product->id],['class'=>'','escape'=>false]); ?>
                    
                    <?= $this->Form->postLink(__('<i class="fa fa-trash" aria-hidden="true"></i> Delete'),
                    ['action' => 'delete', $product->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $product->id),'class' => '', 'escape' => false])?>
                </div>
            </div>
        </td>
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
                        <a href="#tab2<?= $product->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Infomations"); ?></a>
                    </li>
                 <!--    <li role="presentation">
                        <a href="#tab3<?= $product->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Stock card"); ?></a>
                    </li> -->
                    <li role="presentation">
                        <a href="#tab4<?= $product->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Description") ?></a>
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
                                    <div class="col-lg-12 text-center">
                                        <a class="fancyboxs-<?= $str_rand ?> fancybox-thumbs-<?= $key; ?>" id="<?= $key; ?>" data-fancybox-group="thumb" href="../img/<?= $product->images[0]->path?>">
                                            <?= $this->Html->image($product->images[0]->thumbnail,["align"=>"middle",'class'=>'image-border zoom_05 img-responsive','width'=>200, 'data-zoom-image' => '../img/'.$product->images[0]->path]) ?>
                                        </a><div class="divider5"></div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <?php foreach ($product->images as $image): ?>
                                            <a class="fancyboxs-<?= $str_rand ?> fancybox-thumbs-<?= $key; ?>" id="<?= $key; ?>" data-fancybox-group="thumb" href="../img/<?= $image->path?>">
                                                <?= $this->Html->image($image->thumbnail,['class'=>'image-border zoom_05 img-responsive','width'=>50,'height'=>50, 'data-zoom-image' => '../img/'.$image->path]) ?>
                                            </a>
                                        <?php endforeach ?>
                                    </div>
                                <?php endif ?>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
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
                           <!--  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 proInfo">
                                <div class="description-products">
                                    <h5><?php echo __('Remark/Descriptions') ?></h5><div class="divider10"></div>
                                    <div class="content-description">
                                        <?php //echo $product->short_description; ?>
                                    </div>
                                </div>
                                <div class="order-note-products">
                                    <h5><?php echo __('Order Note') ?></h5><div class="divider10"></div>
                                    <div class="content-order-note">
                                        <?= $product->ordering_note; ?>
                                    </div>
                                </div>
                            </div> -->
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
                       <div class="col-md-6">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td class="bold"><?php echo __('Release Date')?></td>
                                                            <td><b><?php echo date("Y-m-d", strtotime($product->release_date)) ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold"><?php echo __('Size')?></td>
                                                            <td><b><?php echo $product->size ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold"><?php echo __('Status')?></td>
                                                            <td><b><?php echo $product->status ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold"><?php echo __('Brand')?></td>
                                                            <td><b><?php echo $product->brand ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold"><?php echo __('Origin')?></td>
                                                            <td><b><?php echo $product->origin ?></b></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td class="bold"><?php echo __('Weight')?></td>
                                                            <td><?= $product->weight; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold"><?php echo __('Color')?></td>
                                                            <td><?= $product->color; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold"><?php echo __('Meterial')?></td>
                                                            <td><?= $product->meterial; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold"><?php echo __('Manufacturer')?></td>
                                                            <td><?= $product->manufacturer; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold"><?php echo __('Composition')?></td>
                                                            <td><?= $product->composition; ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                
                                                <div class="clearfix"></div>
                                                <?php if (isset($product->properties) && !empty($product->properties)): ?>
                                                    <table class="table table-striped">
                                                        <?php foreach (json_decode($product->properties) as $key => $propertie): ?>
                                                            <?php if (!empty($propertie->value)): ?>
                                                                <tr>
                                                                    <td class="bold"><?php echo $propertie->label ?> * </td>
                                                                    <td><?php echo $propertie->value?></td>
                                                                </tr>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    </table>
                                                <?php endif ?>
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
                         <?php// foreach ($product->stock_products as $key => $stocks): ?>
                            <?php// $stock = $stocks['_matchingData']['Stocks']; ?>
                            <tr>
                                <td><span class="stocks-detail cursor-pointer" pid="<?php //echo $product->id?>" id="<?php //echo $stock['id'];?>">
                                    <?php// echo 'SK.'.str_pad($stock['id'], ZEROFILL, ZERO, STR_PAD_LEFT); ?></span>
                                </td>
                                <td><?php //echo $stock['total_quantity'];?></td>
                                <td><?php //echo number_format($stock['total_price'], DECIMALS);?></td>
                                <td><?php //echo $stock['discount_stock'];?></td>
                                <td><?php //echo number_format($stock['final_price'], DECIMALS);?></td>
                            </tr>
                        <?php// endforeach ?>
                        </table>
                    </div> -->
                   
                    <div role="tabpanel" class="tab-pane fade" id="tab4<?= $product->id?>">
                       <!--  <table class="table table-bordered">
                             <thead>
                                <tr>
                                    <th><?php// echo __("Code")?></th>
                                    <th><?php// echo __("Status")?></th>
                                   
                                    <th><?php// echo __("Date")?></th>
                                    <th><?php// echo __("Total")?></th>
                                </tr>
                            </thead>
                        <?php// foreach ($product->invoice_products as $key => $invoices): ?>
                            <?php// $invoice = $invoices['_matchingData']['Invoices']; ?>
                            <tr>
                                <td><span class="invoices-detail cursor-pointer" pid="<?php// echo $product->id?>" id="<?php// echo $invoice['id'];?>">
                                    <?php// echo INVOICE.str_pad($invoice['id'], ZEROFILL, ZERO, STR_PAD_LEFT); ?></span>
                                </td>
                                <td><?php //echo $invoice['status'];?></td>
                                <td><?php //echo $invoice['created'];?></td>
                                <td><?php //echo number_format($invoice['total'], DECIMALS);?></td>
                                
                              
                            </tr>
                        <?php// endforeach ?>
                        </table> -->
                         
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


<div class="row">
    <div class="col-md-3 col-sm-4 col-xs-12 ">
        <div class="sidebar-shop sidebar-left ">
			<?php echo $this->element('font-end/Pages/menu_account_info') ?>
        </div>
       
    </div>
    <div class="col-md-9 col-sm-8 col-xs-12 wapper-content">
       <div class="main-content-shop ">
          
			<span class="float-right"><?php echo $this->Html->link('<i class="fa fa-plus" style="color:#fff;"></i>',['controller' => 'Products','action' => 'SupplierAddProduct'],['escape' => false,'class' =>'btn btn-success']) ?> </span>
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 1px;">
                            <input tabindex="10" type="checkbox" class="icheck CheckboxAll" id="input-10">
                        </th>
                        <th class="text-center"><?php echo __('SKU/part no') ?></th>
                        <th class="text-center"><?php echo __('Product Name') ?></th>
                        <th class="text-center"><?php echo __('Retail Price') ?></th>
                        <th class="text-center"><?php echo __('Quantity') ?></th>
                        <th class="text-center"><?php echo __('Actived') ?></th>
                    </tr>
                </thead>
                <tbody class="vertical highlight_list live-search-list">
                    <?php foreach ($products as $key => $product): ?>

                    <tr class="products-show first" data-search-term="active<?= ($product->actived == PRODUCT_ACTIVE)? '1':'0' ?>">
                        <td style="width: 1px;"><input type="checkbox" ></td>
                        <td class="click text-center"><?= str_pad($product->sku, ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
                        <td class="click text-center"><?= $product->product_name; ?></td>
                        <td class="click text-center"><?= number_format($product->retail_price, DECIMALS); ?></td>
                        <td class="click text-center"><?= $product->quantity; ?></td>
                        <td class="text-center"><?= ($product->actived == PRODUCT_ACTIVE)? "<span class='label label-primary'>Active</span>":"<span class='label label-danger'>Deactive</span>" ?></td>
                    </tr>
                    <tr class="products-details hidden">
                        <td colspan="7">
                        <div class="tab-detail1">
                            <div class="title-tab-detail">
                                <ul role="tablist">
                                    <li class="active"><a href="#details<?= $key?>" data-toggle="tab">Product Details </a></li>
                                    <li><a href="#description<?= $key?>" data-toggle="tab"> Descriptions</a></li>
                                   
                                </ul>
                            </div>
                            <div class="content-tab-detail">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="details<?= $key?>">
                                        <div class="inner-content-tab-detail1">
                                            <div class="col-sm-3 pos-product-images zoom-image-thumb">
                                                <?php echo $this->Html->image($product->images[0]['thumbnail'])  ?>
                                            </div>
                                            <div class="col-sm-9 table-responsive table-products pos-product-info">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <td class="bold"><?php echo __('Part No/ Code/ SKU')?></td>
                                                        <td><?= PRODUCT.str_pad($product->sku, ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold"><?php echo  __('Category')?></td>
                                                        <td><?= $product->category->name?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold"><?php echo  __("Maker's Name")?></td>
                                                        <td><?= $product->supplier->name?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold"><?php echo __('Serial No')?>:</td>
                                                        <td><?= $product->serial_no; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold"><?php echo __('Type Model') ?>:</td>
                                                        <td><?= ($product->type_model); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold"><?php echo __('Quantity')?>:</td>
                                                        <td><?= number_format($product->quantity, DECIMALS); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold"><?php echo __('Origin') ?>:</td>
                                                        <td><?= ($product->origin); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold"><?php echo __('Remark') ?>:</td>
                                                        <td><?= ($product->short_description); ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                           
                                            <?php echo $this->Html->link('Edit',['controller'=>'Products','action' => 'SupplierEditProduct',$product->id],['class'=>'btn btn-success']) ?>
                                           
                                            <?= $this->Form->postLink(__('<i class="fa fa-trash"></i> Delete'),
                                            ['controller'=>'Products','action' => 'SupplierDeleteProduct',$product->id],
                                            ['confirm' => __('Are you sure you want to delete # {0}?', $product->id),'class' => 'btn btn-danger btn-addon m-b-sm waves-effect waves-button waves-red', 'escape' => false])?>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="description<?= $key?>">
                                        <div class="inner-content-tab-detail">
                                            <?php echo $product->description; ?>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!-- End Main Content Shop -->
    </div>
</div>

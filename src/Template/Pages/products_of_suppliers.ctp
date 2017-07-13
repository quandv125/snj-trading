<div class="row">
    <div class="col-md-3 col-sm-4 col-xs-12 ">
        <div class="sidebar-shop sidebar-left ">
			<?php echo $this->element('font-end/Pages/menu_account_info') ?>
        </div>
    </div>
    <div class="col-md-9 col-sm-8 col-xs-12 wapper-content">
       <div class="main-content-shop ">
			<span class="float-right"><?php echo $this->Html->link('<i class="fa fa-plus" style="color:#fff;"></i>',['controller' => 'Products','action' => 'SupplierAddProduct'],['escape' => false,'class' =>'btn btn-success']) ?> </span>
            <br/><br/><br/>
            <table id="datatable" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center"><?php echo __('Part No/ Code') ?></th>
                        <th class="text-center"><?php echo __('Product Name') ?></th>
                        <th class="text-center"><?php echo __('Origin') ?></th>
                        <th class="text-center"><?php echo __('Model') ?></th>
                        <th class="text-center"><?php echo __('Actived') ?></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $key => $product): ?>
                        <tr>
                            <td class="text-center"><?= $this->Html->link(str_pad($product->sku, ZEROFILL, ZERO, STR_PAD_LEFT), ['controller' => 'Pages', 'action' => 'products', $product->id]); ?></td>
                            <td class="text-center"><?= $this->Html->link($this->MyHtml->_Cutstring($product->product_name,10,40), ['controller' => 'Pages', 'action' => 'products', $product->id]); ?></td>
                            <td class="text-center"><?= ($product->origin); ?></td>
                            <td class="text-center"><?= $product->type_model; ?></td>
                            <td class="text-center">
                                <?= ($product->actived == PRODUCT_ACTIVE)? "<span class='label label-primary'>Active</span>":"<span class='label label-danger'>Deactive</span>" ?>
                            </td>
                            <td class="text-center">
                                <?= $this->Html->link('<i class="fa fa-pencil"></i>',['controller'=>'Products','action' => 'SupplierEditProduct',$product->id],['class'=>'btn btn-success','escape' => false]) ?>
                                <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'),
                                ['controller'=>'Products','action' => 'SupplierDeleteProduct',$product->id],
                                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id),'class' => 'btn btn-danger btn-addon m-b-sm waves-effect waves-button waves-red', 'escape' => false])?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

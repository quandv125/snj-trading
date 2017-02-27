
<div class="row">
    <div class="col-lg-12 col-md-12 panel panel-white">
        <div class="col-lg-2 col-md-2 col-sm-3">
        <!-- Searchbox -->
            <?php echo $this->element('Stocks/searchbox',['users'=> $users, 'suppliers' => $suppliers]) ?>
        </div>
        <!-- col-lg-3 -->
        <div class="col-lg-10 col-md-10 col-sm-9">
            <div class="panel-heading clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    Stocks
                </div> 
                <!-- col-lg-8 -->
                <div class="col-lg-4 col-md-4 col-md-4 col-xs-4">
                    <!-- Add new stocks -->
                    <?= $this->Html->Link(__('<i class="fa fa-plus"></i> Add'),
                        ['action' => 'add'],['class' => 'btn btn-success btn-addon m-b-sm waves-effect waves-button waves-red float-right margin-bottom10', 'escape' => false])?>
                </div> 
                <!-- col-lg-4 -->
            </div> 
            <!-- panel-heading -->
            <div class="panel-body">
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 1px;">
                                        <input tabindex="10" type="checkbox" class="icheck CheckboxAll" id="input-10">
                                    </th>
                                    <th class="text-center" scope="col"><?= $this->Paginator->sort('Code') ?></th>
                                    <th class="text-center" scope="col"><?= $this->Paginator->sort('Time') ?></th>
                                    <th class="text-center" scope="col"><?= $this->Paginator->sort('Suppliers') ?></th>
                                    <th class="text-center" scope="col"><?= $this->Paginator->sort('Total') ?></th>
                                    <th class="text-center" scope="col"><?= $this->Paginator->sort('Status') ?></th>
                                </tr>
                            </thead>
                            <tbody id="stocks-details">
                                <tr>
                                    <td colspan="4"></td>
                                    <td class="text-center"><?php echo number_format($total_price->final_price, DECIMALS) ?> VNĐ</td>
                                    <td></td>
                                </tr>
                                <?php foreach ($stocks as $stock): ?>
                                    <tr class="row-cz cursor-pointer">
                                        <td style="width: 1px;">
                                            <input tabindex="1" type="checkbox" class="icheck Checkbox" id="input-1">
                                        </td>
                                        <td class="text-center"><?= STOCK.str_pad($stock->id, ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
                                        <td class="text-center"><?= h(date("Y-m-d ", strtotime($stock->created))) ?></td>
                                        <td class="text-center"><?= h($stock->supplier->name) ?></td>
                                        <td class="text-center"><?php echo number_format($stock->final_price, DECIMALS)?></td>
                                        <td class="text-center"><?= h($stock->actions) ?></td>
                                    </tr>
                                    <tr class="row-cz-details hidden">
                                        <td colspan="6">
                                            <div role="tabpanel">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs nav-justified" role="tablist">
                                                    <li role="presentation" class="active">
                                                        <a href="#tab1<?= $stock->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Infomations") ?></a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="#tab3<?= $stock->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("History") ?></a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane active fade in" id="tab1<?= $stock->id?>">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <article class="customer-title"><?php echo $stock->customer_name; ?></article>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="content">
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <table class="table table-striped">
                                                                    <tr>
                                                                        <td class="bold"><?php echo __('Code')?></td>
                                                                        <td><?= STOCK.str_pad($stock->id, ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
                                                                        <td class="bold"><?php echo __('Status')?></td>
                                                                        <td><?= $stock->actions; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bold"><?php echo  __('Time')?></td>
                                                                        <td><?= $stock->created?></td>
                                                                        <td class="bold"><?php echo __('Outlet') ?>:</td>
                                                                        <td><?= h($stock->address) ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bold"><?= __('Suppliers')?>:</td>
                                                                        <td><?= h($stock->supplier->name) ?></td>
                                                                        <td class="bold"><?= __('Created')?>:</td>
                                                                        <td><?= $stock->user->username?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bold"><?= __('Payment')?>:</td>
                                                                        <td><?= h($stock->payment) ?></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <div class="stocks">
                                                                    <h5><?php echo __('Descriptions')?></h5><div class="divider10"></div>
                                                                    <div class="content">
                                                                        <textarea cols="33" rows="6"><?= $stock->note; ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                                                                <table class="table table-bordered table-color">
                                                                     <thead> 
                                                                        <tr>
                                                                            <th class="width5">
                                                                                <button class="btn btn-danger del-stockproducts"  sid="<?= $stock->id?>" >
                                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                                </button>
                                                                            </th>
                                                                            <th class="width5"><?php echo __("SKU");?></th>
                                                                            <th><?php echo __("Product Name");?></th>
                                                                            <th><?php echo __("Price");?></th>
                                                                            <th class="width5"><?php echo __("Quantity");?></th>
                                                                            <th class="width5"><?php echo __("Discount");?></th>
                                                                            <th><?php echo __("Total");?></th>
                                                                            <th class="width5">Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                <?php foreach ($stock->stock_products as $key => $StockProducts): ?>

                                                                    <?php $SP =  $StockProducts['_matchingData']['Products']?>
                                                                    <tr class="stock_products_<?= $StockProducts->id?>">
                                                                        <th class="text-center"> <input tabindex="100<?= $key?>" type="checkbox" class="icheck sp-chbox-<?= $stock->id;?>" spid="<?= $StockProducts->id?>" cid="<?= $key?>" id="input-100<?= $key?>" name="chbox-stock"></th>
                                                                        <td><?= PRODUCT.str_pad($SP->id, ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
                                                                        <td><?= $SP->product_name?></td>
                                                                        <td><?= number_format($StockProducts->price, DECIMALS) ?></td>
                                                                        <td><?= $StockProducts->quantity?></td>
                                                                        <td><?= $StockProducts->discount?></td>
                                                                        <td><?= number_format($StockProducts->quantity*($StockProducts->price*((100-$StockProducts->discount)/100)), DECIMALS) ?>
                                                                        </td>
                                                                        <td>
                                                                            <button class="btn btn-success" data-toggle="modal", data-target= "#myModal-<?= $stock->id.$SP->id?>"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                                        </td>
                                                                        <!--  -->
                                                                        <div class="modal fade" id="myModal-<?= $stock->id.$SP->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                                            <div class="modal-dialog modal-sm modal-center">
                                                                                <div class="modal-content" style=" margin-top: 100px; ">
                                                                                    <?= $this->Form->create(NULL,['url'=>['action'=>'ChangeStocksProducts',$StockProducts->id, $stock->discount_stock]]);?>
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                                        <h4 class="modal-title" id="myModalLabel"><?php echo __("Stocks") ?></h4>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <?php
                                                                                            echo $this->Form->input('pid',['value'=>$SP->id,'class'=>'hidden','label'=>false]);
                                                                                            echo $this->Form->input('sid',['value'=>$StockProducts->stock_id,'class'=>'hidden','label'=>false]);
                                                                                            echo $this->Form->input('name',['value'=>$SP->product_name]);
                                                                                            echo $this->Form->input('supply_price',['class'=>'auto','value'=> $StockProducts->price]);
                                                                                            echo $this->Form->input('quantity',['value'=> $StockProducts->quantity]);
                                                                                            echo $this->Form->input('discount',['value'=> $StockProducts->discount]);
                                                                                        ?>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button class="btn btn-success ">Submit</button>
                                                                                        <?= $this->Form->button('Submit',array('class' => 'btn btn-success float-right waves-effect waves-button waves-red')); ?>
                                                                                        <?= $this->Form->end(); ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>  
                                                                        <!-- End -->
                                                                    </tr>
                                                                <?php endforeach ?>
                                                                </table>
                                                            </div>
                                                            <div class="clearfix"> </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 table-responsive float-right">
                                                            <table class="table table-striped">
                                                                <tr><td>Quantity</td><td><?= $stock->total_quantity?></td></tr>
                                                                <tr><td>Total value:</td><td><?= number_format($stock->total_price, DECIMALS) ?></td></tr>
                                                                <tr><td>Discount</td><td><?= $stock->discount_stock?></td></tr>
                                                                <tr><td>Total</td><td><?= number_format($stock->final_price, DECIMALS) ?></td></tr>
                                                            </table>
                                                            </div>
                                                            <div class="clearfix"> </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <button class="btn btn-success btn-addon m-b-sm waves-effect waves-button waves-red" data-toggle="modal" data-target="#customerEdit<?= $stock->id;?>"><i class="fa fa-check-square"></i> Update</button>
                                                                <!-- Modal -->
                                                                <?php //echo $this->element('Stocks/index_edit',['customer'=> $stock]);?>
                                                                <?= $this->Form->postLink(__('<i class="fa fa-trash"></i> Delete'),
                                                                    ['action' => 'delete', $stock->id],
                                                                    ['confirm' => __('Are you sure you want to delete # {0}?', $stock->id),'class' => 'btn btn-danger btn-addon m-b-sm waves-effect waves-button waves-red', 'escape' => false])?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="tab3<?= $stock->id?>">
                                                        comming soon
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- col-lg-4 -->
            </div> <!-- panel-body -->
        </div> <!-- col-lg-9 -->
    </div><!-- col-lg-12 -->
</div> <!-- row -->

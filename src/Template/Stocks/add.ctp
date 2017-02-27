  
<div class="col-lg-9 col-md-9 border panel panel-white ">
    <div class="col-lg-4 col-md-4 panel-heading input-group ">
        <input type="text"  name="search-product-stock" class="form-control" id="SPS" placeholder="Search product">
        <span class="input-group-addon add-on cursor-point" data-toggle="modal" data-target="#AddSP">
            <i class="fa fa-plus waves-effect"></i>
        </span>
    </div>
    <div class="result-search-stock clearfix"></div>
    <div class="panel-body">
        <div class="">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center"></th>
                            <th scope="col" class="text-center"><?= $this->Paginator->sort('Code') ?></th>
                            <th scope="col" class="text-center"><?= $this->Paginator->sort('Product Name') ?></th>
                            <th scope="col" class="text-center"><?= $this->Paginator->sort('Price') ?></th>
                            <th scope="col" class="text-center"><?= $this->Paginator->sort('Quatity') ?></th>
                            <th scope="col" class="text-center"><?= $this->Paginator->sort('Discount') ?></th>
                            <th scope="col" class="text-center"><?= $this->Paginator->sort('Total') ?></th>
                        </tr>
                    </thead>
                    <tbody id="stocks-details"></tbody>
                </table>
            </div>
        </div>
    </div> <!-- panel-body -->
</div>

<div class="col-lg-3 col-md-3 border panel panel-white">
    <div class="divider10 clearfix"></div>
    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active">
                <a href="#tabsk1" class="bold" role="tab" data-toggle="tab"><?php echo __("Infomations") ?></a>
            </li>
            <li role="presentation">
                <a href="#tabsk2" class="bold" role="tab" data-toggle="tab"><?php echo __("Extra"); ?></a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content tab-content-cz">
            <div role="tabpanel" class="tab-pane active fade in" id="tabsk1">
                <div class="content">
                    <?php echo $this->Form->input(__('Supplier'),['options' => $suppliers]) ?>
                    <?php echo $this->Form->input(__('Payment'),['options' => ['1' => 'Cash', '2' => 'Transfer']]) ?>
                    <?php echo $this->Form->input(__('users'),['options' => $users,'default'=>$user_info['id']]) ?>
                    <?php echo $this->Form->input(__('create'),['type' => 'text','class' => 'date-picker','value' => date('Y-m-d')]);  ?>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tabsk2">
                <?= $this->Form->textarea('note',['rows' =>'5','cols'=>'30','maxlength'=>'255', 'placeholder' => 'note']);?>
            </div>
        </div>
    </div>
    <div class="divider20 clearfix"></div>
    <div class="info-pay">
        <div class="wapper-payment-stock">
            <span class="content-payment-stock">Payment</span>
        </div>
        <div class="table-responsive ">
            <table class="table table-striped">
                <tr>
                    <td>Quantity</td>
                    <td><span id="TotalQuantity">0</span></td>
                </tr>
                <tr>
                    <td>Total order value</td>
                    <td><span id="ViewPrice">0</span></td>
                </tr>
                 <tr>
                    <td>Discount(%)</td>
                    <td><input type="number" class="form-control" id="DiscountOnOrder" value="0" style="text-align: right;" name=""></td>
                </tr>
                <tr>
                    <td>Pay for Supplier</td>
                    <td><span id="PayRefund">0</span></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="divider20 clearfix"></div>
    <div class="float-right">
        <button class="btn btn-warning">Back</button>
        <button class="btn btn-info">Save as</button>
        <button class="btn btn-primary" id="btn-complete-stock">Complete</button>
    </div>
</div>


<div class="modal fade" id="AddSP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm modal-center">
        <div class="modal-content" style=" margin-top: 100px; ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo __("Add Product") ?></h4>
            </div>
            <div class="modal-body">
                <?= $this->Form->input('name',['id' => 'name-product-stock']);?> 
                <?= $this->Form->input('categories',['id'=>'categorie-product-stock','options' => $categories]);?> 
                <?= $this->Form->input('retail_price',['id' => 'retail-price-product-stock']);?> 
            </div>
            <div class="modal-footer">
                <button class="btn btn-success float-right" id="btn-add-product-stock">Submit</button>
            </div>
        </div>
    </div>
</div>      
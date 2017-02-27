<div class="row panel panel-white">
	<div class="divider10 clearfix"></div>
	<div class="">
		<input id="search" class="form-control margin-left15 margin-right10 float-left width20" placeholder="Start typing here" data-list=".default_list" autocomplete="off">
		<?php echo $this->Html->tag('span', '<i class="fa fa-filter"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModalSearch']); ?>
		<div id="myModalSearch" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-sm modal-center">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title" id="myModalLabel">Search Products</h4>
		            </div>
		             <div class="modal-body">
		                <div class="">
		                    <div role="tabpanel">
		                        <?= $this->Form->create(NULL,["id"=>"SearchInfoProduct"]);?>
		                        <?= $this->Form->input('categories',['empty' => [Null => 'All']]);?>
		                    </div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <?= $this->Form->button('Submit',array('class' => 'btn btn-success')); ?>
		               	<?= $this->Form->end(); ?>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
	<div class="divider10 clearfix"></div>
	<div class=" ">
		<div class="col-lg-9 col-md-9">
			<div class="border">
				<div class="products-list">
					<div class="table-responsive">
	                    <table class="table table-striped">
	                    <thead>
                            <tr>
                                <th class="width1"><?php echo __("");?></th>
								<th class="width5"><?php echo __("Sku");?></th>
								<th><?php echo __("Product");?></th>
								<th class="width20"><?php echo __("Price");?></th>
								<th class="width10"><?php echo __("Qty");?></th>
								<th class="width15"><span class="text-center"><?php echo __("Total");?></span></th>
                            </tr>
                        </thead>
						<tbody id="list-items">
						<?php @$S_Invoices = $this->request->session()->read('Invoices'); ?>
						<?php if (isset($S_Invoices['products']) && !empty($S_Invoices['products'])): ?>
							<?php foreach ($S_Invoices['products'] as $key => $s_invoice): ?>
								
								<tr class="product-order" sku="" product_name="<?= $s_invoice['product_name']?>" id="<?= $s_invoice['product_id'];?>">
									<td class="width1 delete-item cursor-pointer">x</td>
									<td class="sku-item"><?php echo PRODUCT.str_pad($s_invoice['product_id'], ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
									<td class="product_name"><?= $s_invoice['product_name']?></td>
									<td class="width20"><span class="price-item-<?= $s_invoice['product_id'];?>" rel="<?= $s_invoice['price'];?>"><?= number_format($s_invoice['price'], DECIMALS);?></span></td>
									<td class="width10"><input type="number" class="form-control width90 qty-item" id="<?= $s_invoice['product_id'];?>" value="<?= $s_invoice['quantity'];?>"></td>
									<td class="width15"><span class="text-center total-price-item total-price-item-<?= $s_invoice['product_id'];?>"><?= number_format(($s_invoice['price']*$s_invoice['quantity']), DECIMALS);?></span>
									</td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
						
						</tbody>
					</table>
					</div>
				</div>
				<div class="sale-products">
					<div id="inner-content-div">
						<ul class="list-inline sp vertical default_list" >
							<?php foreach ($products as $key => $product): ?>
								<li class="item-products cursor-pointer" id="<?= $product->id?>" sku="<?= $product->sku?>">
									<?php if (isset($product->images[0])): ?>
										<img class="thumb-picture" src="/img/<?= $product->images[0]->thumbnail?>" width="140px"/>
									<?php else: ?>
										<img class="thumb-picture" src="/img/no.png" width="140px"/>
									<?php endif ?>
									<div class="clearfix"></div>
									<span class="products-price auto"><?= $product->retail_price;?></span>
									<div class="title-product-sale ">
									<span class="hidden"><?= $product->product_name;?></span>
										<?php
											if (strlen($product->product_name)<19) echo $product->product_name;
												else echo substr($product->product_name, 0,19).'...';
										?>
									</div>
								</li>
							<?php endforeach ?>	
						</ul>
					</div>
				</div>
			</div><div class="divider10 clearfix"></div>
		</div>

		<div class="col-lg-3 col-md-3">
			<div class="clearfix">
				<div role="tabpanel">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#tab1" role="tab" data-toggle="tab">Infomation</a></li>
						<li role="presentation"><a href="#tab2" role="tab" data-toggle="tab">Extra</a></li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content infomation-bill">
							<div role="tabpanel" class="tab-pane active" id="tab1">
								<?php
									echo $this->Form->input(__('customers'),[
										'options' => $customers,
										'append' => [
                                            $this->Html->tag('span', '<i class="fa fa-plus"></i>', ['class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModal2'])]
                                        ]); 
								?>
								<?php echo $this->Form->input('note', ['type' => 'textarea']); ?>
							</div>
							<div role="tabpanel" class="tab-pane" id="tab2">
								<?php
									echo $this->Form->input(__('users'),['options' => $users,'default'=>$user_info['id']]); 
									echo $this->Form->input('date', ['disabled','value' =>date("Y-m-d H:i:s")]);
								?>
							</div>
						</div>
				</div>
			</div>
			<div class="table-responsive">
	            <table class="table table-striped border-bottom border-left border-right">
					<tr>
						<td class="width50">Total Price</td>
						<td class="width50"><span class="auto" id="total-bill">
						<?php if (isset($S_Invoices['invoices'][0]['total'])) {
							echo number_format($S_Invoices['invoices'][0]['total'],DECIMALS);
						} ?>
						</span> VNĐ</td>
					</tr>
					<tr>
						<td class="width50">Discount</td>
						<td class="width50"><input type="number" class="form-control discount-bill width50" value="<?php if (isset($S_Invoices['invoices'][0]['discount']) && is_numeric($S_Invoices['invoices'][0]['discount'])) {
							echo number_format($S_Invoices['invoices'][0]['discount'],DECIMALS);
						} else {
							echo 0;
						} ?>"></td>
					</tr>
					<tr>
						<td class="width50">Paid</td>
						<td class="width50"><span class="auto" id="customers-paid">
						<?php if (isset($S_Invoices['invoices'][0]['customers_paid']) && is_numeric($S_Invoices['invoices'][0]['customers_paid'])) {
							echo number_format($S_Invoices['invoices'][0]['customers_paid'],DECIMALS);
						} else {
							echo 0;
						} ?>
						</span> VNĐ</td>
					</tr>
					<tr>
						<td class="width50">Khách thanh toán</td>
						<td class="width50"><input type="text" class="auto form-control money" value="<?= @number_format($S_Invoices['invoices'][0]['money'],DECIMALS); ?>" placeholder="VNĐ"></td>
					</tr>
					<tr>
						<td class="width50"></td>
						<td class="width50"><span id="return-money">
						<?php if (isset($S_Invoices['invoices'][0]['return_money']) && is_numeric($S_Invoices['invoices'][0]['return_money'])) {
							echo number_format($S_Invoices['invoices'][0]['return_money'],DECIMALS);
						} else {
							echo 0;
						}?>
						</span> VNĐ</td>
					</tr>
				</table>
				
				<input tabindex="1001" type="radio" class="icheck" cid="1" id="input-1001" checked name="billradio">
				<label class="cursor-pointer" id="1" for="input-1001">Tiền thừa trả khách</label>
				<div class="clearfix"></div>
				<input tabindex="1002" type="radio" class="icheck" cid="2" id="input-1002" name="billradio">
				<label class="cursor-pointer" id="2" for="input-1002">Tính vào công nợ</label>
				<div class="divider10 clearfix"></div>
				<button class="btn btn-success float-right" id="saveInvoice">Thanh toán</button>
			</div>
		</div>
	</div>
</div>
<div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Customers</h4>
            </div>
             <div class="modal-body row">
                <div class="panel-body">
                    <div role="tabpanel">
                        <?php echo $this->Form->create('add',['id'=>'AddCustomerSales']);?>

                        <div class="col-lg-6 col-md-6">
                            <?php
                                echo $this->Form->input('name',['id'=>'CustomersName']);
                                echo $this->Form->label('Type');
                                echo $this->Form->select('customer_group', [CUSTOMER_VIP => 'VIP', CUSTOMER_WHOLESALE => 'WHOLESALE', CUSTOMER_RETAIL => 'RETAIL']);
                            ?>
                            <div class="divider15"></div>
                            <?php 
                                echo $this->Form->input('email');
                                echo $this->Form->input('tel');
                                echo $this->Form->input('address');
                            ?>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <?php 
                                echo $this->Form->input('location');
                                echo $this->Form->input('date_of_birth', ['class' => 'onlydate']);
                                echo $this->Form->input('tax_registration_number');
                                echo $this->Form->input('note');
                                echo $this->Form->radio('gender',[0 => 'Male', 1 => 'Female'],['default' => 1]);
                            ?>
                        </div>
                    </div>
                </div>
            </div> <!-- modal-body -->
            <div class="modal-footer">
                <?= $this->Form->button('Submit',array('class' => 'btn btn-success','id'=>'add-customer-sales')); ?>
               <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

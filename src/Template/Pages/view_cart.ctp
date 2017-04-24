
<div id="content">
	<div class="content-page woocommerce">
		<div class="container">
			<div class="cart-content-page">
				<h2 class="title-shop-page">my cart</h2>
				<div class="col-md-12 item-unavailable" id="AddNewIqr" inqid="">
					<div class="col-md-4">
						<label><?php echo __("Vessel Name"); ?></label>
						<input type="text" class="form-control vessel" name="">
					</div>
					<div class="col-md-4">
						<label><?php echo __("IMO No"); ?></label>
						<input type="text" class="form-control imo_no" name="">
					</div>
					<div class="col-md-4">
						
						<label><?php echo __("Hull No"); ?></label>
						<input type="text" class="form-control hull_no" name="">
					</div>
					<div class="col-md-4">
						<label><?php echo __("Date"); ?></label>
						<input type="text" class="form-control date" value="<?php echo date("Y-m-d"); ?>" name="">
					</div>
					<div class="col-md-4">
						<label><?php echo __("Ref"); ?></label>
						<input type="text" class="form-control ref" name="">
					</div>
					<div class="clearfix"></div>
					<div class="col-md-12">
						<label><?php echo __("Description"); ?></label>
						<textarea class="form-control description" rows="5"></textarea>
					</div>
				</div>
				<div class="table-responsive">
					<table cellspacing="0" class="shop_table my_order cart table">
						<thead>
							<tr>
								<th class="text-center product-remove"><?php echo __('#'); ?></th>
								<!-- <th class="text-center product-thumbnail"><?php echo __('Picture'); ?></th> -->
								<th class="text-center product-name" style="max-width: 100px;"><?php echo __('Name'); ?></th>
								<th class="text-center product-quantity"><?php echo __('Category'); ?></th>
								<th class="text-center product-subtotal"><?php echo __('Type Model'); ?></th>
								<th class="text-center product-thumbnail"><?php echo __('Serial No'); ?></th>
								<th class="text-center product-thumbnail"><?php echo __('Origin'); ?></th>
								<th class="text-center product-quantity"><?php echo __('Quantity'); ?></th>
								<th class="text-center product-quantity"><?php echo __('Unit'); ?></th>
								<th class="text-center product-subtotal"><?php echo __('Remark'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty($this->request->session()->read('Cart'))): ?>
								<?php foreach ($this->request->session()->read('Cart') as $key => $products): ?>
									
									<tr class="cart_item cart_item_<?php echo $products->id ?>" id="<?php echo $products->id ?>">
										<td class="text-center product-remove">
											<span class="remove-items" product_id="<?php echo $products->id ?>"><i class="fa fa-times"></i></span>
										</td>
										
										<td class="text-center product-name">
											<?= $this->Html->link($products->product_name, ['controller'=>'pages','action'=>'products', $products->id], array('escape' => false)); ?>
										</td>
										<td class="text-center product-name">
											<?= $products->category['name'] ?>
										</td>
										<td class="text-center product-name">
											<?= $products->type_model ?>
										</td>
										<td class="text-center product-name">
											<?= $products->serial_no ?>
										</td>
										<td class="text-center product-name">
											<?= $products->origin ?>
										</td>
										<td class="text-center product-quantity">
											 <div class="info-qty" id="<?php echo $key; ?>">
												<a href="#" class="qty-down qty-down-<?php echo $key; ?>"><i class="fa fa-angle-left"></i></a>
													<span class="qty-val"><?php echo '1' ?></span>
												<a href="#" class="qty-up qty-up-<?php echo $key; ?>"><i class="fa fa-angle-right"></i></a>
											</div>			
										</td>
										<td class="text-center product-name">
											<?= $products->unit ?>
										</td>
										<td class="text-center product-subtotal">
											<span class="amount"><textarea class="form-control remark-item" rows="2" cols="30" id="comment"></textarea></span>
										</td>
									</tr>
								<?php endforeach ?>
							<?php endif ?>
							
						</tbody>
					</table>
					<button id="update_cart" class="float-right">Submit</button>
				</div>
			</div>
		</div>	
	</div>
</div>

	<?php echo $this->Html->image('loader.gif',['class' => 'loader3', "style"=>"display: none;"]) ?>
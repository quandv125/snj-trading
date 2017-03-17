<div id="content">
		<div class="content-page woocommerce">
			<div class="container">
				<div class="cart-content-page">
					<h2 class="title-shop-page">my cart</h2>
					<form method="post">
						<div class="table-responsive">
							<table cellspacing="0" class="shop_table cart table">
								<thead>
									<tr>
										<th class="product-remove"><?php echo __('#'); ?></th>
										<th class="product-thumbnail"><?php echo __('Picture'); ?></th>
										<th class="product-name"><?php echo __('Name'); ?></th>
										<th class="product-quantity"><?php echo __('Category'); ?></th>
										<th class="product-subtotal"><?php echo __('Type Model'); ?></th>
										<th class="product-thumbnail"><?php echo __('Serial No'); ?></th>
										<th class="product-thumbnail"><?php echo __('Origin'); ?></th>
										<th class="product-quantity"><?php echo __('Quantity'); ?></th>
										<th class="product-subtotal"><?php echo __('Remark'); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($this->request->session()->read('Cart'))): ?>
										<?php foreach ($this->request->session()->read('Cart') as $key => $products): ?>
											
											<tr class="cart_item_<?php echo $products->id ?>">
												<td class="product-remove">
													<span class="remove-items" product_id="<?php echo $products->id ?>"><i class="fa fa-times"></i></span>
												</td>
												<td class="product-thumbnail"> <!-- Picture -->
													<?= $this->Html->link($this->Html->image($products->thumbnail,['width'=>70]), ['controller'=>'pages','action'=>'products',$products->id], array('escape' => false)); ?>
												</td>
												<td class="product-name">
													
													<?= $this->Html->link($products->product_name, ['controller'=>'pages','action'=>'products', $products->id], array('escape' => false)); ?>
												</td>
												<td class="product-name">
													<?= $products->category['name'] ?>
												</td>
												<td class="product-name">
													<?= $products->type_model ?>
												</td>
												<td class="product-name">
													<?= $products->serial_no ?>
												</td>
												<td class="product-name">
													<?= $products->origin ?>
												</td>
												<td class="product-quantity">
													<div class="info-qty">
														<a href="#" class="qty-down"><i class="fa fa-angle-left"></i></a>
														<span class="qty-val">1</span>
														<a href="#" class="qty-up"><i class="fa fa-angle-right"></i></a>
													</div>			
												</td>
												<td class="product-subtotal">
													<span class="amount"><textarea class="form-control" rows="3" cols="3" id="comment"></textarea></span>
												</td>
											</tr>
										<?php endforeach ?>
									<?php endif ?>
									
									<tr>
										<td class="actions" colspan="9">
											<!-- <div class="col-md-4" style="border: 1px solid;">1</div><div class="col-md-4" style="border: 1px solid;">1</div><div class="col-md-4" style="border: 1px solid;">1</div>
											<div class="col-md-4" style="border: 1px solid;">1</div><div class="col-md-4" style="border: 1px solid;">1</div><div class="col-md-4" style="border: 1px solid;">1</div>
											<div class="con-md-12" style="border: 1px solid;">1</div> -->
											<input type="submit" value="Create Quotation" name="update_cart" class="button">
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</form>

					<!-- <div class="cart-collaterals">
						<div class="cart_totals ">
							<h2>Cart Totals</h2>
							<div class="table-responsive">
								<table cellspacing="0" class="table">
									<tbody>
										<tr class="cart-subtotal">
											<th>Subtotal</th>
											<td><strong class="amount">$106.00</strong></td>
										</tr>
										<tr class="shipping">
											<th>Shipping</th>
											<td>
												<ul id="shipping_method">
													<li>
														<input type="radio" class="shipping_method" checked="checked" value="free_shipping" id="shipping_method_0_free_shipping" data-index="0" name="shipping_method->id">
														<label for="shipping_method_0_free_shipping">Free Shipping</label>
													</li>
													<li>
														<input type="radio" class="shipping_method" value="local_delivery" id="shipping_method_0_local_delivery" data-index="0" name="shipping_method->id">
														<label for="shipping_method_0_local_delivery">Local Delivery (Free)</label>
													</li>
													<li>
														<input type="radio" class="shipping_method" value="local_pickup" id="shipping_method_0_local_pickup" data-index="0" name="shipping_method->id">
														<label for="shipping_method_0_local_pickup">Local Pickup (Free)</label>
													</li>
												</ul>
											</td>
										</tr>
										<tr class="order-total">
											<th>Total</th>
											<td><strong><span class="amount">$106.00</span></strong> </td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="wc-proceed-to-checkout">
								<a class="checkout-button button alt wc-forward" href="#">Proceed to Checkout</a>
							</div>
						</div>
					</div> -->
				</div>
			</div>	
		</div>
		<!-- End Content Page -->
	</div>
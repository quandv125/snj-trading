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
										<th class="product-remove">#</th>
										<th class="product-thumbnail">Picture</th>
										<th class="product-name">Product</th>
										<th class="product-price">Price</th>
										<th class="product-quantity">Quantity</th>
										<th class="product-subtotal">Total</th>
									</tr>
								</thead>
								<tbody>
								<?php if (!empty($this->request->session()->read('Cart'))): ?>
									
								
								<?php foreach ($this->request->session()->read('Cart') as $key => $products): ?>
									<tr class="cart_item_<?php echo $products[0] ?>">
										<td class="product-remove">
											<span class="remove-items" product_id="<?php echo $products[0] ?>"><i class="fa fa-times"></i></span>
										</td>
										<td class="product-thumbnail">
											
											<?php echo $this->Html->link($this->Html->image($products[3],['width'=>70]), ['controller'=>'pages','action'=>'products',$products[0]], array('escape' => false)); ?>
										</td>
										<td class="product-name">
											<a href="#"><?php echo $products[1] ?> </a>					
										</td>
										<td class="product-price">
											<span class="amount"><?php echo number_format( $products[2], DECIMALS)?></span>					
										</td>
										<td class="product-quantity">
											<div class="info-qty">
												<a href="#" class="qty-down"><i class="fa fa-angle-left"></i></a>
												<span class="qty-val">1</span>
												<a href="#" class="qty-up"><i class="fa fa-angle-right"></i></a>
											</div>			
										</td>
										<td class="product-subtotal">
											<span class="amount"><?php echo number_format( $products[2], DECIMALS)?></span>					
										</td>
									</tr>
								<?php endforeach ?>
								<?php endif ?>
									
									<tr>
										<td class="actions" colspan="6">
											<div class="coupon">
												<!-- <label for="coupon_code">Coupon:</label> 
												<input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">  -->
												<!-- <input type="submit" value="Apply Coupon" name="apply_coupon" class="button"> -->
											</div>
											
											<!-- <input type="submit" value="Create Quotation" name="update_cart" class="button">			 -->
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
														<input type="radio" class="shipping_method" checked="checked" value="free_shipping" id="shipping_method_0_free_shipping" data-index="0" name="shipping_method[0]">
														<label for="shipping_method_0_free_shipping">Free Shipping</label>
													</li>
													<li>
														<input type="radio" class="shipping_method" value="local_delivery" id="shipping_method_0_local_delivery" data-index="0" name="shipping_method[0]">
														<label for="shipping_method_0_local_delivery">Local Delivery (Free)</label>
													</li>
													<li>
														<input type="radio" class="shipping_method" value="local_pickup" id="shipping_method_0_local_pickup" data-index="0" name="shipping_method[0]">
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
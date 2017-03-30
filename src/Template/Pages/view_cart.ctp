
<div id="content">
		<div class="content-page woocommerce">
			<div class="container">
				<div class="cart-content-page">
					<h2 class="title-shop-page">my cart</h2>
					
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

													 	<!--<a href="#" class="qty-down qty-down-<?php echo $key; ?>"><i class="fa fa-angle-left"></i></a>
														<span class="qty-val">1</span>
														<a href="#" class="qty-up qty-up-<?php echo $key; ?>"><i class="fa fa-angle-right"></i></a> -->

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
							<button id="update_cart" class="float-right">Create Quotation</button>
						</div>
					
				</div>
			</div>	
		</div>
	</div>

	<?php echo $this->Html->image('loader.gif',['class' => 'loader3', "style"=>"display: none;"]) ?>
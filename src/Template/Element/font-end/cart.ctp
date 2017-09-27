
<div class="mini-cart mini-cart-2">
		<span  class="header-mini-cart2" style="cursor: pointer;" data-toggle="modal" data-target="#myCart">
			<span class="total-mini-cart-icon">
				<i class="fa fa-shopping-basket" style="margin-right: 2px;margin-top: 9px;"></i>
			</span>
			<span class="total-mini-cart-item"><?php echo count($this->request->session()->read('Cart')); ?></span>
		</span>
</div>

	<!-- Modal -->
	<div class="modal fade" id="myCart" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
					<br>
					<button type="button" class="close" data-dismiss="modal" style="margin-right: 25px;">&times;</button>
					<h4 class="title-shop-page"> <?= $this->Html->image('logo.png',['url'=>['controller'=> 'pages','action' =>'index'],'width'=>'150px']) ?>
					</h4>
				<div class="modal-body">
					<table class="table table-striped">
						<tbody id="modal-mycart">
							
							<?php if (!empty($this->request->session()->read('Cart'))): ?>
								<?php foreach ($this->request->session()->read('Cart') as $key => $products): ?>
									
									<tr class="cart_item cart_item_<?php echo $products->id ?>" id="<?php echo $products->id ?>" >
										<td style="width: 220px;"><?= $this->Html->image($products->thumbnail)?></td>
										
										<td class="text-center product-name" style="width: 300px;">
											<?= $this->Html->link($products->product_name, ['controller'=>'pages','action'=>'products', $products->id], array('escape' => false)); ?>
										</td>
										<td><span><?= number_format($products->retail_price, DECIMALS) ?> VNĐ </span></td>
										<td class="text-center product-quantity">
											 <div class="info-qty" id="<?php echo $key; ?>">
												<a href="#" class="qty-down qty-down-<?php echo $key; ?>"><i class="fa fa-angle-left"></i></a>
													<span class="qty-val"><?php echo $products->quantity ?></span>
												<a href="#" class="qty-up qty-up-<?php echo $key; ?>"><i class="fa fa-angle-right"></i></a>
											</div>			
										</td>
										<td class="text-center product-remove" style="width: 40px">
											<span class="remove-items" product_id="<?php echo $products->id ?>"><i class="fa fa-trash"></i></span>
										</td>
										
									</tr>
								<?php endforeach ?>
							<?php endif ?>
						</tbody>
					</table>

				</div>
				<div class="modal-footer">
					<?php if (isset($user_info) && !empty($user_info)): ?>
						<a href="/pages/accounts#/viewcart">
							<button class="bt-link bt-blue bt-radius bt-style23"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Checkout</button>

						</a>
					<?php else: ?>
						<?php echo $this->Html->link(__('Login/Register'),['controller'=>"users",'action'=>"login"],['class'=>'btn btn-sussces']) ?>
					<?php endif ?>
				</div>
				
			</div>
		</div>
	</div>

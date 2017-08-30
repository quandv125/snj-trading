

<!-- <div class="mini-cart mini-cart-2"> -->
 
		<?php //echo $this->Html->link('<span class="total-mini-cart-icon"><i class="fa fa-shopping-basket"></i></span>
			 // <span class="total-mini-cart-item">'.count($this->request->session()->read('Cart')).'</span>',
				//    ['controller'=>'pages','action'=> 'view_cart'],
					//  ['escape'=> false,'class'=>'header-mini-cart2']); 
		?>
	
		 <!-- <?php // if (!empty($this->request->session()->read('Cart'))): ?>
				<div class="content-mini-cart">
						<h2>(<?php // echo count($this->request->session()->read('Cart')) ?>) ITEMS IN MY CART</h2>
						<ul class="list-mini-cart-item">
										 <?php // foreach ($this->request->session()->read('Cart') as $key => $products): ?>
								<li>
										<div class="mini-cart-thumb">
												<?php // echo $this->Html->link($this->Html->image($products[3],['width'=>70]), ['controller'=>'pages','action'=>'products',$products[0]], array('escape' => false)); ?>
										</div>
										<div class="mini-cart-info">
												<h3><a href="#"><?php // echo $products[1] ?></a></h3>
										</div>
								</li>
									<?php // endforeach ?>
						</ul>
						<div class="mini-cart-button">
						 <?php // echo $this->Html->link('view my cart', ['controller'=>'pages','action'=> 'view_cart'], ['escape'=> false,'class'=>'mini-cart-view']); ?>
								<a class="mini-cart-checkout" href="#">Checkout</a>
						</div>
				</div>
			 <?php // endif ?> -->
<!-- </div> -->

<div class="mini-cart mini-cart-2">
 <!--  <span class="total-mini-cart-icon" style="cursor: pointer;" data-toggle="modal" data-target="#myModal">
				<i class="fa fa-shopping-basket" style="margin-right: 2px;margin-top: 9px;"></i></span> -->
		<!-- <a href="/pages/accounts#/viewcart" class="header-mini-cart2"><span class="total-mini-cart-icon"> -->
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
										<td><?= $products->retail_price ?></td>
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
							<button class="btn btn-sussces float-right">Checkout</button>
						</a>
				 	<?php else: ?>
				 		<?php echo $this->Html->link('Login/Register',['controller'=>"users",'action'=>"login"],['class'=>'btn btn-sussces']) ?>
				 	<?php endif ?>
			      </div>
				
			</div>
		</div>
	</div>
</div>
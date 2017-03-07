
<div class="main-content-shop">
	<div class="detail-fullwidth">
		<div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12">
				<div class="main-detail">
					<div class="row">
						<div class="col-md-7 col-sm-12 col-xs-12">
							<div class="detail-gallery-fullwidth min-height-460">
								<div class="mid">
									<?php echo $this->Html->image($product->images[0]['path'],['width' => 440])?>
									
									<p><i class="fa fa-search"></i> Mouse over to zoom in</p>
								</div>
								<div class="carousel-fullwidth">
									<a href="#" class="vertical-control vertical-next"><i class="fa fa-angle-up"></i></a>
									<div class="carousel">
										<ul>
										<?php foreach ($product->images as $key => $image): ?>
											<li><a href="#"><?php echo $this->Html->image($image['path'])?></a></li>
										<?php endforeach ?>
											
										</ul>
									</div>
									<a href="#" class="vertical-control vertical-prev"><i class="fa fa-angle-down"></i></a>
								</div>
							</div>
							<!-- End Gallery -->
						</div>
						<div class="col-md-5 col-sm-12 col-xs-12">
							<div class="detail-info detail-info-fullwidth">
								<h2 class="title-detail"><?php echo $product->product_name; ?></h2>
								<!-- <div class="product-rating">
									<div class="inner-rating" style="width:100%"></div>
								</div> -->
								<!-- <div class="product-order">
									<span></span>
								</div> -->

								<div class="attr-info">
									<label>Part No: </label> <span><?php echo 'SP.'.str_pad($product->sku, ZEROFILL, ZERO, STR_PAD_LEFT); ?></span>
								</div>
								<div class="attr-info">
									<label>Categories: </label> <span><?php echo $this->Html->link($product->category['name'],['controller'=>'Pages','action'=>'categories',$product->category['id']]) ?></span>
								</div>
								<div class="attr-info">
									<label>Maker's Name: </label> <span><?php echo $this->Html->link($product->supplier['name'],['controller'=>'Pages','action'=>'categories',$product->category['id']]) ?></span>
								</div>
								<div class="attr-info">
									<label>Availability: </label> <span>In stock</span>
								</div>

								<div class="attr-info">
									<label>Serial No: </label> <span><?php echo $product->serial_no ?></span>
								</div>
								<div class="attr-info">
									<label>Type Model: </label> <span><?php echo $product->type_model ?></span>
								</div>
								<div class="attr-info">
									<label>Quantity: </label> <span><?php echo $product->quantity ?></span>
								</div>
								<div class="attr-info">
									<label>Origin: </label> <span><?php echo $product->origin ?></span>
								</div>

								<div class="attr-info">
									<label>Remark:</label>
									
								</div>
								<div class="info-price info-price-detail">
									<!-- <label>Price:</label> <span><?php //echo number_format( $product->retail_price, DECIMALS); ?></span>
									<del>$17.96</del> -->
									<p><?php echo $product->short_description ?></p>
								</div> 
								<div class="attr-info">
									<!-- <div class="attr-product">
										<label>Color</label>
										<div class="attr-color">
											<ul class="list-color2">
												<li><a href="#" style="background:#fff;border:1px solid #e5e5e5"></a></li>
												<li><a href="#" style="background:#e66054"></a></li>
												<li class="active"><a href="#" style="background:#d0b7cc"></a></li>
												<li><a href="#" style="background:#107a8e"></a></li>
												<li><a href="#" style="background:#b9cad2"></a></li>
												<li><a href="#" style="background:#a7bc93"></a></li>
												<li><a href="#" style="background:#d3b627"></a></li>
											</ul>
										</div>
									</div>
									<div class="attr-product">
										<label>Size</label>
										<div class="attr-size">
											<ul class="list-size2">
												<li><a href="#">M</a></li>
												<li class="active"><a href="#">L</a></li>
												<li><a href="#">XL</a></li>
												<li><a href="#">XXL</a></li>
											</ul>
										</div>
										<span class="size-chart">Size Chart</span>
									</div>
									<div class="attr-product attr-product-qty">
										<label>Qty</label>
										<div class="info-qty">
											<a class="qty-down" href="#"><i class="fa fa-minus"></i></a>
											<span class="qty-val">1</span>
											<a class="qty-up" href="#"><i class="fa fa-plus"></i></a>
										</div>
									</div> -->
									<span class="addcart-link cursor-point" price="<?= $product->retail_price;?>" name="<?= $product->product_name; ?>" product_id="<?= $product->id; ?>" picture="<?php echo $product->images[0]['thumbnail'] ?>">
										<i class="fa fa-shopping-cart"></i> Add to Cart
									</span>
									<!-- <div class="product-social-extra">
										<a class="wishlist-link" href="#"><i class="fa fa-heart-o"></i></a>
										<a class="compare-link" href="#"><i class="fa fa-toggle-on"></i></a>
										<a class="email-link" href="#"><i class="fa fa-envelope"></i></a>
										<a class="print-link" href="#"><i class="fa fa-print"></i></a>
										<a class="share-link" href="#"><i class="fa fa-share"></i></a>
									</div> -->
								</div>
								<!-- End Attr Info -->
							</div>
							<!-- Detail Info -->
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="sidebar-detail">
					<div class="work-info-head">
						<div class="work-icon">
							<i class="fa fa-globe" aria-hidden="true"></i>
						</div>
						<div class="work-info">
							<h3><a href="#">Trade Assurance</a></h3>
						</div>
					</div>
					<ul>
						<!-- <?php // if ($user_info['group_id'] == ADMIN): ?>
							<li>
								<div class="work-icon">
									<div class="sold-by"><?= __('Sold by'); ?></div>
								</div>
								<div class="work-info">
									<h3><?php // echo $this->Html->link($product->user['username'],['controller' => 'pages', 'action' => 'suppliers',$product->user['id']]); ?></h3>
								</div>
							</li>
						<?php // endif ?> -->
						<li>
							<div class="work-icon">
								<i class="fa fa-shield" aria-hidden="true"></i>
							</div>
							<div class="work-info">
								<h3><a href="#">Safety & Security</a></h3>
							</div>
						</li>
						<li>
							<div class="work-icon">
								<i class="fa fa-users" aria-hidden="true"></i>
							</div>
							<div class="work-info">
								<h3><a href="#">Your Account</a></h3>
							</div>
						</li>
						<li>
							<div class="work-icon">
								<i class="fa fa-line-chart" aria-hidden="true"></i>
							</div>
							<div class="work-info">
								<h3><a href="#">Contact Suppliers</a></h3>
							</div>
						</li>
						<li>
							<div class="work-icon">
								<i class="fa fa-clock-o" aria-hidden="true"></i>

							</div>
							<div class="work-info">
								<h3><a href="#">Speed</a></h3>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Main Detail -->
		<div class="tab-detail">
			<div class="title-tab-detail">
				<ul role="tablist">
					<li class="active"><a href="#details" data-toggle="tab">Product Details </a></li>
					<li><a href="#feedback" data-toggle="tab"> Seller Guarantees</a></li>
					<li><a href="#shipping" data-toggle="tab">Shipping & Payment</a></li>
					
				</ul>
			</div>
			<div class="content-tab-detail">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="details">
						<div class="inner-content-tab-detail">
							<?= $product->description ?>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="feedback">
						<div class="inner-content-tab-detail">
							<h2>Review</h2>
							<p>Donec pede justo, fringilla vel, aliquet nec, vulpu tate eget. Sed quia consequuntur magni dolores. Id eges tas massa sem et elit. Donec pede justo, fringilla vel, aliquet nec, vulpu tate eget. Sed quia consequuntur magni dolores. Id eges tas massa sem et elit.</p>
							<p>Qenean commodo ligula eget dolor. Aenean massa. Cumt sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla onsequat mas quis enim. Donec pede justo, fringilla vel, aliquet nec, vulpu tate eget. Sed quia consequuntur magni dolores. Id eges tas massa sem et elit. Viva mus semper cursus libero</p>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="shipping">
						<div class="table-content-tab-detail">
							<div class="title-table-detail"><span>Return Policy</span></div>
							<div class="icon-table-detail"><?php echo $this->Html->image('assets/grid/rv1.png') ?></div>
							<div class="info-table-detail">
								<p>If the product you receive is not as described or low quality, the seller promises that you may return it before order completion (when you click ‘Confirm Order Received’ or exceed confirmation timeframe) and receive a full refund. The return shipping fee will be paid by you. Or, you can choose to keep the product and agree the refund amount directly with the seller.</p>
							</div>
						</div>
						<div class="table-content-tab-detail">
							<div class="title-table-detail"><span>Seller Service</span></div>
							<div class="icon-table-detail"><?php echo $this->Html->image('assets/grid/rv2.png') ?></div>
							<div class="info-table-detail">
								<h3>On-time Delivery</h3>
								<p>If you do not receive your purchase within 60 days, you can ask for a full refund before order completion (when you click ‘Confirm Order Received’ or exceed confirmation timeframe).</p>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!-- End Tab Detail -->
		
		<div class="upsell-detail">
			<h2 class="title-default">Products Related To This Item </h2>
			<div class="upsell-detail-slider">
				<div class="wrap-item" data-navigation="true" data-pagination="false" data-itemscustom="[[0,1],[480,2],[768,3],[1200,4]]">
					<?php foreach ($products as $key => $cat): ?>
						
					<div class="item" style="max-width: 195px;">
						<div class="item-product">
							<div class="product-thumb">
								<a class="product-thumb-link" href="<?php echo $this->Url->build(array('controller'=>'pages','action'=>'products',$cat->id)) ?>">
									<?= $this->Html->image($cat->images[0]['thumbnail'],['class'=>'first-thumb','width' => 193])?>
									<?= $this->Html->image($cat->images[0]['thumbnail'],['class'=>'second-thumb','width' => 193])?>
									
								</a>
								<div class="product-info-cart">
									<div class="product-extra-link">
										<a class="wishlist-link" href="#"><i class="fa fa-heart-o"></i></a>
										<a class="compare-link" href="#"><i class="fa fa-toggle-on"></i></a>
										<a class="quickview-link" href="#"><i class="fa fa-search"></i></a>
									</div>
									
									<span class="addcart-link cursor-point" price="<?= $cat->retail_price;?>" name="<?= $cat->product_name; ?>" product_id="<?= $cat->id; ?>" picture="<?php echo $cat->images[0]['thumbnail'] ?>">
										<i class="fa fa-shopping-cart"></i> Add to Cart
									</span>
								</div>
							</div>
							<div class="product-info">
								<h3 class="title-product">
									<?php echo $this->Html->link($cat->product_name,[ 'controller' => 'Pages',  'action' => 'products',$product->id]) ?>
								</h3>
<!-- 								<div class="info-price">
									<span><?php //	 echo number_format( $cat->retail_price, DECIMALS); ?></span>
								</div> -->
								<!-- <div class="product-rating">
									<div class="inner-rating" style="width:100%"></div>
									<span>(6s)</span>
								</div> -->
							</div>
						</div>
					</div>
					<?php endforeach ?>
					<!-- End Item -->
				</div>
			</div>
		</div>
		<!-- End Upsell Detail -->
	</div>
</div>
<!-- End Main Content Shop -->
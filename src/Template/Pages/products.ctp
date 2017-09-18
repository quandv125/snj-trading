
<div class="main-content-shop">
	<div class="detail-fullwidth">
		<div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12">
				<div class="main-detail">
					<div class="row">
						<div class="col-md-7 col-sm-12 col-xs-12">
							<div class="detail-gallery-fullwidth min-height-460">
								<div class="mid">
									<?= $this->Html->image($product->images[0]['path'])?>
									
									<p><i class="fa fa-search"></i> <?php echo __("Mouse over to zoom in") ?></p>
								</div>
								<div class="carousel-fullwidth">
									<a href="#" class="vertical-control vertical-next"><i class="fa fa-angle-up"></i></a>
									<div class="carousel">
										<ul>
										<?php foreach ($product->images as $key => $image): ?>
											<?php if ($key <= 8	): ?>
												<li><a href="#"><?= $this->Html->image($image['thumbnail'],['ref'=> '/img/'.$image['path']])?></a></li>
											<?php endif ?>
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
								<h2 class="title-detail"><?= $product->product_name; ?></h2>
								<div class="product-rating">
									<div class="inner-rating" style="width:100%"></div>
								</div>
								<div class="info-price info-price-detail">
									<label>Price:</label>
									<?php if ($product->vat == 1): ?>
										<span>$ <?= number_format($product->retail_price + ($product->retail_price*0.1), 2);?></span>
										(VAT)
									<?php else: ?>
										<span>$ <?= number_format($product->retail_price, 2); ?></span>
									<?php endif ?>
									<!-- <del>$17.96</del> -->
								</div> 
								 <div class="table-responsive">
								<table class="table">
									<tbody>
										<tr>
											<td><b><?= __("Part No:")?></b></td>
											<td><?= 'SP.'.str_pad($product->sku, ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
											<td><b><?= __("Categories:")?></b></td>
											<td><?= $product->category['name']; ?></td>
										</tr>
										<tr>
											<td><b><?= __("Availability:")?></b></td>
											<td>In stock</td>
											<td><b><?= __("Serial No:")?></b></td>
											<td><?= $product->serial_no ?></td>
										</tr>
										<tr>
											<td><b><?= __("Type Model:")?></b></td>
											<td><?= $product->type_model ?></td>
											<td><b><?= __("Origin:")?></b></td>
											<td><?= $product->origin ?></td>
										</tr>
									</tbody>
								</table>
								</div>
								<?php if (!empty($product->short_description)): ?>
								<div class="attr-info">
									<label>Remark:</label>
									<p><?= $this->Myhtml->_Cutstring($product->short_description,200,200) ?></p>
								</div>
								<?php endif ?>
								<div class="clearfix"></div>
								<div class="attr-info">
									<!-- <br><div class="attr-product">
										<label>Color</label>
										<div class="attr-color">
											<a href="#" class="toggle-color">White</a>
											<ul class="list-color" style="display: none;">
												<li><a href="#">Black</a></li>
												<li><a href="#">Red</a></li>
												<li><a href="#">Green</a></li>
												<li><a href="#" class="selected">White</a></li>
												<li><a href="#">Pink</a></li>
											</ul>
										</div>
									</div>
									<div class="attr-product">
										<label>Size</label>
										<div class="attr-size">
											<a href="#" class="toggle-size">Select Size</a>
											<ul class="list-size" style="display: none;">
												<li><a href="#">S</a></li>
												<li><a href="#">M</a></li>
												<li><a href="#">L</a></li>
												<li><a href="#">XL</a></li>
												<li><a href="#">XXL</a></li>
											</ul>
										</div>
									</div> -->
									<div class="col-md-6">
										<div class="attr-product attr-product-qty">
										<label></label>
										<div class="info-qty">
											<span class="qty-down" href="#"><i class="fa fa-minus"></i></span>
											<span class="qty-val qty-prd-cart">1</span>
											<span class="qty-up" href="#"><i class="fa fa-plus"></i></span>
										</div>
									</div>
									</div>
									<div class="col-md-6">
										<span class="addcart-link addcart-link2 cursor-point" price="<?= $product->retail_price;?>" name="<?= $product->product_name; ?>" product_id="<?= $product->id; ?>" picture="<?= $product->images[0]['thumbnail'] ?>">
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
					<li><a href="#shipping" data-toggle="tab">Infomation</a></li>
				</ul>
			</div>
			<div class="content-tab-detail">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="details">
						<div class="inner-content-tab-detail">
							<?= $product->description ?>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="shipping"> 
						
						<div class="table-content-tab-detail">
							<div class="title-table-detail"><span><?= __("Item Number"); ?></span></div>
							<div class="info-table-detail">
								<p style="text-transform: capitalize;"><?= $product->sku ?></p>
							</div>
						</div>
						<div class="table-content-tab-detail">
							<div class="title-table-detail"><span><?= __("Product Name"); ?></span></div>
							<div class="info-table-detail">
								<p style="text-transform: capitalize;"><?= $product->product_name ?></p>
							</div>
						</div>
						<div class="table-content-tab-detail">
							<div class="title-infomation-detail"><span><?= __("Size"); ?></span></div>
							<div class="content-infomation-first">
								<p><?= $product->size ?></p>
							</div>
							<div class="title-infomation-detail"><span><?= __("Weight"); ?></span></div>
							<div class="content-infomation-second">
								<p style="text-transform: capitalize;"><?= $product->weight ?></p>
							</div>
						</div>
						<div class="table-content-tab-detail">
							<div class="title-infomation-detail"><span><?= __("Color"); ?></span></div>
							<div class="content-infomation-first">
								<p style="text-transform: capitalize;"><?= $product->color ?></p>
							</div>
							<div class="title-infomation-detail"><span><?= __("Meterial"); ?></span></div>
							<div class="content-infomation-second">
								<p style="text-transform: capitalize;"><?= $product->meterial ?></p>
							</div>
						</div>				
						<div class="table-content-tab-detail">
							<div class="title-infomation-detail"><span><?= __("Brand"); ?></span></div>
							<div class="content-infomation-first">
								<p style="text-transform: capitalize;"><?= $product->brand ?></p>
							</div>
							<div class="title-infomation-detail"><span><?= __("Origin"); ?></span></div>
							<div class="content-infomation-second">
								<p style="text-transform: capitalize;"><?= $product->origin ?></p>
							</div>
						</div>		

						<div class="table-content-tab-detail">
							<div class="title-table-detail"><span><?= __("Product Composition"); ?></span></div>
							<div class="info-table-detail">
								<p style="text-transform: capitalize;"><?= $product->composition ?></p>
							</div>
						</div>
						<div class="table-content-tab-detail">
							<div class="title-table-detail"><span><?= __("Issuing a receipt"); ?></span></div>
							<div class="info-table-detail">
								<p style="text-transform: capitalize;"></p>
							</div>
						</div>
						
						<div class="table-content-tab-detail">
							<div class="title-table-detail"><span><?= __("Release date of the same model"); ?></span></div>
							<div class="info-table-detail">
								<p><?php echo date_format($product->release_date, 'Y-m-d'); ?></p>
							</div>
						</div>
						<div class="table-content-tab-detail">
							<div class="title-table-detail"><span><?= __("Manufacturer"); ?></span></div>
							<div class="info-table-detail">
								<p style="text-transform: capitalize;"><?= $product->manufacturer ?></p>
							</div>
						</div>
						<div class="table-content-tab-detail">
							<div class="title-table-detail"><span><?= __("Country of manufacturer"); ?></span></div>
							<div class="info-table-detail">
								<p style="text-transform: capitalize;"><?= $product->origin ?></p>
							</div>
						</div>
						<?php if (isset($product->properties) && !empty(isset($product->properties))): ?>
							<?php foreach (json_decode($product->properties) as $key => $propertie): ?>
								<div class="table-content-tab-detail">
									<div class="title-table-detail" style="text-transform: capitalize;"><span><?= __($propertie->label); ?></span></div>
									<div class="info-table-detail">
										<p style="text-transform: capitalize;"><?= $propertie->value ?></p>
									</div>
								</div>
							<?php endforeach ?>
						<?php endif ?>
						<!-- <div class="table-content-tab-detail">
							<div class="title-table-detail"><span>Seller Service</span></div>
							<div class="icon-table-detail"><?= $this->Html->image('assets/grid/rv2.png') ?></div>
							<div class="info-table-detail">
								<h3>On-time Delivery</h3>
								<p>If you do not receive your purchase within 60 days, you can ask for a full refund before order completion (when you click ‘Confirm Order Received’ or exceed confirmation timeframe).</p>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Tab Detail -->
		<div class="upsell-detail">
			<h2 class="title-default">Products Related To This Item </h2>
		</div>
	
		<div class="wrap-item" data-pagination="false" data-navigation="true" data-autoplay="true"  data-itemscustom="[[0, 5]]" style="padding-left: 35px;">
			<?php foreach ($products as $key => $cat): ?>
				<div class="item" style="max-width: 195px;">
					<div class="item-product">
						<div class="product-thumb">
							<a class="product-thumb-link" href="<?= $this->Url->build(array('controller'=>'pages','action'=>'products',$cat->id)) ?>">
								<?= $this->Html->image($cat->images[0]['thumbnail'],['class'=>'first-thumb','width' => 193])?>
								<?= $this->Html->image($cat->images[0]['thumbnail'],['class'=>'second-thumb','width' => 193])?>
								
							</a>
							<div class="product-info-cart">
								<div class="product-extra-link">
									<a class="wishlist-link" href="#"><i class="fa fa-heart-o"></i></a>
									<a class="compare-link" href="#"><i class="fa fa-toggle-on"></i></a>
									<a class="quickview-link" href="#"><i class="fa fa-search"></i></a>
								</div>
								
								<span class="addcart-link addcart-link2 cursor-point" price="<?= $product->retail_price;?>" name="<?= $product->product_name; ?>" product_id="<?= $cat->id; ?>" picture="<?= $product->images[0]['thumbnail'] ?>">
									<i class="fa fa-shopping-cart"></i> Add to Cart
								</span>
							</div>
						</div>
						<div class="product-info">
							<h3 class="title-product">
								<?= $this->Html->link($this->Myhtml->_Cutstring($cat->product_name,15,15),[ 'controller' => 'Pages',  'action' => 'products',$product->id]) ?>
							</h3>
							<div class="info-price" style="font-size:1.8em;color:#ff0a0a;font-family:fantasy;font-style:italic;">
								<span>$ <?= number_format( $cat->retail_price, DECIMALS); ?></span>
							</div> 
							<div class="product-rating">
								<div class="inner-rating" style="width:100%"></div>
								
							</div>
						</div>
					</div>
				</div>
				<?php endforeach ?>
		</div>
	</div>
</div>
<!-- End Main Content Shop -->



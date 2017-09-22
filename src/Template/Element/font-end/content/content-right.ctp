<div class="hot-deal5" >
	<div class="special-slider-header">
		<h2 class="title-special"><?php echo __("hot deals") ?></h2>
	</div>
	<div class="hot-deal-slider5 simple-owl-slider slider-home5">
		<div class="wrap-item" data-pagination="false" data-autoplay="true" data-navigation="true" data-itemscustom="[[0, 1]]">
		<?php foreach ($products as $key => $product): ?>
			<?php if($key == 1) break; ?>
			<div class="item-hotdeal">
				<div class="hotdeal-countdown5_1" data-date="12/15/2016"></div>
				<div class="product-thumb">
					 <?php if (!empty($product->images)): ?>
					<a class="product-thumb-link" id="product-thumbs" href="pages/products/<?= $product->id?>">
						<?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'first-thumb'])  ?>
						<?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'second-thumb'])  ?>
					</a>
				<?php endif ?>
					<div class="product-info-cart">
						<div class="product-extra-link">
							<a class="wishlist-link" href="#"><i class="fa fa-heart-o"></i></a>
							<a class="compare-link" href="#"><i class="fa fa-toggle-on"></i></a>
							<a class="quickview-link_1" href="#"><i class="fa fa-search"></i></a>
						</div>
						
						<span class="addcart-link addcart-link2" product_id="<?= $product->id?>"><i class="fa fa-shopping-basket"></i><?php echo __("Add to Cart"); ?></span>
					</div>
				</div>
				<div class="product-info5">
					<h3 class="title-product"><?php echo $this->Html->link($product->product_name,[ 'controller' => 'Pages',  'action' => 'products',$product->id]) ?> </a></h3>
					<ul>
						<li>
							<div class="info-price">
								<span><?= number_format($product->retail_price, DECIMALS) ?> 원 </span>
								<div class="clearfix"></div>
								<del><?= number_format($product->retail_price, DECIMALS) ?> 원</del>
							</div>
						</li>
						<li>
							<span class="percent-sale">- 60%</span>
						</li>
						<!-- <li>
							<span class="count-order">129 Order</span>
						</li> -->
					</ul>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
<!-- End Hot Deal5 -->
<div class="special-slider">
	<div class="special-slider-header">
		<h2 class="title-special"><?php echo __("SPECIALs") ?></h2>
	</div>
	<div class="special-slider-content simple-owl-slider slider-home5">
		<div class="wrap-item" data-pagination="false" data-autoplay="true" data-navigation="true" data-itemscustom="[[0, 1]]">
			<div class="item-special">
				<ul>
					<?php echo $this->element('font-end/content/items-special',['products'=> $products]) ?>
				</ul>
			</div>
			<!-- ENd Item -->
			<div class="item-special">
				<ul>
					<?php echo $this->element('font-end/content/items-special',['products'=> $products]) ?>
				</ul>
			</div>
			<!-- ENd Item -->
		</div>
	</div>
</div>
<!-- End Special Slider -->
<div class="slide-adds">
	<div class="widget widget-adv">
		<h2 class="title-widget-adv">
			<strong><?php echo __('slide ads') ?></strong>
		</h2>
		<div class="wrap-item" data-pagination="true" data-autoplay="true" data-navigation="false" data-itemscustom="[[0, 1]]">
			<div class="item">
				<div class="item-widget-adv">
					<div class="adv-widget-thumb">
						<a href="#"><?php echo $this->Html->image('assets/images/sl01.jpg') ?></a>
					</div>
					<div class="adv-widget-info">
						<h3>Quality usinesswear </h3>
						<h2><span>from</span> 30% off</h2>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="item-widget-adv">
					<div class="adv-widget-thumb">
						<a href="#"><?php echo $this->Html->image('assets/images/sl12.jpg') ?></a>
					</div>
					<div class="adv-widget-info">
						<h3>New Collection</h3>
						<h2><span>from</span> 40% off</h2>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="item-widget-adv">
					<div class="adv-widget-thumb">
						<a href="#"><?php echo $this->Html->image('assets/images/sl22.jpg') ?></a>
					</div>
					<div class="adv-widget-info">
						<h3>Hanbags Style 2016</h3>
						<h2><span>from</span> 20% off</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Adv -->
</div>
<!-- End Slide Ads -->
<!-- <div class="latest-new5">
	<div class="special-slider-header">
		<h2 class="title-special"><?php echo __("Blog") ?></h2>
	</div>
	<div class="from-blog-slider slider-home5">
		<div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0, 1]]">
			<div class="item-blog5">
				<div class="wrap-from-blog">
					<div class="from-blog-thumb">
						<a href="#"><img src="../img/images/home2/blog.jpg" alt="" /></a>
					</div>
					<div class="from-blog-info">
						<p>Our Company is committed  client saction, reliability and safety! </p>
					</div>
				</div>
				<div class="from-blog-more">
					<ul>
						<li><i class="fa fa-calendar-o"></i> 15 March 2016</li>
						<li><i class="fa fa-comment-o"></i> 8</li>
					</ul>
				</div>
				<a href="#" class="readmore">Read more</a>
			</div>
			<div class="item-blog5">
				<div class="wrap-from-blog">
					<div class="from-blog-thumb">
						<a href="#"><img src="../img/images/home2/blog.jpg" alt="" /></a>
					</div>
					<div class="from-blog-info">
						<p>Our Company is committed  client saction, reliability and safety! </p>
					</div>
				</div>
				<div class="from-blog-more">
					<ul>
						<li><i class="fa fa-calendar-o"></i> 15 March 2016</li>
						<li><i class="fa fa-comment-o"></i> 8</li>
					</ul>  
				</div>
				<a href="#" class="readmore">Read more</a>
			</div>
			<div class="item-blog5">
				<div class="wrap-from-blog">
					<div class="from-blog-thumb">
						<a href="#"><img src="../img/images/home2/blog.jpg" alt="" /></a>
					</div>
					<div class="from-blog-info">
						<p>Our Company is committed  client saction, reliability and safety! </p>
					</div>
				</div>
				<div class="from-blog-more">
					<ul>
						<li><i class="fa fa-calendar-o"></i> 15 March 2016</li>
						<li><i class="fa fa-comment-o"></i> 8</li>
					</ul>
				</div>
				<a href="#" class="readmore">Read more</a>
			</div>
		</div>
	</div>
	<a href="#" class="viewall5"><i class="fa fa-long-arrow-right"></i></a>
</div> -->
<div class="special-slider">
	<div class="special-slider-header">
		<h2 class="title-special"><?php echo __("SPECIALs") ?></h2>
	</div>
	<div class="special-slider-content simple-owl-slider slider-home5">
		<div class="wrap-item" data-pagination="false" data-autoplay="true" data-navigation="true" data-itemscustom="[[0, 1]]">
			<div class="item-special">
				<ul>
					<?php echo $this->element('font-end/content/items-special',['products'=> $products]) ?>
				</ul>
			</div>
			<!-- ENd Item -->
			<div class="item-special">
				<ul>
					<?php echo $this->element('font-end/content/items-special',['products'=> $products]) ?>
				</ul>
			</div>
			<!-- ENd Item -->
		</div>
	</div>
</div>
<!-- End Latest New5 -->
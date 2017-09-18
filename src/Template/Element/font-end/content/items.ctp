<!-- Item -->

<?php foreach ($products as $key => $product): ?>
	

<div class="item">
	<div class="item-product5">
		<div class="product-thumb product-thumb5">
			<?php if (!empty($product->images)): ?>
			<a href="pages/products/<?= $product->id?>" class="product-thumb-link">
				<?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'first-thumb'])  ?>
				<?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'second-thumb'])  ?>
			</a>
			<?php endif ?>
			<div class="product-info-cart">
				<div class="product-extra-link">
					<a href="#" class="wishlist-link"><i class="fa fa-heart-o"></i></a>
					<a href="#" class="compare-link"><i class="fa fa-toggle-on"></i></a>
					<a href="#" class="quickview-link1"><i class="fa fa-search"></i></a>
				</div>
				<span class="addcart-link addcart-link2" product_id="<?= $product->id?>"><i class="fa fa-shopping-basket"></i>  Add to Cart</span>
			</div>
		</div>
		<div class="product-info5">
			<h3 class="title-product">
				<?php echo $this->Html->link($product->product_name,[ 'controller' => 'Pages',  'action' => 'products',$product->id]) ?>
			</h3>
			<div class="info-price">
				<span><?= number_format($product->retail_price, DECIMALS) ?> VNĐ</span>
				<div class="clearfix"></div>
				<!-- <del><?= number_format($product->retail_price, DECIMALS) ?> VNĐ</del> -->
			</div>
			<!-- <div class="product-rating">
				<div class="inner-rating" style="width:100%"></div>
				<span>(1s)</span>
			</div> -->
		</div>
	</div>
</div> 
<?php endforeach ?>

<!-- End Item -->
<?php foreach ($products as $key => $product): ?>
<?php if($key == 3 ) break; ?>
<li>
	<?php if (!empty($product->images)): ?>
	<div class="zoom-image-thumb product-thumb">
		<a href="#"><?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'first-thumb'])  ?></a>
		<span class="addcart-link addcart-single addcart-link2" product_id="<?= $product->id?>"><i class="fa fa-shopping-basket"></i></span>
	</div>
	<?php endif ?>
	<div class="product-info5">
		<h3 class="title-product"><?php echo $this->Html->link($product->product_name,[ 'controller' => 'Pages',  'action' => 'products',$product->id]) ?> </a></h3>
		<div class="info-price">
			<?php 
				if ($product->vat == 1)
					$retail_price = $product->retail_price + (($product->retail_price / 10));
				else
					$retail_price = $product->retail_price;
			?>
			<span><?php echo number_format($retail_price, DECIMALS) ?> 원</span>
			<!-- <span><?php //echo number_format($product->retail_price, DECIMALS) ?> 원 </span>
			<div class="clearfix"></div>
			<del><?php //echo number_format($product->retail_price, DECIMALS) ?> 원</del> -->
		</div>
		<!-- <div class="product-rating">
			<div style="width:100%" class="inner-rating"></div>
			<span>(1s)</span>
		</div> -->
		
	</div>
</li>
<?php endforeach ?>


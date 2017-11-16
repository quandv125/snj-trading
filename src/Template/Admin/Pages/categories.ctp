
<div class="row">
	<div class="col-md-3 col-sm-4 col-xs-12">
		<?php echo $this->element('font-end/sidebar-left',['type' => 'categories']) ?>
	</div>
	<div class="col-md-9 col-sm-8 col-xs-12">
		<div class="main-content-shop">

			<!-- End Banner Slider -->
			<div class="shop-tab-product">
				<div class="shop-tab-title">
					<h2>  
						<?php if (isset($products[0]['category']['name']) && !empty($products[0]['category']['name'])): ?>
							<?php echo $products[0]['category']['name']; ?>
						<?php endif ?>
					
					</h2>
					<ul class="shop-tab-select">
						<li class="active"><a href="#product-grid" class="grid-tab" data-toggle="tab"></a></li>
						<li><a href="#product-list" class="list-tab" data-toggle="tab"></a></li>
					</ul>
				</div>
				<div class="tab-content">
					<?php echo $this->element('font-end/content/items-product') ?>
				</div>
			</div>
		</div>
	</div>
</div>


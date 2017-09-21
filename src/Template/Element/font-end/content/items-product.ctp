
<div role="tabpanel" class="tab-pane fade " id="product-list">
	<ul class="row product-grid live-search-list vertical highlight_list" >
		<?php foreach ($products as $key => $product): ?>
			<li data-search-term="supplier<?= $product->supplier['id'];?> active<?= $key?>" class="supplier-search-<?= $product->supplier['id'];?> supplier-search col-md-3 col-sm-6 col-xs-12">
				<div class="item-product">
					<div class="product-thumb">
						<a class="product-thumb-link" href="<?= $this->Url->build(['controller'=>'pages','action'=>'products', $product->id]) ?>">
						<?= $this->Html->image($product->images[0]['thumbnail'],['class'=>'first-thumb','width' => 193]); ?>
						<?= $this->Html->image($product->images[0]['thumbnail'],['class'=>'second-thumb','width' => 193]); ?>
						</a>
						<div class="product-info-cart">
							<div class="product-extra-link">
								<span class="wishlist-link" product_id="<?= $product->id;?>" href="#"><i class="fa fa-heart-o"></i></span>
								<span class="compare-link" href="#"><i class="fa fa-toggle-on"></i></span>
								<span class="quickview-link1 fancybox.ajax" href="quick-view.html"><i class="fa fa-search"></i></span>
							</div>
							<span class="addcart-link cursor-point" price="<?= $product->retail_price;?>" name="<?= $product->product_name; ?>" product_id="<?= $product->id; ?>" picture="<?= $product->images[0]['thumbnail']; ?>">
								<i class="fa fa-shopping-cart"></i> <?php echo __("Add to Cart"); ?>
							</span>
						</div>
					</div>
					<div class="product-info">
						<h3 class="title-product"><?= $this->Html->link(ucfirst($product->product_name),[ 'controller' => 'Pages',  'action' => 'products',$product->id]) ?></h3>
					</div>
				</div>
			</li>
		<?php endforeach ?>
	</ul>
</div>
<div role="tabpanel" class="tab-pane fade in active" id="product-grid">
	<ul class="product-list vertical highlight_list">
		<?php foreach ($products as $key => $product): ?>

			<li data-search-term="supplier<?= $product->supplier['id'];?> active<?= $key?>" class="supplier-search-<?= $product->supplier['id'];?> supplier-search">
				<div class="item-product">
					<div class="row">
						<div class="col-md-3 col-sm-12 col-xs-12">
							<div class="product-thumb product-thumb-border">
								<a class="product-thumb-link" href="<?= $this->Url->build(['controller'=>'pages','action'=>'products', $product->id]) ?>">
									<?= $this->Html->image($product->images[0]['thumbnail'],['class'=>'first-thumb']); ?>
									<?= $this->Html->image($product->images[0]['thumbnail'],['class'=>'second-thumb']); ?>
								</a>
							</div>
							<br/><br/><br/>
							<div class="product-info-cart">
								<span class="addcart-link cursor-point" price="<?= $product->retail_price;?>" name="<?= $product->product_name; ?>" product_id="<?= $product->id; ?>" picture="<?= $product->images[0]['thumbnail']; ?>">
									<i class="fa fa-shopping-cart"></i> <?php echo __("Add to Cart") ?>
								</span>
							</div>
						</div>
						<div class="col-md-9 col-sm-12 col-xs-12">
							<div class="product-info">
								<h3 class="title-product"><?= $this->Html->link($product->product_name,[ 'controller' => 'Pages',  'action' => 'products',$product->id]) ?> </h3>
								<table class="table table-hover">
									<tbody>
										<tr class="info-category">
											<td><b><?= __("Maker's name"); ?>:</b></td>
											<td><?= $product->supplier['name']; ?></td>
											<td><b><?= __("Categories"); ?>:</b></td>
											<td><?= $product->category['name'];?></td>
										</tr>
										<tr class="info-category">
											<td><b><?= __("Part No"); ?>:</b></td>
											<td><?= $product->sku; ?></td>
											<td><b><?= __("Availability"); ?>:</b></td>
											<td>In stock</td>
										</tr>
										<tr class="info-category">
											<td><b><?= __("Serial No"); ?>:</b></td>
											<td><?= $product->serial_no; ?></td>
											<td><b><?= __("Type Model"); ?>:</b></td>
											<td><?= $product->type_model; ?></td>
										</tr>
										<tr class="info-category">
											<td><b><?= __("Quantity"); ?>:</b></td>
											<td><?= $product->quantity; ?></td>
											<td><b><?= __("Origin"); ?>:</b></td>
											<td><?= $product->origin; ?></td>
										</tr>
									</tbody>
								</table>
								<label><b><?= __("Remark"); ?>:</b> </label>
								<span class="product-description" id="products-remark">
									<?= $product->short_description; ?>
								</span>
							</div>
						</div>
					</div>
				</div>
			</li>
		<?php endforeach ?>
	</ul>
</div>


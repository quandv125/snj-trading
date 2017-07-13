<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	   <div class="main-content-shop">
			<?php echo $this->element('font-end/shipping') ?>
			<div class="shop-tab-product">
				<div class="tab-content">
					<div role="tabpanel">
						<ul class="row product-grid">
							<?php foreach ($category as $key => $c): ?>
								<li class="col-md-4 col-sm-6 col-xs-12">
									<div class="item-category">
										<div class="col-md-6 col-sm-6 zoom-image-thumb">
											<?php if (!empty($c->picture)): ?>
												<?php echo $this->Html->link($this->Html->image($c->picture), ['controller'=>'Pages','action'=>'categories', $id, $c->id], array('escape' => false)); ?>
											<?php endif ?>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="wapper-category">
												<div class="list-cat-mega-menu">
													<h2 class="title-cat-mega-menu"> 
														<?= $this->Html->link($c->name, ['controller'=>'Pages','action'=>'categories', $id,$c->id]); ?> (<?= count($c->products)?>)
													</h2>
													<?php if (!empty($c->children)): ?>
													<ul>
														<?php foreach ($c->children as $key => $children): ?>
															<li><?= $this->Html->link($children->name, ['controller'=>'Pages','action'=>'categories', $id,$children->id]); ?> (<?= count($children->products)?>)
															</li>
														<?php endforeach ?>
													</ul>
													<?php endif ?>
												</div>
											</div>
										</div>
									</div>
								</li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <?php// if (empty($cat_list)): ?>
	<div class="row">
		<div class="col-md-3 col-sm-4 col-xs-12">
			<?php// echo $this->element('font-end/sidebar-left',['type' => 'categories']) ?>
		</div>
		<div class="col-md-9 col-sm-8 col-xs-12">
			<div class="main-content-shop">
				<div class="shop-tab-product">
					<div class="shop-tab-title">
						<h3><?php// echo $info->name ?></h3>
						<ul class="shop-tab-select">
							<li class="active"><a href="#product-grid" class="list-tab" data-toggle="tab"></a></li> 
							<li><a href="#product-list" class="grid-tab" data-toggle="tab"></a></li>
						</ul>
					</div>
					<div class="tab-content">
						<?php// echo $this->element('font-end/content/items-product') ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php// endif ?>
 -->

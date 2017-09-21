
<div class="popular-cat-title">
	<ul>
		<li class="active"><a href="#tabs" data-toggle="tab"><?php echo __('전체상품');?></a></li>
		<?php foreach ($categories as $key => $categorie): ?>
			<li><a href="#tab_<?= $key; ?>" data-toggle="tab"><?php echo __($categorie->name);?></a></li>
		<?php endforeach ?>
				
	</ul>
</div>
<div class="tab-content">
	<div role="tabpanel" class="tab-pane fade in active" id="tabs">
		<div class="popular-cat-slider slider-home5">
			<div class="wrap-item" data-pagination="false" data-autoplay="true" data-navigation="true" data-itemscustom="[[0, 1],[768, 2],[992, 3],[1200, 4]]">
				<?php echo $this->element('font-end/content/items',['products'=> $products,'categorie_id' => 'all']) ?>
			</div>
		</div>
	</div>
	<?php foreach ($categories as $key => $categorie): ?>
		<div role="tabpanel" class="tab-pane fade" id="tab_<?= $key; ?>">
			<div class="popular-cat-slider slider-home5">
				<div class="wrap-item" data-pagination="false" data-autoplay="true" data-navigation="true" data-itemscustom="[[0, 1],[768, 2],[992, 3],[1200, 4]]">
					<?php echo $this->element('font-end/content/items',['products'=> $products,'categorie_id' => $categorie->id]) ?>
				</div>
			</div>
		</div>
	<?php endforeach ?>
	
</div>
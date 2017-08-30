
<div class="popular-cat-title">
	<ul>
		<li class="active"><a href="#new1" data-toggle="tab">Demo Product 1</a></li>
		<li><a href="#best1" data-toggle="tab">Demo Product 2</a></li>
		<li><a href="#pop1" data-toggle="tab">Demo Product 3</a></li>
	</ul>
</div>
<div class="tab-content">
	 <div role="tabpanel" class="tab-pane fade in active" id="new1">
		<div class="popular-cat-slider slider-home5">
			<div class="wrap-item" data-pagination="false" data-autoplay="true" data-navigation="true" data-itemscustom="[[0, 1],[768, 2],[992, 3],[1200, 4]]">
				<?php echo $this->element('font-end/content/items',['products'=> $products]) ?>
			</div>
		</div>
	</div>
	<div role="tabpanel" class="tab-pane fade " id="best1">
		 <div class="popular-cat-slider slider-home5">
			<div class="wrap-item" data-pagination="false" data-autoplay="true" data-navigation="true" data-itemscustom="[[0, 1],[768, 2],[992, 3],[1200, 4]]">
				<?php echo $this->element('font-end/content/items',['products'=> $products]) ?>
			</div>
		</div>
	</div>
	<div role="tabpanel" class="tab-pane fade" id="pop1">
		 <div class="popular-cat-slider slider-home5">
			<div class="wrap-item" data-pagination="false" data-autoplay="true" data-navigation="true" data-itemscustom="[[0, 1],[768, 2],[992, 3],[1200, 4]]">
				<?php echo $this->element('font-end/content/items',['products'=> $products]) ?>
			</div>
		</div>
	</div>
</div>
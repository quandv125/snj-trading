<h2 class="title-special">HOT categories</h2>

<ul class="listcategory-hot list-shop-cat">
	
	<?php foreach ($categories as $key => $category): ?>
		<?php if ($key == 6) break;?>
		<li>
			<?php echo $this->Html->link($category->name.' <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>',['controller' => 'pages', 'action' => 'categories', $category->id],['escape'=> false]) ?> 
		</li>
	<?php endforeach ?>
	
</ul>
<div class="hot-category-slider popular-cat-slider slider-home5">
	<div class="wrap-item" data-pagination="false" data-autoplay="true" data-navigation="true" data-itemscustom="[[0, 1],[768, 2],[992, 3],[1200, 4]]">
		<!-- End Item -->
		<?php echo $this->element('font-end/content/items',['products'=> $products]) ?>
		<!-- End Item -->
	</div>
</div>
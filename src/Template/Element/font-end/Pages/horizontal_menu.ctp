<?php if (!empty($categories2)): ?>
	

<nav class="main-nav">
	<ul>
		<?php foreach ($categories2 as $key => $category): ?>
			<li class="menu-item-has-children">
				
				<?= $this->Html->link($category->name,[ 'controller' => 'Pages', 'action' => 'categories-parent', $category->id]) ?>
				<?php if (!empty($category->children)):?>
					<ul class="sub-menu">
						<?php foreach ($category->children as $key => $children): ?>
							<li><?= $this->Html->link($children->name,[ 'controller' => 'Pages', 'action' => 'categories', $category->id, $children->id]) ?></li>
						<?php endforeach ?>
					</ul>
				<?php endif; ?>
			</li>
		<?php endforeach ?>
		<!--  <?php// if (isset($signles) && !empty($signles)): ?>
			<?php// foreach ($signles as $key => $signle): ?>
				<li class="has-mega-menu">
				   <?php //echo $this->Html->link($signle, ['controller'=>'Articles','action' => 'details', $key]) ?>
				</li>
			<?php// endforeach ?>
		<?php// endif ?> -->
	</ul>
	<a href="#" class="toggle-mobile-menu"><span>Menu</span></a>
</nav>
<?php endif ?>
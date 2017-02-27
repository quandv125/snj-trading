<div class="sidebar-left sidebar-post">
	<div class="widget widget-post-cat">
		<h2 class="title-widget-post"><?php echo __('Categoties') ?></h2>
		<ul>
			<?php foreach ($list_articles as $key => $list): ?>
				<li>
				<?php echo $this->Html->link($list->name.'<span>('.count($list->articles).')</span>',['controller' => 'articles','action' => 'articleCategory', $list->id],['escape' => false]) ?>
				</li>
			<?php endforeach ?>
		</ul>
	</div>
	
</div>
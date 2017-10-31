 <?php foreach ($categories as $key => $category): ?>
	
	<li style="margin-left: <?= 25 * $time;?>px">
		<?= $this->Html->link($category->name,['controller'=>'Pages','action'=>'categories',$parent_id,$category->id]) ?>
	</li>
	<?= $this->element('font-end/Pages/recursion_menu',['categories' => $category->children, 'time' => $time+1]); ?>
<?php endforeach ?>
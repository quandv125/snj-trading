<nav class="main-nav">
    <ul>
        <?php foreach ($categories2 as $key => $category): ?>
            <?php if ($key == 5) break;?>
            <li class="has-mega-menu">
                <?= $this->Html->link($category->name,[ 'controller' => 'Articles',  'action' => 'articleCategory',$category->id]) ?>
            </li>
        <?php endforeach ?>
    
        <?php if (isset($signles) && !empty($signles)): ?>
            <?php foreach ($signles as $key => $signle): ?>
                <li class="has-mega-menu">
                   <?= $this->Html->link($signle, ['controller'=>'Articles','action' => 'details', $key]) ?>
                </li>
            <?php endforeach ?>
        <?php endif ?>
    </ul>
    <a href="#" class="toggle-mobile-menu"><span>Menu</span></a>
</nav>
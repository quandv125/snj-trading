<nav class="main-nav">
    <ul>
        <?php foreach ($categories2 as $key => $category): ?>
            <?php if ($key == 8) break;?>
            <li class="has-mega-menu">
                <?php echo $this->Html->link($category->name,[ 'controller' => 'Articles',  'action' => 'articleCategory',$category->id]) ?>
            </li>
        <?php endforeach ?>
        <li class="has-mega-menu">
           <?php echo $this->Html->link('Login', ['controller'=>'users','action' => 'login']) ?>
           
        </li>
    </ul>
    <a href="#" class="toggle-mobile-menu"><span>Menu</span></a>
</nav>
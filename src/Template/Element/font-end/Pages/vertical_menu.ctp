<?php foreach ($categories as $key => $category): ?>
    <li class="<?php if (isset($category->children) && !empty($category->children)){echo 'has-cat-mega';} ?>">
        <?php echo $this->Html->link($category->name,[ 'controller' => 'Pages',  'action' => 'categories-parent',$category->id]) ?>
        <?php if (isset($category->children) && !empty($category->children)): ?>
            <div class="col-md-12 cat-mega-menu cat-mega-style1">
                <div class="row">
                    <?php foreach ($category->children as $children): ?>
                        <div class="col-md-6 col-sm-3" style=" margin-bottom: 20px;">
                            <div class="list-cat-mega-menu">
                                <h2 class="title-cat-mega-menu"><?php echo $this->Html->link($children->name,[ 'controller' => 'Pages',  'action' => 'categories',$children->id]) ?></h2>
                                <ul>
                                    <?= $this->element('font-end/Pages/recursion_menu',['categories' => $children->children,'time' => 1]); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <?php if (!empty($category->picture)): ?>
                        <div class="col-md-12 col-sm-3" >
                            <div class="zoom-image-thumb float-right">
                                <a href="#"><?php echo $this->Html->image($category->picture,['style'=>'max-width:200px;'])  ?></a>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div> 
        <?php endif ?>
    </li>
<?php endforeach ?>
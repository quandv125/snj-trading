<?php foreach ($categories as $key => $category): ?>
    <li class="<?php if (isset($category->children) && !empty($category->children)){echo 'has-cat-mega';} ?>">
        <?php if ($this->request->session()->read('Config.language') == 'en'): ?>
            <?php echo $this->Html->link($category->name,[ 'controller' => 'Pages',  'action' => 'categories-parent',$category->id]) ?>
        <?php else: ?>
            <?php echo $this->Html->link($category->kr_name,[ 'controller' => 'Pages',  'action' => 'categories-parent',$category->id]) ?>
        <?php endif ?>
     
        <?php if (isset($category->children) && !empty($category->children)): ?>
           <?php if (!empty($category->thumbnails)): ?>
                <div class="col-md-12 cat-mega-menu cat-mega-style1" style="background-image: url(/img/<?php echo $category->thumbnails ?>);">
            <?php else: ?>
                 <div class="col-md-12 cat-mega-menu cat-mega-style1">
           <?php endif ?>
                <div class="row">
                    <?php foreach ($category->children as $key => $children): ?>

                        <div class="col-md-4 col-sm-4 clearfix" style=" margin-bottom: 20px;">
                            <div class="list-cat-mega-menu">
                                <h2 class="title-cat-mega-menu">
                                    
                                    <?php if ($this->request->session()->read('Config.language') == 'en'): ?>
                                       <?php echo $this->Html->link($children->name, [ 'controller' => 'Pages',  'action' => 'categories',$category->id ,$children->id]) ?>
                                    <?php else: ?>
                                       <?php echo $this->Html->link($children->kr_name, [ 'controller' => 'Pages',  'action' => 'categories',$category->id ,$children->id]) ?>
                                    <?php endif ?>
                                </h2>
                                <ul>  
                                    <?= $this->element('font-end/Pages/recursion_menu',['categories' => $children->children,'parent_id' => $category->id,'time' => 1]); ?>
                                </ul>
                            </div>
                        </div>
                        <?php //if (in_array($key, [3,7,11,15,19,23,27])): ?>
                            <!-- <div class="clearfix"></div> -->
                        <?php//endif ?>
                    <?php endforeach ?>
                </div>
            </div> 
        <?php endif ?>
    </li>
<?php endforeach ?>
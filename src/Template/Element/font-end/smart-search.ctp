<div class="select-category">
    <ul class="top-info top-info-left">
        <li class="has-child">
            <a id="search-active" class="search-active" href="#">ALL</a>
            <ul class="sub-menu-top sub-menu-search">
                <li> ALL</li>
                <?php foreach ($categories as $key => $category): ?>
                    <li id="<?php echo $category->id ?>"> <?php echo $category->name ?></li>
                <?php endforeach ?>
            </ul>
        </li>
    </ul>
</div>
<?php 
    echo $this->Form->create('search',['url'=>['controller'=>'pages','action'=>'search'],'class'=>'smart-search-form','type' => 'get']);
    echo $this->Form->input('search',['placeholder'=>'Find Product, Part No, Code...','label' => false,'class' => $class,"autocomplete"=>"off"]);
    echo $this->Form->input('type-search',['class'=>'type-search hidden','label' => false,'value'=> null]);
    echo $this->Form->input('',['type'=>'submit']);
    echo $this->Form->end();
?>
<?php echo $this->Html->image('loader.gif',['id' => 'loader', "style"=>"display: none;"]) ?> 
<?php echo $this->Html->image('loader.gif',['class' => 'loader2', "style"=>"display: none;"]) ?>
<div class="col-md-9 col-sm-9 col-xs-9 quick-<?= $class?> hidden"></div>

<div class="page-title1">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li>
            	<?= $this->Html->getCrumbs(' > ', array('text' => '<span class="glyphicon glyphicon-home"></span> Home','url' => array('controller' =>'pages','action'=>'index'),'escape' => false)); ?>
            </li>
            <?php if ($this->request->controller != 'pages'): ?>
           	<li class="active first-letter">
            	<?php  echo $this->Html->link($this->request->controller,array('controller' => $this->request->controller, 'action' => 'index'),array('escape' => false)) ?>
            </li>
            <?php endif ?>
            <?php if ($this->request->action != 'index'): ?>
            <li>
            	<?= $this->request->action ?>
            </li>
            <?php endif ?>
        </ol>
    </div>
</div>

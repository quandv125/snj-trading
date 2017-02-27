<?php foreach ($categories as $category): ?>
    <?php 
        $str = '';
        for ($i=0; $i < $time ; $i++) {  $str = $str.'___'; }
    ?>
    <tr class="active-categories-<?= ($category->type == VERTICAL)? VERTICAL:HORIZONTAL ?>">
        <td><?= $this->Number->format($category->id) ?></td>
        <td><?= h($str.$category->name) ?></td>
        <td><?= ($category->type == VERTICAL)? 'Vertical Menu': 'Horizontal Menu' ?></td>
        <td><?= h($category->created) ?></td>
        <td><?= h($category->modified) ?></td>
        <td class="actions">
           
           <span class="btn btn-success waves-effect waves-button waves-red" data-toggle="modal" data-target="#myModalview<?= $category->id?>"> <i class="fa fa-edit"></i> Edit </span>
            <div class="modal fade" id="myModalview<?= $category->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-sm modal-center">
                    <div class="modal-content" style=" margin-top: 100px; ">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel"><?php echo __("Add Category") ?></h4>
                        </div>
                        <div class="modal-body">
                        <?= $this->Form->create($category,['url'=>['action'=>'edit'],'enctype'=>'multipart/form-data']) ?>
                        <?= $this->Form->input('name'); ?>
                        <?= $this->Form->input('parent_id', ['options' => $parentCategories, 'empty' => ' ',"class" =>"selectpicker","data-live-search"=>"true"]);?>
                        <?= $this->Form->input('type', ['options' => [VERTICAL => "Vertical", HORIZONTAL => "Horizontal"], "value" => $category->type,"class" =>"selectpicker"]);?>
                        <?php  echo $this->Form->input('actived',['options'=>[DEACTIVED => "Deactived", ACTIVED => 'Actived'], "value" => $category->actived,'default' => ACTIVED]);?>
                        <?php  echo $this->Form->input('files'.$category->id,['type'=> 'file']);?>
                        </div>
                        <div class="modal-footer">
                            <?= $this->Form->button(__('Submit'),['class'=>"btn btn-success float-right"]) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>  <!-- End -->

            <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>Delete'), ['action' => 'delete', $category->id], ['class'=>'btn btn-success','escape'=>false,'confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?>
        </td>
    </tr>
    <?= $this->element('Categories/recursion_categories',['categories' => $category->children, 'time' => $time+1, 'parent' => null]); ?>





<?php endforeach; ?>

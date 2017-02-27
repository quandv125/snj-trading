
<div class="row">
    <div class="col-lg-12 col-md-12 panel panel-white">
        <div class="col-lg-2 col-md-2 col-sm-3">
        <!-- Searchbox -->
          <?= $this->element('Categories/search_box'); ?>
        </div>
        <!-- col-lg-3 -->
        <div class="col-lg-10 col-md-10 col-sm-9">
            <div class="panel-heading clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    Categories
                </div> 
                <!-- col-lg-8 -->
                <div class="col-lg-4 col-md-4 col-md-4 col-xs-4">
                    <!-- Add new products -->
                <nav class="large-3 medium-4 columns float-right" id="actions-sidebar">
                    <span class="btn btn-success btn-addon m-b-sm waves-effect waves-button waves-red float-right margin-bottom10" data-toggle="modal" data-target="#myModal2"> <i class="fa fa-plus"></i>Add </span>
                </nav>
                </div> 
                <!-- col-lg-4 -->
            </div> 
            <!-- panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody id="categories-result" class="vertical highlight_list1 live-search-list">
                            <?= $this->element('Categories/recursion_categories',['categories' => $categories, 'time' => 0,'parent' => null]); ?>
                        </tbody>
                    </table>
                    
                </div>
            </div> <!-- panel-body -->
        </div> <!-- col-lg-9 -->
    </div><!-- col-lg-12 -->
</div> <!-- row -->


<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm modal-center">

        <div class="modal-content" style=" margin-top: 100px; ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo __("Add Category") ?></h4>
            </div>
            <div class="modal-body">
                <?php echo $this->Form->create('add',['url'=>['action'=>'add'],'enctype'=>'multipart/form-data']);?>
                <?php echo $this->Form->input('name'); ?>
                <?php  echo $this->Form->input('parent_id',['options'=>$treeList, 'empty' => ' ',"class" =>"selectpicker","data-live-search"=>"true"]);?>
                <?= $this->Form->input('type', ['options' => [VERTICAL => "Vertical", HORIZONTAL => "Horizontal"],"class" =>"selectpicker"]);?>
                <?php  echo $this->Form->input('actived',['options'=>[DEACTIVED => "Deactived", ACTIVED => 'Actived'], 'default' => ACTIVED]);?>
                <?php  echo $this->Form->input('files.',['type'=> 'file']);?>
            </div>
            <div class="modal-footer">
                <?= $this->Form->button(__('Submit'),['class'=>"btn btn-success float-right"]) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>  <!-- End -->
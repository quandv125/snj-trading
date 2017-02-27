<div class="row">
    <div class="col-lg-12 col-md-12 panel panel-white">
        <div class="col-lg-2 col-md-2 col-sm-3">
        <!-- Searchbox -->
            <div class="panel-heading  clearfix border">
                <div class="leftTitle"><span class="title-searchbox">Search</span></div>
            </div> <!-- panel-heading -->
            <div class="panel-body1">
                <div class="divider10"></div>
                 <?php echo $this->Form->input(__('actives'),['options' => $categories,'label' => false,"data-live-search" => "true",'class'=>'selectpicker live-search-box','id'=>'search-categories-type','empty' => '-- All --']); ?>
                
                 <div class="divider10"></div>
                <input id="search-ignore" class="form-control" name="search-highlight" placeholder="Keyword" type="text" data-list=".highlight_list1" autocomplete="off">
            </div>
            <!-- Supplier -->
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
                    
                    <?php echo $this->Html->link('<i class="fa fa-plus"></i>Add',['controller'=>'articles','action'=>'add'],['escape' => false,'class'=>"btn btn-success btn-addon m-b-sm waves-effect waves-button waves-red float-right margin-bottom10"]) ?>
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
                                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('categorie_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($articles as $article): ?>
                            <tr>
                                <td><?= $article->title ?></td>
                                <td><?= h($article->note) ?></td>
                                <td><?= h($article->type) ?></td>
                                <td><?= $article->has('category') ? $this->Html->link($article->category->name, ['controller' => 'Categories', 'action' => 'view', $article->category->id]) : '' ?></td>
                                <td><?= h($article->created) ?></td>
                                <td><?= h($article->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $article->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                </div>
            </div> <!-- panel-body -->
        </div> <!-- col-lg-9 -->
    </div><!-- col-lg-12 -->
</div> <!-- row -->


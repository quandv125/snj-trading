
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
           
            <fieldset>
                <legend><?= __('Add Article') ?></legend>
                 <?= $this->Form->create($article) ?>
                <?php
                    echo $this->Form->input('title');
                    echo $this->Form->input('categorie_id', ['label'=>'Categories','options' => $categories,"data-live-search" => "true",'class'=>'selectpicker live-search-box']);
                    echo $this->Form->textarea('content',['id'=>'editor1']);
                    echo $this->Form->input('type', ['label'=>'Type','options' => [ARTICLE_SIGNLE => 'Signle', ARTICLE_CATEGORIES => 'Categories', ARTICLE_HELP => 'Help', ARTICLE_SNJ => 'SNJ', ARTICLE_MYACCOUNT => 'My Account'],"data-live-search" => "true",'class'=>'selectpicker live-search-box']);
                    echo $this->Form->input('note');
                ?>
                 <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
            </fieldset>
           
        </div> <!-- col-lg-9 -->
    </div><!-- col-lg-12 -->
</div> <!-- row -->


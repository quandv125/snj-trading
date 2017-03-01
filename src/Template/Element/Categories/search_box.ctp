<div class="panel-heading  clearfix border">
    <div class="leftTitle"><span class="title-searchbox">Search</span></div>
</div> <!-- panel-heading -->
<div class="panel-body1">
    <div class="divider10"></div>
    <input id="search-ignore" class="form-control" name="search-highlight" placeholder="Keyword" type="text" data-list=".highlight_list1" autocomplete="off">
     <div class="divider10"></div>
   <!--  <input type="text" class="form-control" id="search-menu-name" name="" placeholder="Search By Menu name" >
    <div class="divider10"></div> -->
    <?php $type = [VERTICAL => 'VERTICAL', HORIZONTAL => 'HORIZONTAL'] ?>
    <?php echo $this->Form->input(__('actives'),['options' => $type,'label' => false,'class'=>'live-search-box','id'=>'search-categories-type','empty' => '-- All --']); ?>
</div>
<!-- Supplier -->

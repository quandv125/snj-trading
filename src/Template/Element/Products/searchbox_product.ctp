<div class="panel-heading  clearfix border">
    <div class="leftTitle"><span class="title-searchbox">Search</span></div>
</div> <!-- panel-heading -->
<div class="panel-body1">
    <div class="divider10"></div>
    <input type="text" class="form-control" id="search-sku" name="" placeholder="Search By Item Number">
    <div class="divider10"></div>
    <input type="text" class="form-control" id="search-product-name" name="" placeholder="Search By Product name">
</div>
<!-- Supplier -->
<?php if ($user_info['group_id'] != CUSTOMERS): ?>
    
<div class="panel-heading  clearfix border">
        <div class="leftTitle"><span class="title-searchbox">Filter</span></div>
</div> <!-- panel-heading -->
<div class="">
    <?php echo $this->Form->input(__('users'),['options' => $users,'label' => false,'id'=>'search-users','empty' => '-- Choose one --']); ?>
    <?php echo $this->Form->input(__('suppliers'),['options' => $suppliers,'label' => false,'id'=>'search-suppliers','empty' => '-- Choose one --']); ?>
    <?php $active = ['1' => 'Active', '0' => 'Deactive'] ?>
    <?php echo $this->Form->input(__('actives'),['options' => $active,'label' => false,'id'=>'search-active','empty' => '-- Choose one --']); ?>
</div>
<?php endif ?>
<!-- Price -->
<div class="panel-heading  clearfix border">
    <div class="leftTitle"><span class="title-searchbox">Filter by Price</span></div>

</div> <!-- panel-heading -->
<div class="">
    <div class="divider10"></div>
    <div>
        <input type="text" id="range_03">
    </div>
    <!-- <br> -->
    <!-- <input tabindex="11110" type="radio" class="icheck" id="input-11110" rel="retail_price" name="price-radio">
    <label class="cursor-pointer" for="input-11110">Retail Price</label> -->
    <!-- <input tabindex="11111" type="radio" class="icheck" id="input-11111" rel="wholesale_price" name="price-radio">
    <label class="cursor-pointer" for="input-11111">Wholesale Price</label>
    <input tabindex="11112" type="radio" class="icheck" id="input-11112" rel="supply_price" name="price-radio">
    <label class="cursor-pointer" for="input-11112">Supplier Price</label> -->
    
</div>
<!-- Categories -->
<!-- <?php if (isset($categories)): ?>
<div class="panel-heading  clearfix border">
       <div class="leftTitle"> <span class="title-searchbox">Categories</span> </div>
</div> 
<div class="panel-body">

    <?php foreach ($categories as $key => $categorie): ?>
    <input tabindex="100<?= $key?>" type="radio" class="icheck" cid="<?= $key?>" id="input-100<?= $key?>" name="demo-radio">
    <label class="cursor-pointer" id="<?= $key?>" for="input-100<?= $key?>"><?= $categorie?></label>
    <?php endforeach ?>
</div>
<?php endif ?>
 -->


<!-- 
<div class="panel-heading  clearfix border">
        <div class="leftTitle"><span class="title-searchbox">Filter by stock level</span></div>
</div> 
<div class="panel-body">
    <input tabindex="1" type="checkbox" class="icheck" id="input-1" checked>
    <label class="cursor-pointer" for="input-1">Do not filter</label> <div class="divider5"></div>
    <input tabindex="2" type="checkbox" class="icheck" id="input-2">
    <label class="cursor-pointer" for="input-2">Under stock limit</label> <div class="divider5"></div>
    <input tabindex="3" type="checkbox" class="icheck" id="input-3">
    <label class="cursor-pointer" for="input-3">Over stock limit</label> <div class="divider5"></div>
    <input tabindex="4" type="checkbox" class="icheck" id="input-4">
    <label class="cursor-pointer" for="input-4">Stock on hand</label> <div class="divider5"></div>
    <input tabindex="5" type="checkbox" class="icheck" id="input-5">
    <label class="cursor-pointer" for="input-5">Out of stock</label> <div class="divider5"></div>
</div>
 -->

        
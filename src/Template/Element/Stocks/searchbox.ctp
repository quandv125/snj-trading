<div class="panel-heading clearfix border">
    <div class="leftTitle"><span class="title-searchbox">Search</span></div>
</div> 
<!-- panel-heading -->
<div class="panel-body1">
    <div class="divider10"></div>
    <input type="text" class="form-control stock-search" tbl="Stocks.id" placeholder="Search By code">
    <div class="divider15"></div>
    <?= $this->Form->input('suppliers',['options'=>$suppliers,'label' => false,'class'=>'stock-search-sl ','tbl'=>'Stocks.supplier_id']);?>
    <?= $this->Form->input('users',['options'=>$users,'label' => false,'class'=>'stock-search-sl ','tbl'=>'Stocks.user_id']);?>
</div>

<div class="panel-heading clearfix border">
    <div class="leftTitle"><span class="title-searchbox">Time</span></div>
</div> 
<!-- panel-heading -->
<div class="panel-body1">
	<div class="divider10"></div>
    <div class="input-group">
        <input type="tex" style="border-radius: 5px;" name="daterange" tbl="stocks" class="form-control">
        <!-- <span class="input-group-addon add-on"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span> -->
    </div>
    <!-- <div class="divider10"></div>
    <button id="btn-date-range" class="btn btn-success">Submit</button> -->
</div>

<div class="panel-heading clearfix border">
    <div class="leftTitle"><span class="title-searchbox">Status</span></div>
</div> 
<!-- panel-heading -->
<div class="panel-body1">
    <div class="divider10"></div>
    <input tabindex="1" type="checkbox" class="icheck" id="input-10101" checked>
    <label class="cursor-pointer" for="input-10101">Stock order</label> <div class="divider5"></div>
    <input tabindex="2" type="checkbox" class="icheck" id="input-20202">
    <label class="cursor-pointer" for="input-20202">Cancel</label> <div class="divider5"></div>
</div>

<div class="panel-heading clearfix border">
    <div class="leftTitle"><span class="title-searchbox">Filter by price</span></div>
</div> 
<!-- panel-heading -->
<div class="panel-body1">
    <div class="divider10"></div>
    <div class="daterangepicker1">
        <input type="text" id="range_stocks">
    </div>   
</div>
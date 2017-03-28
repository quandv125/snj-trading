<div class="panel-heading clearfix border">
    <div class="leftTitle"><span class="title-searchbox">Search</span></div>
</div> 
<!-- panel-heading -->
<div class="panel-body1">
    <div class="divider10"></div>
    <!-- <label class="control-label" for="code">Code</label> -->
    <input type="text" class="form-control invoice-search" tbl="invoices.id" placeholder="Search By code">
    <div class="divider15"></div>
    <?= $this->Form->input('customers',['options'=>$customers,'empty'=>[Null => '-- All --'],'label' => 'Customers','class'=>'invoice-search-sl ','tbl'=>'invoices.customer_id']);?>
   <!--  <?= $this->Form->input('users',['options'=>$users,'empty'=>[Null => '-- All --'],'label' => 'Users','class'=>'invoice-search-sl ','tbl'=>'invoices.user_id']);?> -->
</div>

<div class="panel-heading clearfix border">
    <div class="leftTitle"><span class="title-searchbox">Status</span></div>
</div> 
<!-- panel-heading -->
<div class="panel-body1">
    <div class="divider10"></div>
    <input tabindex="1" type="checkbox" class="icheck" id="input-10101" checked>
    <label class="cursor-pointer" for="input-10101">Invoice order</label> <div class="divider5"></div>
    <input tabindex="2" type="checkbox" class="icheck" id="input-20202">
    <label class="cursor-pointer" for="input-20202">Cancel</label> <div class="divider5"></div>
</div>


<div class="panel-heading clearfix border">
    <div class="leftTitle"><span class="title-searchbox">Time</span></div>
</div> 
<!-- panel-heading -->
<div class="panel-body1">
	<div class="divider10"></div>
    <div class="input-group">
        <input type="tex" style="border-radius: 5px;" name="daterange" tbl="invoices" class="form-control">
    </div>
   
</div>

<!-- 
<div class="panel-heading clearfix border">
    <div class="leftTitle"><span class="title-searchbox">Filter by price</span></div>
</div>  -->
<!-- panel-heading -->
<!-- <div class="panel-body1">
    <div class="divider10"></div>
    <div class="daterangepicker1">
        <input type="text" id="range_invoices">
    </div>   
</div> -->
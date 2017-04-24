
<div class="panel-heading clearfix" id="inqSuppliers" val="">
	Quotation: <?= $SupplierQuotation->supplier['name'] ?>
</div> <!-- panel-heading -->
<div class="panel-body "> 
	<div role="tabpanel">
				
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#tab1" role="tab" data-toggle="tab"><?= __("Infomations") ?></a></li>
			<li role="presentation"><a href="#tab2" role="tab" data-toggle="tab"><?= __("Inquiries"); ?></a></li>
			<li role="presentation"><a href="#tab3" role="tab" data-toggle="tab"><?= __("Items"); ?></a></li>
		</ul>
		
		<div class="tab-content tab-content-lx">
			<div role="tabpanel" class="tab-pane active fade in" id="tab1">
				
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab2">
				
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab3">
				
			</div>
		</div>
	</div>
	
</div>

<div class="panel-body">
	<?php if (!empty($SupplierQuotation->inquirie_supplier_products)): ?>
		<div id="grid" data-room='<?= ($data);?>'></div>
	<?php endif; ?>
</div>

<div class="row">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			P.O
			<?php echo $this->Html->link('Next.Stage',['controller' =>'inquiries','action' =>'InvoiceDocuments',$id],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
			<?php echo $this->Html->link('Pre.Stage',['controller' =>'inquiries','action' =>'OrderAcknowledgement',$id],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
		</div> <!-- panel-heading -->
	<!-- 	<div class="panel-body"> 
			<div role="tabpanel">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#tab1" role="tab" data-toggle="tab"><?= __("Infomations") ?></a></li>
					<li role="presentation"><a href="#tab2" role="tab" data-toggle="tab"><?= __("Price"); ?></a></li>
				</ul>
				<div class="tab-content tab-content-lx">
					
					<div role="tabpanel" class="tab-pane active fade in" id="tab1">
					
						<div class="panel-body">
							
						</div>
					
					</div>
					<div role="tabpanel" class="tab-pane fade" id="tab2">
						<div class="panel-body">
							
						</div>
					</div>
					
				</div>
			</div>
		</div>  -->
		<div class="panel-body"> 
		</div>
	</div><!-- panel panel-white -->
<!-- 	<div class="panel panel-white">
		<div class="panel-body"> 

			<div id="grid_quotation"  data-room='<?php //echo $data; ?>'></div>
				
		</div>
	</div>  --><!-- panel-body -->
</div> <!-- row -->
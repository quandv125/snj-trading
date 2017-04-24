
<div class="row">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				Comparing
				<?php echo $this->Html->link('Next Stage',['controller' =>'inquiries','action' =>'quotations', $id],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
					<?php echo $this->Html->link('Pre.Stage',['controller' =>'inquiries','action' =>'inquiries-suppliers', $id],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
					<div class="col-md-2 float-right">
						
						<?= $this->Form->create(null, ['url' => [ 'action' => 'SelectPrice', $id]]); ?>
						<?= $this->Form->input('choose',['label' => false,'empty' => '-- Choose --','options' => $list,'onchange' => 'this.form.submit()']) ?>
						<?php echo $this->Form->end(); ?>
					</div>
					<div class="clearfix"></div>
			</div> <!-- col-lg-9 -->
		</div> <!-- panel-heading --><br/>
	</div>
	<div class="panel panel-white" id="inquiry_id" val="<?php echo $id ?>">
		<div class="panel-body "> 
			<div role="tabpanel">
				<div class="table-responsive">	
					
					<table class="table table-striped">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Name</th>
							<?php foreach ($inqSuppliers as $key => $inqSupplier): ?>
							<th><?php echo ($inqSupplier->supplier['name']);?></th>
							<?php endforeach ?>
						</tr>
					</thead>
					<tbody>	
						<?php foreach ($inquiryproducts as $key => $inquiryproduct): ?>
						<tr>
							<td><?= ($inquiryproduct->no); ?></td>
							<td><?= ($inquiryproduct->name); ?></td>
							<?php foreach ($inqSuppliers as $key => $inqSupplier): ?>
								<td>
									<?php foreach ($inquiryproduct->inquirie_supplier_products as $key => $value): ?>
									<?php if ($value->inquirie_supplier_id == $inqSupplier->id): ?>
										<?php if (!empty($value->price)): ?>
											<input type="radio" <?= ($value->choose == 1)?'checked':''; ?> class="rdo-price" id="<?php echo $value->id; ?>" inquirie_product_id="<?php echo $value->inquirie_product_id; ?>" name="check<?= $inquiryproduct->id?>"><?php echo '$ '.$value->price; ?>  ( <?= $value->delivery_time?> day)
										<?php endif ?>
										
									<?php endif ?>
									<?php endforeach ?>
								</td>
							<?php endforeach ?>
						</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
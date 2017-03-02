<?php if (!empty($products->toarray())): ?>

	<div class="table-responsive margin-top10" id="<?= $id?>" style="overflow-y:scroll; max-height:400px;" >
		<table class="table table-striped cursor-pointer">
			<?php foreach ($products as $key => $product): ?>
				<tr class="add-products">
					<td>
						<?php echo $this->Html->link($this->Html->image($product->images[0]['thumbnail'],['class' => 'max-width-60']), ['controller' => 'Pages','action' => 'products',$product->id], array('escape' => false)); ?>
					</td>
					<td>
						<?php echo $this->Html->link($product->sku,['controller' => 'Pages','action' => 'products',$product->id]) ; ?>
					</td>
					<td><?php echo $this->Html->link($product->product_name,['controller' => 'Pages','action' => 'products',$product->id]) ; ?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
<?php else: ?>
    <div id="no-result">
		<div class="table-responsive" >
			<table class="table table-striped">
				<tr>
					<td>
						We were unable to find results
					</td>
				</tr>
			</table>
		</div>
    </div>
<?php endif; ?>
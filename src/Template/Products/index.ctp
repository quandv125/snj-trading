
<div class="row">
	<div class="col-lg-12 col-md-12 panel panel-white">
		<div class="col-lg-2 col-md-2 col-sm-3"> <!-- Searchbox -->
		   <?= $this->element('Products/searchbox_product',['categories' => $categories]); ?>
		</div> <!-- col-lg-3 -->
		<div class="col-lg-10 col-md-10 col-sm-9">
			<div class="panel-heading clearfix">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
					Products
				</div> <!-- col-lg-8 -->
				<div class="col-lg-4 col-md-4 col-md-4 col-xs-4">
					<!-- Add new products -->
				   <?= $this->element('Products/index_add',['categories' => $categories]) ?>
				</div> <!-- col-lg-4 -->
			</div> 
			<!-- panel-heading -->
			<div class="panel-body">
				<div class="table-responsive" style=" margin-top: 10px; ">
					<table class="table table-striped">
						<thead>
							<tr>
								<th style="width: 1px;">
									<input tabindex="10" type="checkbox" class="icheck CheckboxAll" id="input-10">
								</th>
								<th class="text-center1" style=" width: 130px;"><?php echo __('Product Code') ?></th>
								<th class="text-center1"><?php echo __('Product Name') ?></th>
								<th class="text-center" style=" width: 130px;"><?php echo __('Retail Price') ?></th>
								<th class="text-center" style=" width: 100px;"><?php echo __('Created') ?></th>
								<th class="text-center"><?php echo __('Status') ?></th>
								<th class="text-center" style=" width: 50px;">Actions</th>
							</tr>
						</thead>
						<tbody id="products-details">
							<?php foreach ($products as $key => $product): ?>
							<tr class="row-cz cursor-pointer">
								<td style="width: 1px;">
									<input tabindex="1" type="checkbox" class="icheck Checkbox" id="input-1">
								</td>
								<td class="text-center1 pulse"><?= str_pad($product->sku, ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
								<td class="text-center1 pulse"><?= $product->product_name; ?></td>
								<td class="text-center pulse"><?= number_format($product->retail_price, DECIMALS); ?></td>
								<td class="text-center pulse"><?= $product->created; ?></td>
								<td class="text-center pulse actived-product-<?= $product->id?>"><?= ($product->actived == PRODUCT_ACTIVE)? '<span class="label label-primary">Active</span>':'<span class="label label-danger">Deactive</span>' ?> </td>
								<td class="text-center">
									<div class="dropdown">
										<button class="dropbtn"><i class="fa fa-bars" aria-hidden="true"></i></button>
										<div class="dropdown-content">
											<?php echo $this->Html->link('<i class="fa fa-eye" aria-hidden="true"></i> View', ['controller'=>'pages','action' => 'products',$product->id],['class'=>'','escape'=>false]); ?>
											<?php echo $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i> Update', ['action' => 'edit',$product->id],['class'=>'','escape'=>false]); ?>
											
											<?= $this->Form->postLink(__('<i class="fa fa-trash" aria-hidden="true"></i> Delete'),
											['action' => 'delete', $product->id],
											['confirm' => __('Are you sure you want to delete # {0}?', $product->id),'class' => '', 'escape' => false])?>
										</div>
									</div>
								</td>
							</tr>
							<tr class="row-cz-details hidden">
								<td id="row-spacy" colspan="7">
									<div role="tabpanel">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs nav-justified" role="tablist">
											<li role="presentation" class="active">
												<a href="#tab1<?= $product->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("General") ?></a>
											</li>
											<li role="presentation">
												<a href="#tab2<?= $product->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Infomations"); ?></a>
											</li>
											<li role="presentation">
												<a href="#tab3<?= $product->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Descriptions"); ?></a>
											</li>
										  
											<!-- <li role="presentation">
												<a href="#tab4<?= $product->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Images") ?></a>
											</li> -->
										</ul>
										<!-- Tab panes -->
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane active fade in" id="tab1<?= $product->id?>">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<article class="product-title"><?php echo $product->product_name; ?></article>
												</div>
												<div class="clearfix"></div>
												<div class="content">
												
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
														<?php if (isset($product->images[0])): ?>
															<div class="col-lg-12 text-center">
																<a class="fancyboxs fancybox-thumbs-<?= $key; ?>" id="<?= $key; ?>" data-fancybox-group="thumb" href="../img/<?= $product->images[0]->path?>">
																	<?= $this->Html->image($product->images[0]->thumbnail,['class'=>'image-border zoom_05 img-responsive','width'=>200, 'data-zoom-image' => '../img/'.$product->images[0]->path]) ?>
																</a><div class="divider5"></div>
															</div>
															<div class="col-lg-12 text-center">
																<?php foreach ($product->images as $image): ?>
																	<a class="fancyboxs fancybox-thumbs-<?= $key; ?>" id="<?= $key; ?>" data-fancybox-group="thumb" href="../img/<?= $image->path?>">
																		<?= $this->Html->image($image->thumbnail,['class'=>'image-border zoom_05 img-responsive','width'=>50,'height'=>50, 'data-zoom-image' => '../img/'.$image->path]) ?>
																	</a>
																<?php endforeach ?>
															</div>
														<?php endif ?>
														<div class="clearfix"></div>
													</div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
														<div class="table-responsive table-products">
															<table class="table table-striped">
																<tr>
																	<td class="bold"><?php echo __('Product Code')?></td>
																	<td><?= str_pad($product->sku, ZEROFILL, ZERO, STR_PAD_LEFT); ?></td>
																</tr>
																<tr>
																	<td class="bold"><?php echo  'Categories';?></td>
																	<td><?= $product->category->name?></td>
																</tr>
																<tr>
																	<td class="bold"><?= __("Manufacturer")?>:</td>
																	<td><?= $product->supplier->name; ?></td>
																</tr>
																<tr>
																	<td class="bold"><?php echo __('Conditions') ?>:</td>
																	<td><?= $this->Myhtml->Conditions($product->conditions) ?></td>
																</tr>
																
															</table>
														</div>
													</div>
													<!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 proInfo">
														<div class="description-products">
															<h5><?php// echo __('Remark/Descriptions') ?></h5><div class="divider10"></div>
															<div class="content-description">
																<?php //cho $this->MyHtml->_Cutstring($product->short_description,300,300); ?>
															</div>
														</div>
													  
													</div> -->
													<div class="clearfix divider10"> </div>
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<!-- <button class="btn btn-success btn-addon m-b-sm waves-effect waves-button waves-red" data-toggle="modal" data-target="#ProductEdit<?= $product->id;?>"><i class="fa fa-check-square"></i> Update</button>
														
														<?php //echo $this->element('Products/index_edit',['product'=> $product]);?> -->
														
														<?php if ($product->actived == PRODUCT_DEACTIVE): ?>
															 <button class="btn btn-info deactive-product btn-addon m-b-sm waves-effect waves-button waves-red" actived="<?= PRODUCT_ACTIVE;?>" id="<?= $product->id?>"><i class="fa fa-unlock" aria-hidden="true"></i> Active</button>
														<?php else: ?>
															 <button class="btn btn-primary deactive-product btn-addon m-b-sm waves-effect waves-button waves-red" actived="<?= PRODUCT_DEACTIVE;?>" id="<?= $product->id?>"><i class="fa fa-lock" aria-hidden="true"></i> Deactive</button>
														<?php endif ?>
														
															<!-- <button class="btn btn-success btn-addon m-b-sm waves-effect waves-button waves-red link" id="<?= $product->id;?>"><i class="fa fa-check-square"></i> Popup</button> -->

															<!--  <div id="popup" class="popUpDisplay popUpShow-<?= $product->id;?>">
																<div class="popUpTitle">
																	<span class="cancel""></span>
																</div>
																<div class="popUpContent">
																	<h3>Welcome to Make Code Easy </h3>
																	<br>
																	For getting more knowledge click on Continue
																	<ul class="buttons">
																		<li><span class="button">Continue</span></li>
																		<li><span class="button" class="cancel">Cancel</span></li>
																	</ul>
																</div>
															</div> -->
															<div class="clearfix"></div>

													</div>
												</div>
											</div>
											
											<div role="tabpanel" class="tab-pane fade" id="tab2<?= $product->id?>">
												<div class="col-md-6">
													<table class="table table-striped">
														<tr>
															<td class="bold"><?php echo __('Release Date')?></td>
															<td><b><?php echo date("Y-m-d", strtotime($product->release_date)) ?></b></td>
														</tr>
														<tr>
															<td class="bold"><?php echo __('Size')?></td>
															<td><b><?php echo $product->size ?></b></td>
														</tr>
														<tr>
															<td class="bold"><?php echo __('Status')?></td>
															<td><b><?php echo $product->status ?></b></td>
														</tr>
														<tr>
															<td class="bold"><?php echo __('Brand')?></td>
															<td><b><?php echo $product->brand ?></b></td>
														</tr>
														<tr>
															<td class="bold"><?php echo __('Origin')?></td>
															<td><b><?php echo $product->origin ?></b></td>
														</tr>
													</table>
												</div>
												<div class="col-md-6">
													<table class="table table-striped">
														<tr>
															<td class="bold"><?php echo __('Weight')?></td>
															<td><?= $product->weight; ?></td>
														</tr>
														<tr>
															<td class="bold"><?php echo __('Color')?></td>
															<td><?= $product->color; ?></td>
														</tr>
														<tr>
															<td class="bold"><?php echo __('Meterial')?></td>
															<td><?= $product->meterial; ?></td>
														</tr>
														<tr>
															<td class="bold"><?php echo __('Manufacturer')?></td>
															<td><?= $product->manufacturer; ?></td>
														</tr>
														<tr>
															<td class="bold"><?php echo __('Composition')?></td>
															<td><?= $product->composition; ?></td>
														</tr>
													</table>
												</div>
												
												<div class="clearfix"></div>
												<?php if (isset($product->properties) && !empty($product->properties)): ?>
													<table class="table table-striped">
														<?php foreach (json_decode($product->properties) as $key => $propertie): ?>
															<?php if (!empty($propertie->value)): ?>
																<tr>
																	<td class="bold"><?php echo $propertie->label ?> * </td>
																	<td><?php echo $propertie->value?></td>
																</tr>
															<?php endif ?>
														<?php endforeach ?>
													</table>
												<?php endif ?>
											</div>
											<div role="tabpanel" class="tab-pane fade" id="tab3<?= $product->id?>">
												<!-- <?php //echo $product->description; ?> -->
											</div>
											<!-- <div role="tabpanel" class="tab-pane fade" id="tab4<?= $product->id?>">
												<?php// if (isset($product->images) && !empty($product->images)): ?>
													<?php// foreach ($product->images as $key => $image):?>
														<div class="show-image show-image-<?= $image->id?>">
															<?php //echo $this->Html->image($image->thumbnail,['class'=>'image-border','width'=>100, 'height'=> 100]) ?>
															<span class="btn btn-success star" id="<?= $image->id?>"><i class="fa fa-star" aria-hidden="true"></i> </span>
															<span class="btn btn-danger delete deletePI" id="<?= $image->id?>"><i class="fa fa-trash-o" aria-hidden="true"></i> </span>
														</div>
													<?php// endforeach; ?>
												<?php// endif ?>
											</div> -->
										</div>
									</div>
								</td>
							</tr>
							<?php endforeach ?>
							<tr>
								<td colspan="7" class="bg-white"><?= $this->element('pagination',['num_page'=>$num_page])?></td>
							</tr>
						</tbody>
					</table>
					
				</div>
			</div> <!-- panel-body -->
		</div> <!-- col-lg-9 -->
	</div><!-- col-lg-12 -->
</div> <!-- row -->

<!-- <div id="modalStocks" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"></h4>
			</div>
			<div class="modal-body modal-Stocks"></div>
		</div>
	</div>
</div>
 -->
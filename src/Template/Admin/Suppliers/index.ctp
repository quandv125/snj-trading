
<div class="row">
	<div class="col-lg-12 col-md-12 panel panel-white" style="    min-height: 700px;">
		<div class="col-lg-2 col-md-2 col-sm-3">
		<!-- Searchbox -->
		<?php echo $this->element('Suppliers/searchbox'); ?>
		</div>
		<!-- col-lg-3 -->
		<div class="col-lg-10 col-md-10 col-sm-9">
			<div class="panel-heading clearfix">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
					suppliers
				</div> 
				<!-- col-lg-8 -->
				<div class="col-lg-4 col-md-4 col-md-4 col-xs-4">
					<!-- Add new suppliers -->
					 <?= $this->element('suppliers/index_add') ?>
				</div> 
				<!-- col-lg-4 -->
			</div> 
			<!-- panel-heading -->
			<div class="panel-body">
				<div class="">
					<div class="table-responsive" style="margin-top: 10px;">
						<table class="table table-striped">
							<thead>
								<tr>
									<th style="width: 1px;">
										<input tabindex="10" type="checkbox" class="icheck CheckboxAll" id="input-10">
									</th>
									<th class="text-center" scope="col"><?= $this->Paginator->sort('code') ?></th>
									<th class="text-center" scope="col"><?= $this->Paginator->sort('name') ?></th>
									<th class="text-center" scope="col"><?= $this->Paginator->sort('Address') ?></th>
									<th class="text-center" scope="col"><?= $this->Paginator->sort('Phone') ?></th>
									<th class="text-center" scope="col"><?= $this->Paginator->sort('email') ?></th>
									<th class="text-center" scope="col"><?= $this->Paginator->sort('Action') ?></th>
								</tr>
							</thead>
							<tbody id="suppliers-details">
								<?php foreach ($suppliers as $suppliers): ?>
									 <tr class="row-cz cursor-pointer">
										<td style="width: 1px;">
											<input tabindex="1" type="checkbox" class="icheck Checkbox" id="input-1">
										</td>
										<td class="text-center"><?= ($suppliers->id) ?></td>
										<td class="text-center"><?= h($suppliers->name) ?></td>
										<td class="text-center"><?= h($suppliers->address) ?></td>
										<td class="text-center"><?= h($suppliers->tel) ?></td>
										<td class="text-center"><?= h($suppliers->email) ?></td>
										<td class="text-center">
											<button class="btn btn-success waves-effect waves-button waves-red" data-toggle="modal" data-target="#SuppliersEdit<?= $suppliers->id;?>"><i class="fa fa-pencil"></i></button>
										</td>
									</tr>
									<tr class="row-cz-details hidden">
										<td colspan="7">
											<div role="tabpanel">
												<!-- Nav tabs -->
												<ul class="nav nav-tabs nav-justified" role="tablist">
													<li role="presentation" class="active">
														<a href="#tab1<?= $suppliers->id?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Infomations") ?></a>
													</li>
													
												</ul>
												<!-- Tab panes -->
												<div class="tab-content">
													<div role="tabpanel" class="tab-pane active fade in" id="tab1<?= $suppliers->id?>">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<article class="suppliers-title"></article>
														</div>
														<div class="clearfix"></div>
														<div class="content">
															<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																<table class="table table-striped">
																		<tr>
																			<td class="bold"><?php echo __('Code')?></td>
																			<td><?= $suppliers->id; ?></td>
																			<td class="bold"><?php echo __('Tel')?></td>
																			<td><?= $suppliers->tel; ?></td>
																		</tr>
																		<tr>
																			<td class="bold"><?php echo  __('Name')?></td>
																			<td><?= $suppliers->name?></td>
																			<td class="bold"><?php echo __('Tax') ?>:</td>
																			<td><?= $suppliers->tax_registration_number; ?></td>
																		</tr>
																		<tr>
																		   
																			<td class="bold"><?= __('Fax')?>:</td>
																			<td><?= $suppliers->fax?></td>
																			<td class="bold"><?= __('Email')?>:</td>
																			<td><?= $suppliers->email?></td>
																		</tr>
																		<tr>
																			<td class="bold"><?php echo __('Address')?>:</td>
																			<td><?= $suppliers->address; ?></td>
																			 <td class="bold"><?php echo __('Location')?>:</td>
																			<td><?= $suppliers->location; ?></td>
																		</tr>
																		
																	</table>
															</div>
															
															<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
																<div class="suppliers">
																	<h5><?php echo __('Remark')?></h5><div class="divider10"></div>
																	<div class="content">
																		<textarea cols="33" rows="7"><?= $suppliers->note; ?></textarea>
																	</div>
																</div>
															</div>
															<div class="clearfix divider10"> </div>
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																
																<!-- Modal -->
																<?php echo $this->element('suppliers/index_edit',['supplier'=> $suppliers]);?>
																<?php echo $this->Form->postLink(__('<i class="fa fa-trash"></i> Delete'),['action' => 'delete', $suppliers->id],['confirm' => __('Are you sure you want to delete # {0}?', $suppliers->id),'class' => 'btn btn-danger btn-addon m-b-sm waves-effect waves-button waves-red', 'escape' => false])?>
															</div>
														</div>
													</div>
												
												</div>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div><!-- col-lg-4 -->
			</div> <!-- panel-body -->
		</div> <!-- col-lg-9 -->
	</div><!-- col-lg-12 -->
</div> <!-- row -->









<div class="timeline-horizontal-wap text-center">
    <ul class="timeline timeline-horizontal">
        <li class="timeline-item">
            <div class="timeline-badge <?= ($inquiry->status >= 1)?"success":"default"?>" data-toggle="tooltip" title="Step 1" data-placement="bottom"><i class="fa fa-pencil"></i></div>
        </li>
        <li class="timeline-item">
            <div class="timeline-badge <?= ($inquiry->status >= 2)?"success":"default"?>" data-toggle="tooltip" title="Step 2" data-placement="bottom"><i class="glyphicon glyphicon-check"></i></div>
        </li>
        <li class="timeline-item">
            <div class="timeline-badge <?= ($inquiry->status >= 3)?"success":"default"?>" data-toggle="tooltip" title="Step 3" data-placement="bottom"><i class="glyphicon glyphicon-check"></i></div>
        </li>
        <li class="timeline-item">
            <div class="timeline-badge <?= ($inquiry->status >= 4)?"success":"default"?>" data-toggle="tooltip" title="Step 4" data-placement="bottom"><i class="glyphicon glyphicon-check"></i></div>
        </li>
        <li class="timeline-item">
            <div class="timeline-badge <?= ($inquiry->status >= 5)?"success":"default"?>" data-toggle="tooltip" title="Step 5" data-placement="bottom"><i class="glyphicon glyphicon-check"></i></div>
        </li>
    </ul>
</div>

<?php if ($inquiry->type == UNAVAILABLE): ?>
<div class="col-md-12 item-unavailable" id="<?= h($inquiry->id) ?>">
    <div class="col-md-4">
        <label>Vessel Name</label>
        <input type="text" class="form-control vessel_name" value="<?= h($inquiry->vessel) ?>" name="">
    </div>
    <div class="col-md-4">
        <label>IMO No</label>
        <input type="text" class="form-control imo_no" value="<?= h($inquiry->imo_no) ?>" name="">
    </div>
    <div class="col-md-4">
        <label>Hull No</label>
        <input type="text" class="form-control maker_type" value="<?= h($inquiry->ref) ?>" name="">
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12">
        <label>Description</label>
        <textarea class="form-control description" rows="5"><?= h($inquiry->description) ?></textarea>
    </div>
    <div class="clearfix"></div><br>
        <?php if (!empty($inquiry->inquirie_products)): ?>
            <?php foreach ($inquiry->inquirie_products as $inquirieProducts): ?>
                <?php $no = ($inquirieProducts->no == 0)? "":$inquirieProducts->no; ?>
                <?php 
                    $data[] = ["ProductID"=>$inquirieProducts->id, "no" => $no, "name"=> $inquirieProducts->name, "maker_type_ref"=>$inquirieProducts->maker_type_ref, "partno"=>$inquirieProducts->partno, "unit"=>$inquirieProducts->unit, "quantity"=>$inquirieProducts->quantity,"remark"=>$inquirieProducts->remark]
                 ?>
            <?php endforeach ?>
            <div id="grid"></div>
            <div id="datahandtable" data-room='<?php echo json_encode($data);?>'></div>
            <!-- <div id="exampleView"></div> -->
        <?php endif; ?>
</div>

<?php else: ?>

<div id="content">
    <div class="content-page woocommerce">
        <div class="container">
            <div class="cart-content-page">
                <h2 class="title-shop-page"></h2>
                <div class="table-responsive">
                    <table cellspacing="0" class="shop_table cart table">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo __('#'); ?></th>
                                <th class="text-center" style="max-width: 100px;"><?php echo __('Name'); ?></th>
                                <th class="text-center"><?php echo __('Category'); ?></th>
                                <th class="text-center"><?php echo __('Serial No'); ?></th>
                                <th class="text-center"><?php echo __('Type Model'); ?></th>
                                <th class="text-center"><?php echo __('Origin'); ?></th>
                                <!--  <th class="text-center"><?php echo __('Price'); ?></th> -->
                                <th class="text-center"><?php echo __('Quantity'); ?></th>
                                <th class="text-center"><?php echo __('Remark'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0; ?><?php $total_qty = 0; ?>
                            <?php foreach ($inquiry->inquirie_products as $key => $inq): ?>

                                <?php $total_qty = $total_qty + $inq->quantity?>
                                <tr class="cart_item cart_item_<?php echo $inq->id; ?>" invoice_product_id="<?php echo $inq->id; ?>">
                                    <td class="text-center">
                                        <span class="" product_id=""><i class="fa fa-times"></i></span>
                                    </td>
                                    <td class="text-center">
                                        <?= $this->Html->link($inq['Products']['product_name'], ['controller'=>'pages','action'=>'Products', $inq['Products']['id']], array('escape' => false)); ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $this->Html->link($inq['Categories']['name'], ['controller'=>'pages','action'=>'categoriesParent', $inq['Categories']['id']], array('escape' => false)); ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $inq['Products']['serial_no'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $inq['Products']['type_model'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $inq['Products']['origin'] ?>
                                    </td>
                                    <!-- <td class="text-center">
                                        $ <?= $price = $inq['Products']['retail_price']; ?>
                                        <?php $total = $total+($price*$inq->quantity); ?>
                                    </td> -->
                                    <td class="text-center">
                                        <div class="info-qty" id="<?php echo $key; ?>">
                                            <span class="qty-val"><?php echo $inq->quantity ?></span>
                                        </div>          
                                    </td>
                                    <td class="text-center">
                                        <?php echo $inq->remark ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                   
                    <div class="clearfix"></div><br>
                </div>
            </div>
        </div>  
    </div>
</div>
<?php endif ?>

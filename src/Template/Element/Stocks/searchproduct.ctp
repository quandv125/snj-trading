<?php if (!empty($products->toarray())): ?>
 <div class="table-responsive margin-top10" id="slimtest1" >
    <table class="table table-striped cursor-pointer">

    <?php foreach ($products as $key => $product): ?>
        <tr class="add-products" id="<?= $str_rand?>" pid="<?= $product->id;?>" sku="<?= $product->sku?>" name="<?= $product->product_name?>" price="<?= $product->supply_price;?>">
            <td><?php echo 'P.'.$product->sku; ?></td>
            <td><?php echo $product->product_name?></td>
        </tr>
    <?php endforeach ?>
</table>
</div>
<?php else: ?>
    <div id="no-result">
        Khong tim thay ket qua phu hop
    </div>
<?php endif; ?>
<nav aria-label="Page navigation" class="float-right">
  <ul class="pagination" limit="<?php echo LIMIT; ?>" type="<?= @$type?>">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php if (isset($type)): ?>
      <?php for ($i=1; $i <= $num_page; $i++) { ?>
        <?php if($i == $page): ?>
            <li class="pagi-<?= $str_rand;?> pages-<?php echo $i;?> active"><a href="#"><?php echo $i; ?></a></li>
        <?php else: ?>
            <li class="pagi-<?= $str_rand;?> pages-<?php echo $i;?> "><a href="#"><?php echo $i; ?></a></li>
        <?php endif ?>
      <?php } ?>
    <?php else: ?>
      <?php for ($i=1; $i <= $num_page; $i++) { ?>
        <?php if($i == $page): ?>
            <li class="products-pagination pages-<?php echo $i;?> active"><a href="#"><?php echo $i; ?></a></li>
        <?php else: ?>
            <li class="products-pagination pages-<?php echo $i;?> "><a href="#"><?php echo $i; ?></a></li>
        <?php endif ?>
      <?php } ?>
    <?php endif ?>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
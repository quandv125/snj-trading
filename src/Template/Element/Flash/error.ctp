 <?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}

?>
<?php if (is_array($message)): ?>
	<?php foreach ($message as $msg): ?>
		<div class="alert alert-danger alert-dismissible item-message-box " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <?= $msg ?>
        </div>
		<div class="clearfix"></div>
	<?php endforeach ?>
<?php else: ?>
	<div class="error item-message-box item-message-info">
		<p style="float: left;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  <?= $message ?></p>
		<i class="fa fa-times close-flash" aria-hidden="true" style=" float: right; margin-top: 5px;"></i>
	</div>
	<div class="clearfix"></div>
<?php endif ?>

<script type="text/javascript">
	$('div.item-message-box').delay(5000).fadeOut();
</script>


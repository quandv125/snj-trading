<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="item-message-box item-message-info">
	<p style="float: left;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  <?= $message ?>.</p>
	<i class="fa fa-times close-flash" aria-hidden="true" style=" float: right; margin-top: 5px;"></i>
</div>
<div class="clearfix"></div>
<script type="text/javascript">
	$('div.item-message-box').delay(5000).slideUp();
</script>
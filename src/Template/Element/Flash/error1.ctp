<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="item-message-box item-message-info">
		<p style="float: left;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  <?= $message ?>.</p>
		<i class="fa fa-times close-flash" aria-hidden="true" style="    float: right;    margin-top: 5px;"></i>
	</div>
</div>
<div class="clearfix"></div>
<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!-- <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="item-message-box item-message-info-success">
		<p style="float: left;"><i class="fa fa-check-square" aria-hidden="true"></i>  <?= $message ?></p>
		<i class="fa fa-times close-flash" aria-hidden="true" style="    float: right;    margin-top: 5px;"></i>
	</div>
</div>
 -->

<div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <strong> <?= $message ?> </strong> 
</div>

<div class="clearfix"></div>
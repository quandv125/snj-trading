
<div class="row">
	<button name="save" class="btn btn-success float-right" id="save"><i class="fa fa-paper-plane"></i> Send</button>
	<div class="col-md-12 item-unavailable" id="AddNewIqr" inqid="">
		<div class="col-md-4">
			<label><?php echo __("Vessel Name"); ?></label>
			<input type="text" class="form-control vessel" name="">
		</div>
		<div class="col-md-4">
			<label><?php echo __("IMO No"); ?></label>
			<input type="text" class="form-control imo_no" name="">
		</div>
		<div class="col-md-4">
			
			<label><?php echo __("Hull No"); ?></label>
			<input type="text" class="form-control hull_no" name="">
		</div>
		<div class="col-md-4">
			<label><?php echo __("Date"); ?></label>
			<input type="text" class="form-control date" value="<?php echo date("Y-m-d"); ?>" name="">
		</div>
		<div class="col-md-4">
			<label><?php echo __("Ref"); ?></label>
			<input type="text" class="form-control ref" name="">
		</div>
		<div class="clearfix"></div>
		<div class="col-md-12">
			<label><?php echo __("Description"); ?></label>
			<textarea class="form-control description" rows="5"></textarea>
		</div>
		<div class="clearfix"></div><br>
		<div id="exampleAdd"></div>
	</div>
</div>


<div class="row">
<button class="btn btn-success float-right" id="add-new-unavailable"><i class="fa fa-plus"></i></button>
	<div class="col-md-12 item-unavailable">
			<div class="col-md-4">
				<label>Vessel Name</label>
				<input type="text" class="form-control vessel_name" name="">
			</div>
			<div class="col-md-4">
				<label>IMO No</label>
				<input type="text" class="form-control imo_no" name="">
			</div>
			<div class="col-md-4">
				
				<label>Maker/Type Ref</label>
				<input type="text" class="form-control maker_type" name="">
			</div>
			<div class="clearfix"></div>
			<div class="col-md-12">
				<label>Description</label>
				<textarea class="form-control textarea-available note"></textarea>
			</div>
				<div class="clearfix"></div><br>
			<table class="table table-bordered table-color">
				<thead style="background: rgba(77, 101, 101, 0.16);">
					<tr>
						<th><?php echo __("#");?></th>
						<th><?php echo __("Part No*");?></th>
						<th><?php echo __("Name*");?></th>
						<th><?php echo __("Model/Serial No");?></th>
						<th><?php echo __("Quantity*");?></th>
						<th><?php echo __("Unit");?></th>
						<th><?php echo __("Remark");?></th>
					</tr>
				</thead>
				<tbody class="tbody-unavailable">
					<tr class="tr-unavailable">
						<td><input type="checkbox" class="" name=""></td>
						<td><input type="text" class="form-control part_no" name=""></td>
						<td><input type="text" class="form-control product_name" name=""></td>
						<td><input type="text" class="form-control model_serial_no" name=""></td>
						<td><input type="text" class="form-control quantity" name=""></td>
						<td><input type="text" class="form-control unit" name=""></td>
						<td><textarea class="form-control textarea-available remark"></textarea></td>
					</tr>
				</tbody>
			</table>
	</div>
	<div class="clearfix"></div>
	<button class="btn btn-success float-right" id="send-inquiry-unavailable"><i class="fa fa-paper-plane"></i> Send</button>
</div>
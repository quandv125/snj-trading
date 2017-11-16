<table class="table table-limit-width">
	<thead>
	</thead>
	<tbody>
	<?php foreach ($acos as $key => $parent): ?>
		<tr style="background-color: #3cc8de;">
			<td class="parent" id="<?php echo $parent['id'] ?>"> 
				<b><?php echo $parent['alias']; ?></b>
			</td>
			<td>
				<input type="checkbox" aco_id="<?php echo $parent['id'] ?>" <?php echo ($parent['actived'])? "checked":"" ?> class="chbox-actived-controller">
			</td>
		</tr>
		<?php foreach ($parent['children'] as $key => $children): ?>
			<tr class="hidden1 children-<?php echo $parent['id'] ?>">
				<td>
					<span style="margin-left: 30px;" class="children-alias"><?php echo $children['alias']; ?></span>
				</td>
				<td>
					<input type="checkbox"  aco_id="<?php echo $children['id']; ?>" <?php echo ($children['actived'])? "checked":"" ?> class="chbox-actived-controller">
				</td>
			</tr>
		<?php endforeach ?>
	<?php endforeach ?>
	</tbody>
</table>

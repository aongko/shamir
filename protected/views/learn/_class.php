<tr>
	<td>
		<?= $data->class_name; ?>
	</td>
	<td>
		<?= $data->max_capacity; ?>
	</td>
	<td>
		<?= $data->description; ?>
	</td>
	<td style="text-align: center;">
		<a href = ' <?php echo CHtml::normalizeUrl(array('/' . $this->getId() . '/classDetail', 'classId'=> $data->class_id))?>'>View Detail</a>
	</td>
</tr>

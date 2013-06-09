<tr>
	<td style="border-bottom: 1px solid #000">
		<?php
		echo 'class_name : ' . $data->class_name . '</br>';
		echo 'max_capacity : ' . $data->max_capacity . '</br>';
		echo 'description : ' . $data->description . '</br>';
		//echo CHtml::normalizeUrl(array('/' . $this->module->getId() . '/' . $this->getId() . '/' . $this->action->getId(), 'classId'=> $data->class_id)) . '<br>';
		?>
	</td>
	<td style="border-bottom: 1px solid #000">
		<a href = ' <?php echo CHtml::normalizeUrl(array('/' . $this->getId() . '/classDetail', 'classId'=> $data->class_id))?>'>View Detail</a>
	</td>
</tr>

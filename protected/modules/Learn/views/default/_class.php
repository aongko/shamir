<table>
	<tr>
		<td>
			<?php
			echo 'class_name : ' . $data->class_name . '</br>';
			echo 'max_capacity : ' . $data->max_capacity . '</br>';
			echo 'description : ' . $data->description . '</br>';
			//echo CHtml::normalizeUrl(array('/' . $this->module->getId() . '/' . $this->getId() . '/' . $this->action->getId(), 'classId'=> $data->class_id)) . '<br>';
			?>
		</td>
		<td>
			<a href = ' <?php echo CHtml::normalizeUrl(array('/' . $this->module->getId() . '/' . $this->getId() . '/classDetail', 'classId'=> $data->class_id))?>'>View Detail</a>
		</td>
	</tr>
</table>

<?php
echo '<hr>';
?>
</div></a>

<?php
/* @var $this TrAssignmentController */
/* @var $data TrAssignment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('assignment_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->assignment_id), array('view', 'id'=>$data->assignment_id, 'classId'=>$this->module->classId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('session_id')); ?>:</b>
	<?php echo CHtml::encode($data->session_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_id')); ?>:</b>
	<?php echo CHtml::encode($data->file_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_input')); ?>:</b>
	<?php echo CHtml::encode($data->user_input); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('input_date')); ?>:</b>
	<?php echo CHtml::encode($data->input_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_record')); ?>:</b>
	<?php echo CHtml::encode($data->status_record); ?>
	<br />

	*/ ?>

</div>

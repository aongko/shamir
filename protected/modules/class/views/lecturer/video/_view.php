<?php
/* @var $this TrVideoController */
/* @var $data TrVideo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('video_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->video_id), array('view', 'id'=>$data->video_id, 'classId'=>$this->module->classId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video_name')); ?>:</b>
	<?php echo CHtml::encode($data->video_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video_url')); ?>:</b>
	<?php echo CHtml::encode($data->video_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('added_by')); ?>:</b>
	<?php echo CHtml::encode($data->added_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('added_date')); ?>:</b>
	<?php echo CHtml::encode($data->added_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_input')); ?>:</b>
	<?php echo CHtml::encode($data->user_input); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('input_date')); ?>:</b>
	<?php echo CHtml::encode($data->input_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status_record')); ?>:</b>
	<?php echo CHtml::encode($data->status_record); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('session_id')); ?>:</b>
	<?php echo CHtml::encode($data->session_id); ?>
	<br />

	*/ ?>

</div>

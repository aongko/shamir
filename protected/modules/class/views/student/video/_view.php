<?php
/* @var $this TrVideoController */
/* @var $data TrVideo */
?>

<div class="view">

	<b><h3><?php echo CHtml::link(CHtml::encode($data->video_name), array('view', 'id'=>$data->video_id, 'classId'=>$this->module->classId)); ?></h3></b>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('added_by')); ?>:</b>
	<?php echo CHtml::encode($data->addedBy->user_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('added_date')); ?>:</b>
	<?php echo CHtml::encode($data->added_date); ?>
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

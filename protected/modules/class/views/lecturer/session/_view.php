<?php
/* @var $this SessionController */
/* @var $data MsSession */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('session_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->session_id), array('view', 'id'=>$data->session_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_id')); ?>:</b>
	<?php echo CHtml::encode($data->class_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('session_name')); ?>:</b>
	<?php echo CHtml::encode($data->session_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('session_number')); ?>:</b>
	<?php echo CHtml::encode($data->session_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('front_image')); ?>:</b>
	<?php echo CHtml::encode($data->front_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_start')); ?>:</b>
	<?php echo CHtml::encode($data->date_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_end')); ?>:</b>
	<?php echo CHtml::encode($data->date_end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_input')); ?>:</b>
	<?php echo CHtml::encode($data->user_input); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('input_date')); ?>:</b>
	<?php echo CHtml::encode($data->input_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_record')); ?>:</b>
	<?php echo CHtml::encode($data->status_record); ?>
	<br />

	*/ ?>

</div>
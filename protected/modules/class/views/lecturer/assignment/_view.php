<?php
/* @var $this TrAssignmentController */
/* @var $data TrAssignment */
?>

<div class="view">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('assignment_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->assignment_id), array('view', 'id'=>$data->assignment_id, 'classId'=>$this->module->classId)); ?>
	<br />
	<b><?php echo 'uploaded by' ?>:</b>
	<?php echo CHtml::encode($data->account->user_name)?>
	<br />
	<b><?php echo CHtml::link('Download Submission', array('getAssignmentDetailFile', 'assignmentDetailId'=>$data->assignment_detail_id, 'classId'=>$this->module->classId)); ?></b>
	<br />
</div>

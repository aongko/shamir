<?php
/* @var $this TrAssignmentController */
/* @var $model TrAssignment */

$this->breadcrumbs=array(
	'Tr Assignments'=>array('index', 'classId'=>$this->module->classId),
	$model->assignment_id,
);

$this->menu=array(
	array('label'=>'List TrAssignment', 'url'=>array('index', 'classId'=>$this->module->classId)),
	array('label'=>'Create TrAssignment', 'url'=>array('create', 'classId'=>$this->module->classId)),
	array('label'=>'Update TrAssignment', 'url'=>array('update', 'id'=>$model->assignment_id, 'classId'=>$this->module->classId)),
	array('label'=>'Delete TrAssignment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->assignment_id, 'classId'=>$this->module->classId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TrAssignment', 'url'=>array('admin', 'classId'=>$this->module->classId)),
);
?>

<h1>View TrAssignment #<?php echo $model->assignment_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'assignment_id',
		'session_id',
		'created_by',
		'created_date',
		'content',
		'file_id',
		'user_input',
		'input_date',
		'status_record',
	),
)); ?>

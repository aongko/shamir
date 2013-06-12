<?php
/* @var $this TrVideoController */
/* @var $model TrVideo */

$this->breadcrumbs=array(
	'Tr Videos'=>array('index', 'classId'=>$this->module->classId),
	$model->video_id,
);

$this->menu=array(
	array('label'=>'List TrVideo', 'url'=>array('index', 'classId'=>$this->module->classId)),
	array('label'=>'Create TrVideo', 'url'=>array('create', 'classId'=>$this->module->classId)),
	array('label'=>'Update TrVideo', 'url'=>array('update', 'id'=>$model->video_id, 'classId'=>$this->module->classId)),
	array('label'=>'Delete TrVideo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->video_id, 'classId'=>$this->module->classId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TrVideo', 'url'=>array('admin', 'classId'=>$this->module->classId)),
);
?>

<h1>View TrVideo #<?php echo $model->video_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'video_id',
		'video_name',
		'video_url',
		'added_by',
		'added_date',
		'user_input',
		'input_date',
		'status_record',
		'session_id',
	),
)); ?>

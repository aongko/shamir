<?php
/* @var $this SessionController */
/* @var $model MsSession */

$this->breadcrumbs=array(
	'Ms Sessions'=>array('index', 'classId'=>$this->module->classId),
	$model->session_id,
);

$this->menu=array(
	array('label'=>'List MsSession', 'url'=>array('index', 'classId'=>$this->module->classId)),
	array('label'=>'Create MsSession', 'url'=>array('create', 'classId'=>$this->module->classId)),
	array('label'=>'Update MsSession', 'url'=>array('update', 'id'=>$model->session_id, 'classId'=>$this->module->classId)),
	array('label'=>'Delete MsSession', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->session_id, 'classId'=>$this->module->classId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MsSession', 'url'=>array('admin', 'classId'=>$this->module->classId)),
);
?>

<h1>View MsSession #<?php echo $model->session_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'session_id',
		'class_id',
		'session_name',
		'session_number',
		'front_image',
		'description',
		'content',
		'date_start',
		'date_end',
		'user_input',
		'input_date',
		'status_record',
	),
)); ?>

<?php
/* @var $this SessionController */
/* @var $model MsSession */

$this->breadcrumbs=array(
	'Ms Sessions'=>array('index', 'classId'=>$this->module->classId),
	$model->session_id=>array('view','id'=>$model->session_id, 'classId'=>$this->module->classId),
	'Update',
);

$this->menu=array(
	array('label'=>'List MsSession', 'url'=>array('index', 'classId'=>$this->module->classId)),
	array('label'=>'Create MsSession', 'url'=>array('create', 'classId'=>$this->module->classId)),
	array('label'=>'View MsSession', 'url'=>array('view', 'id'=>$model->session_id, 'classId'=>$this->module->classId)),
	array('label'=>'Manage MsSession', 'url'=>array('admin', 'classId'=>$this->module->classId)),
);
?>

<h1>Update MsSession <?php echo $model->session_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

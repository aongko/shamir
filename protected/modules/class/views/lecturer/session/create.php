<?php
/* @var $this SessionController */
/* @var $model MsSession */

$this->breadcrumbs=array(
	'Ms Sessions'=>array('index', 'classId'=>$this->module->classId),
	'Create',
);

$this->menu=array(
	array('label'=>'List MsSession', 'url'=>array('index', 'classId'=>$this->module->classId)),
	array('label'=>'Manage MsSession', 'url'=>array('admin', 'classId'=>$this->module->classId)),
);
?>

<h1>Create MsSession</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

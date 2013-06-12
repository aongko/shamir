<?php
/* @var $this TrVideoController */
/* @var $model TrVideo */

$this->breadcrumbs=array(
	'Tr Videos'=>array('index', 'classId'=>$this->module->classId),
	'Create',
);

$this->menu=array(
	array('label'=>'List TrVideo', 'url'=>array('index', 'classId'=>$this->module->classId)),
	array('label'=>'Manage TrVideo', 'url'=>array('admin', 'classId'=>$this->module->classId)),
);
?>

<h1>Create TrVideo</h1>

<?php echo $this->renderPartial('_addVideoForm', array('model'=>$model)); ?>

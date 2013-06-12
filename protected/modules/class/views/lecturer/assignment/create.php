<?php
/* @var $this TrAssignmentController */
/* @var $model TrAssignment */

$this->breadcrumbs=array(
	'Assignments'=>array('index', 'classId'=>$this->module->classId),
	'Create',
);

$this->menu=array(
	array('label'=>'List Assignment', 'url'=>array('index', 'classId'=>$this->module->classId)),
	array('label'=>'Manage Assignment', 'url'=>array('admin', 'classId'=>$this->module->classId)),
);
?>

<h1>Create TrAssignment</h1>

<?php echo $this->renderPartial('addAssignment', array('model'=>$model)); ?>

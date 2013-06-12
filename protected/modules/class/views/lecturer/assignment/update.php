<?php
/* @var $this TrAssignmentController */
/* @var $model TrAssignment */

$this->breadcrumbs=array(
	'Tr Assignments'=>array('index', 'classId'=>$this->module->classId),
	$model->assignment_id=>array('view','id'=>$model->assignment_id, 'classId'=>$this->module->classId),
	'Update',
);

$this->menu=array(
	array('label'=>'List TrAssignment', 'url'=>array('index', 'classId'=>$this->module->classId)),
	array('label'=>'Create TrAssignment', 'url'=>array('create', 'classId'=>$this->module->classId)),
	array('label'=>'View TrAssignment', 'url'=>array('view', 'id'=>$model->assignment_id, 'classId'=>$this->module->classId)),
	array('label'=>'Manage TrAssignment', 'url'=>array('admin', 'classId'=>$this->module->classId)),
);
?>

<h1>Update TrAssignment <?php echo $model->assignment_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

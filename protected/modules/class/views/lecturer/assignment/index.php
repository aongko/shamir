<?php
/* @var $this TrAssignmentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tr Assignments',
);

$this->menu=array(
	array('label'=>'Create TrAssignment', 'url'=>array('create', 'classId'=>$this->module->classId)),
	array('label'=>'Manage TrAssignment', 'url'=>array('admin', 'classId'=>$this->module->classId)),
);
?>

<h1>Assignments Submissions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

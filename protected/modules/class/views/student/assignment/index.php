<?php
/* @var $this AssignmentController */

$this->breadcrumbs=array(
	'Assignment',
);
?>
<h1>Assignments</h1>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tr-assignments',
	'dataProvider'=>$dp,
	'emptyText'=>'No assignments',
	'columns'=>array(
		array(
			'header'=>'Lecturer',
			'value'=>'$data->createdBy->user_name',
		),
		'content',
		array(
			'class'=>'CLinkColumn',
			'header'=>'File',
			'label'=>'Download',
			'urlExpression'=>'CHtml::normalizeUrl(array("getAssignmentFile", "assignmentId"=>$data->assignment_id, "classId"=>Yii::app()->controller->module->classId))',
		),
		array(
			'class'=>'CLinkColumn',
			'header'=>'',
			'label'=>'View/Submit Assignment',
			'urlExpression'=>'CHtml::normalizeUrl(array("view", "assignmentId"=>$data->assignment_id, "classId"=>Yii::app()->controller->module->classId))',
		),
		//array('header'=>'File', 'value'=>'CHtml::normalizeUrl(array("getAssignmentFile", "discussionId"=>$data->assignment_id, "classId"=>Yii::app()->controller->module->classId))')
		//array('header'=>'File', 'value'=>'$data->assignment_id')
		//array('header'=>'Content', 'name'=>'content', 'value'=>'substr($data->content, 0, 50)'),
	),
));
?>

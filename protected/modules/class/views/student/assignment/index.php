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
		array (
			'class'=>'CButtonColumn',
			'template'=>'{tick}',
			'header'=>'Submitted?',
			'buttons'=>array(
				'tick'=>array(
					'imageUrl'=>Yii::app()->createUrl("/images/centang.png"),
					'visible'=>'Yii::app()->controller->hasSubmitted($data->assignment_id)',
				),
			),
			/*
			'header'=>'',
			'imageUrl'=>'CHtml::image(Yii::app()->createUrl("/images/centang.png"), "submitted")',
			'visible'=>'$data->assignment_id = 4',
			*/
		),
		//array('header'=>'File', 'value'=>'CHtml::normalizeUrl(array("getAssignmentFile", "discussionId"=>$data->assignment_id, "classId"=>Yii::app()->controller->module->classId))')
		//array('header'=>'File', 'value'=>'$data->assignment_id')
		//array('header'=>'Content', 'name'=>'content', 'value'=>'substr($data->content, 0, 50)'),
	),
));
?>

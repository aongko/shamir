<?php
/* @var $this TrAssignmentController */
/* @var $model TrAssignment */

$this->breadcrumbs=array(
	'Tr Assignments'=>array('index', 'classId'=>$this->module->classId),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TrAssignment', 'url'=>array('index', 'classId'=>$this->module->classId)),
	array('label'=>'Create TrAssignment', 'url'=>array('create', 'classId'=>$this->module->classId)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tr-assignment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tr Assignments</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
$dp = $model->search();
$dp->criteria->with = array('session'=>array('select'=>'class_id'));
$dp->criteria->addCondition('session.class_id = ' . $this->module->classId);
$dp->criteria->addCondition('t.status_record <> "D"');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tr-assignment-grid',
	'dataProvider'=>$dp,
	'filter'=>$model,
	'columns'=>array(
		'assignment_id',
		'session_id',
		'created_by',
		'created_date',
		'content',
		'file_id',
		/*
		'user_input',
		'input_date',
		'status_record',
		*/
		array(
			'class'=>'CButtonColumn',
			'buttons'=>array(
				'view'=>array(
					'url'=>'CHtml::normalizeUrl(array("view", "id"=>$data->assignment_id, "classId"=>Yii::app()->controller->module->classId))'
				),
				'update'=>array(
					'url'=>'CHtml::normalizeUrl(array("update", "id"=>$data->assignment_id, "classId"=>Yii::app()->controller->module->classId))'
				),
				'delete'=>array(
					'url'=>'CHtml::normalizeUrl(array("delete", "id"=>$data->assignment_id, "classId"=>Yii::app()->controller->module->classId))'
				),
			),
		),
	),
)); ?>

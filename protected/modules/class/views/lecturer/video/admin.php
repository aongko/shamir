<?php
/* @var $this TrVideoController */
/* @var $model TrVideo */

$this->breadcrumbs=array(
	'Tr Videos'=>array('index', 'classId'=>$this->module->classId),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TrVideo', 'url'=>array('index', 'classId'=>$this->module->classId)),
	array('label'=>'Create TrVideo', 'url'=>array('create', 'classId'=>$this->module->classId)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tr-video-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tr Videos</h1>

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
$dp->criteria->join = 'JOIN ms_session s ON s.session_id = t.session_id';
$dp->criteria->addCondition('s.status_record <> "D" AND s.class_id = ' . $this->module->classId);
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tr-video-grid',
	'dataProvider'=>$dp,
	'filter'=>$model,
	'columns'=>array(
		'video_id',
		'video_name',
		'video_url',
		'added_by',
		'added_date',
		/*
		'user_input',
		'input_date',
		'status_record',
		'session_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

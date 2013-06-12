<?php
/* @var $this SessionController */
/* @var $model MsSession */

$this->breadcrumbs=array(
	'Ms Sessions'=>array('index', 'classId'=>$this->module->classId),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MsSession', 'url'=>array('index', 'classId'=>$this->module->classId)),
	array('label'=>'Create MsSession', 'url'=>array('create', 'classId'=>$this->module->classId)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ms-session-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ms Sessions</h1>

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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ms-session-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'session_id',
		'class_id',
		'session_name',
		'session_number',
		'front_image',
		'description',
		/*
		'content',
		'date_start',
		'date_end',
		'user_input',
		'input_date',
		'status_record',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php
/* @var $this TrPostController */
/* @var $model TrPost */

$this->breadcrumbs=array(
	'Tr Posts'=>array('index'),
	$model->post_id,
);

$this->menu=array(
	array('label'=>'List TrPost', 'url'=>array('index')),
	array('label'=>'Create TrPost', 'url'=>array('create')),
	array('label'=>'Update TrPost', 'url'=>array('update', 'id'=>$model->post_id)),
	array('label'=>'Delete TrPost', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->post_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TrPost', 'url'=>array('admin')),
);
?>

<h1>View TrPost #<?php echo $model->post_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'post_id',
		'account_id',
		'created_date',
		'content',
		'user_input',
		'input_date',
		'status_record',
		'discussion_id',
		'class_id',
	),
)); ?>

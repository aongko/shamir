<?php
/* @var $this TrPostController */
/* @var $model TrPost */

$this->breadcrumbs=array(
	'Tr Posts'=>array('index'),
	$model->post_id=>array('view','id'=>$model->post_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TrPost', 'url'=>array('index')),
	array('label'=>'Create TrPost', 'url'=>array('create')),
	array('label'=>'View TrPost', 'url'=>array('view', 'id'=>$model->post_id)),
	array('label'=>'Manage TrPost', 'url'=>array('admin')),
);
?>

<h1>Update TrPost <?php echo $model->post_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
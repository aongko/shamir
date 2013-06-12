<?php
/* @var $this TrPostController */
/* @var $model TrPost */

$this->breadcrumbs=array(
	'Tr Posts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TrPost', 'url'=>array('index')),
	array('label'=>'Manage TrPost', 'url'=>array('admin')),
);
?>

<h1>Create TrPost</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
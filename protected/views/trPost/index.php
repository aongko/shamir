<?php
/* @var $this TrPostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tr Posts',
);

$this->menu=array(
	array('label'=>'Create TrPost', 'url'=>array('create')),
	array('label'=>'Manage TrPost', 'url'=>array('admin')),
);
?>

<h1>Tr Posts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

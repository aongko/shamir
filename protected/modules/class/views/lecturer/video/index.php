<?php
/* @var $this TrVideoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tr Videos',
);

$this->menu=array(
	array('label'=>'Create TrVideo', 'url'=>array('create', 'classId'=>$this->module->classId)),
	array('label'=>'Manage TrVideo', 'url'=>array('admin', 'classId'=>$this->module->classId)),
);
?>

<h1>Tr Videos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

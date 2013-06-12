<?php
/* @var $this SessionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ms Sessions',
);

$this->menu=array(
	array('label'=>'Create MsSession', 'url'=>array('create', 'classId'=>$this->module->classId)),
	array('label'=>'Manage MsSession', 'url'=>array('admin', 'classId'=>$this->module->classId)),
);
?>

<h1>Ms Sessions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

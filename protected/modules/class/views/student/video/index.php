<?php
/* @var $this TrVideoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Videos',
);
?>

<h1>Tr Videos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

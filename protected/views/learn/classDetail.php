<?php
$this->pageTitle=Yii::app()->name . ' - ' . $model->class_name;
$this->breadcrumbs=array(
	$model->class_name
);
?>

<?php
echo 'class_name : ' . $model->class_name . '</br>';
echo 'max_capacity : ' . $model->max_capacity . '</br>';
echo 'description : ' . $model->description . '</br>';
echo CHtml::link('Join this class', Yii::app()->createUrl('learn/joinClass', array('classId'=>$model->class_id)) );
?>

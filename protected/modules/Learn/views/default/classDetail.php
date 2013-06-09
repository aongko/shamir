<?php
$this->pageTitle=Yii::app()->name . ' - ' . $this->module->id;
$this->breadcrumbs=array(
	$this->module->id, $model->class_name
);
?>

<?php
echo 'class_name : ' . $model->class_name . '</br>';
echo 'max_capacity : ' . $model->max_capacity . '</br>';
echo 'description : ' . $model->description . '</br>';
?>
<a href='#'>Join this class (TODO)</a>

<?php
/* @var $this DefaultController */

$this->pageTitle=Yii::app()->name . ' - My Profile';
$this->breadcrumbs=array(
	'My Profile',
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<?php
echo '<h1> ' . $model->first_name . ' ' . $model->middle_name . ' ' . $model->last_name . '</h1>';
foreach($model->getAttributes() as $key=>$value) {
	echo $key . ': ' . $value . '<br/>';
}
?>

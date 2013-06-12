<?php
/* @var $this TrVideoController */
/* @var $model TrVideo */

$this->breadcrumbs=array(
	'Tr Videos'=>array('index', 'classId'=>$this->module->classId),
	$model->video_id=>array('view','id'=>$model->video_id, 'classId'=>$this->module->classId),
	'Update',
);

$this->menu=array(
	array('label'=>'List TrVideo', 'url'=>array('index', 'classId'=>$this->module->classId)),
	array('label'=>'Create TrVideo', 'url'=>array('create', 'classId'=>$this->module->classId)),
	array('label'=>'View TrVideo', 'url'=>array('view', 'id'=>$model->video_id, 'classId'=>$this->module->classId)),
	array('label'=>'Manage TrVideo', 'url'=>array('admin', 'classId'=>$this->module->classId)),
);
?>

<h1>Update TrVideo <?php echo $model->video_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

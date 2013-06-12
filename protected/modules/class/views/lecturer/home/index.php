<?php
/* @var $this AddPostFormController */
/* @var $model AddPostForm */
/* @var $form CActiveForm */
?>

<h1>Manage Home</h1>
<div class="form">

<?php
$this->renderPartial('addPost', array('model'=>$model1));
?>

</div><!-- form -->

<hr>

<?php
/* @var $this TrPostController */
/* @var $model TrPost */

?>

<h1>Manage Tr Posts</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<?php 
$dp = $model2->search();
$dp->criteria->addCondition('discussion_id IS NULL');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tr-post-grid',
	'dataProvider'=>$dp,
	'filter'=>$model2,
	'columns'=>array(
		'post_id',
		'account_id',
		'class_id',
		'created_date',
		array('header'=>'Content', 'name'=>'content', 'value'=>'substr($data->content, 0, 50)'),
		
		'user_input',
		'input_date',
		'status_record',
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
			'buttons'=>array(
				'view'=>array(
					'url'=>'Yii::app()->createUrl("class/lecturer/home/view",array("id"=>$data->post_id, "classId"=>Yii::app()->controller->module->classId))'
				),
				'update'=>array(
					'url'=>'Yii::app()->createUrl("class/lecturer/home/update",array("id"=>$data->post_id, "classId"=>Yii::app()->controller->module->classId))'
				),
			),
		),
	),
)); ?>

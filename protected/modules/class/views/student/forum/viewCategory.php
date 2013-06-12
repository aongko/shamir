<h1>Forum</h1>

<h3>Sub Categories</h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sub-category-grid',
	'dataProvider'=>$subCategoryCriteria->search(),
	'emptyText'=>'No sub categories',
	'template'=>'{items}{pager}',
	'columns'=>array(
		array(
			'header'=>'No',
			'value'=>'$row + 1',
		),
		array(
			'class'=>'CLinkColumn',
			'header'=>'Discussion Category Name',
			'urlExpression'=>'CHtml::normalizeUrl(array("viewCategory", "discussionCategoryId"=>"$data->discussion_category_id", "classId"=>Yii::app()->controller->module->classId))',
			'labelExpression'=>'$data->discussion_category_name',
		),
	),
));
?>


<h3>Discussions</h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'discussions-grid',
	'dataProvider'=>$discussionCriteria->search(),
	'emptyText'=>'No discussions',
	'template'=>'{items}{pager}',
	'columns'=>array(
		array(
			'header'=>'No',
			'value'=>'$row + 1',
		),
		array(
			'class'=>'CLinkColumn',
			'header'=>'Discussion Name',
			'urlExpression'=>'CHtml::normalizeUrl(array("viewDiscussion", "discussionId"=>"$data->discussion_id", "classId"=>Yii::app()->controller->module->classId))',
			'labelExpression'=>'$data->discussion_title',
		),
		array(
			'class'=>'CDataColumn',
			'header'=>'Created by',
			'value'=>'$data->createdBy->user_name'
		),
	),
));

?>

<?php
$this->renderPartial('addDiscussion', array('model'=>$addDiscussionModel));
?>

<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1>Home</h1>

<?php

$dp = $model->search();
$dp->pagination->pageSize = 30;
$dp->criteria->order = 'created_date DESC';
$dp->criteria->addCondition('discussion_id is NULL');
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dp,
    'itemView'=>'_post',   // refers to the partial view named '_post'
    /*
    'sortableAttributes'=>array(
        'created_date'=>'Post Time',
    ),
    */
    'separator'=>'<hr>',
    'summaryText'=>'',
));
?>

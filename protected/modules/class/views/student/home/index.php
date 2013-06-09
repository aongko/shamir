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
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dp,
    'itemView'=>'_post',   // refers to the partial view named '_post'
    'sortableAttributes'=>array(
        'created_date'=>'Post Time',
    ),
    'separator'=>'<hr>',
    'summaryText'=>'',
));
?>

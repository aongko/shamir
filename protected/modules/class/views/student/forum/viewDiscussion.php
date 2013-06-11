<h1><?php echo $discussion->discussion_title?></h1>

<?php

$dp = $postCriteria->search();
$dp->pagination->pageSize = 20;
$dp->criteria->order = 'created_date ASC';
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dp,
    'itemView'=>'_post',   // refers to the partial view named '_post'
    'separator'=>'<hr>',
    'template'=>'{items}{pager}',
));
?>

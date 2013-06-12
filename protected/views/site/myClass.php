<?php

$this->pageTitle=Yii::app()->name . ' - My Class';
$this->breadcrumbs=array(
	'My Class',
);

?>
<h1>My Class</h1>
<?php

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$joined->with('class')->search(),
	'itemView'=>'_myClass',
	'emptyText'=>'No class joined',
));

?>

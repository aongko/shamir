<h1>Assignment Detail</h1>

<?php
	echo $model->content . '<br>';
	echo $model->created_date;
	$this->renderPartial('submitAssignment', array('model'=>$model2));
?>

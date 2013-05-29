<?php
/* @var $this DefaultController */

$this->pageTitle=Yii::app()->name . ' - ' . $this->module->id;
$this->breadcrumbs=array(
	$this->module->id,
);

?>
<h1>Learn</h1>

<table>
	<tr>
		<td>
			<?php
				foreach ($classCategoryList as $data) {
					echo $data->class_category_name . '<br>';
				}
			?>
		</td>
		<td>
			<div>
				<?php
				$this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$model->search(),
					'itemView'=>'_class',   // refers to the partial view named '_post'
					'sortableAttributes'=>array(
						'class_name' => 'Name',
					),
				));
				?>
			</div>
		</td>
	</tr>
</table>

<?php
/* @var $this DefaultController */

$this->pageTitle=Yii::app()->name . ' - learn';
$this->breadcrumbs=array(
	'Learn',
);

?>
<h1>Learn</h1>

<table>
	<tr>
		<td style="vertical-align: top;">
			<div>
			<?php
				foreach ($classCategoryList as $data) {
					echo '<a href=\'' . CHtml::normalizeUrl(array('/' . Yii::app()->controller->getId() .'/' . Yii::app()->controller->action->getId() , 'classCategoryId'=>$data->class_category_id)) . '\'>' . $data->class_category_name . '<br>';
				}
			?>
			</div>
		</td>
		<td>
			<div>
				<table>
				<?php
				
				$this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$model->search(),
					'itemView'=>'_class',
					'sortableAttributes'=>array(
						'class_name' => 'Name',
					),
				));
				
				?>
				</table>
			</div>
		</td>
	</tr>
</table>

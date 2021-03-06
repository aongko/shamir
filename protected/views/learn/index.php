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
		<td style="vertical-align: top; border-right: 1px solid #000; width: 200px; padding: 5px;">
			<div>
				<h4 style="border-bottom: 1px solid #000">Choose Category:</h4>
			<?php
				foreach ($classCategoryList as $data) {
					echo '<a href=\'' . CHtml::normalizeUrl(array('/' . Yii::app()->controller->getId() .'/' . Yii::app()->controller->action->getId() , 'classCategoryId'=>$data->class_category_id)) . '\'>' . $data->class_category_name . '<br>';
				}
			?>
			</div>
		</td>
		<td style="padding: 5px;">
			<div>
				<table style="width: 700px;" class="withborder">
					<col width="125px" />
					<col width="125px" />
					<col width="350px" />
					<col width="100px" />
					<tr>
						<th>Class Name</th>
						<th>Max Capacity</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				<?php
				
				$this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$model->search(),
					'itemView'=>'_class',
					'sortableAttributes'=>array(
						'class_name' => 'Name',
					),
					'summaryText' => '',
				));
				
				?>
				</table>
			</div>
		</td>
	</tr>
</table>

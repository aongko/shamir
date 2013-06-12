<?php
/* @var $this DefaultController */

$this->pageTitle=Yii::app()->name . ' - My Profile';
$this->breadcrumbs=array(
	'My Profile',
);
?>

<?php
echo '<h1> ' . $model->first_name . ' ' . $model->middle_name . ' ' . $model->last_name . '</h1>';
?>
<table width = 100%>
	<tr>
		<td width=250px ><?php echo CHtml::image(Yii::app()->createUrl('/images/noprof.jpg'), '', array('width'=>250)); ?></td>
		<td>
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					'date_of_birth:date',
					'phone1',
					'phone2',
					'address',
					'email1',
					'email2',
					'motto',
				),
			)); ?>

		</td>
	</tr>
</table>

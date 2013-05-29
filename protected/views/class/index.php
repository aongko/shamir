<?php
/* @var $this ClassController */

$this->breadcrumbs=array(
	'Class',
);
?>
<h1><?php echo $this->id ?></h1>

<p>
	<table>
		<tr>
			<td>
				<?php
					$this->widget('CTreeView',array(
							'data'=>$kelasTree,
							'animated'=>'fast', //quick animation
							'collapsed'=>'false',//remember must giving quote for boolean value in here
							'htmlOptions'=>array(
									'class'=>'treeview-famfamfam',//there are some classes that ready to use
							),
					));
					/*
					foreach($kelas as $value) {
						echo '<a href=' . CHtml::normalizeUrl(array(Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId())) . '/' . $value['IDkelas'] . '/>' . $value['namaKelas'] . '</a></br>';
						if (count($value['materi']) > 0) {
							echo '<ul>';
							foreach($value['materi'] as $zz) {
								echo '<li>' . $zz. '</li>';
							}
							echo '</ul>';
						}
					}
					*/
				?>
			</td>
			<td><?php //$this->renderPartial(); ?></td>
		</tr>
	</table>
</p>

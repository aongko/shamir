<?php
/* @var $this AddAssignmentFormController */
/* @var $model AddAssignmentForm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'add-assignment-form-addAssignment-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date_start'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'date_start',
				'options'=> array(
					'dateFormat'=>'yy-mm-dd',
					'changeYear'=>true,
					'changeMonth'=>true,
					'minDate'=>'1990-01-01',
				),
			));
		?>
		<?php echo $form->error($model,'date_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_end'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'date_end',
				'options'=> array(
					'dateFormat'=>'yy-mm-dd',
					'changeYear'=>true,
					'changeMonth'=>true,
					'minDate'=>'1990-01-01',
				),
			));
		?>
		<?php echo $form->error($model,'date_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textField($model,'content'); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'doc'); ?>
		<?php echo $form->fileField($model,'doc'); ?>
		<?php echo $form->error($model,'doc'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

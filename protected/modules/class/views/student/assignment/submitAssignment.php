<?php
/* @var $this SubmitAssignmentFormController */
/* @var $model SubmitAssignmentForm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'submit-assignment-form-submitAssignment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content'); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

		<?php echo $form->hiddenField($model,'assignment_id'); ?>

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

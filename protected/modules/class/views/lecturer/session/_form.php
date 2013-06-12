<?php
/* @var $this SessionController */
/* @var $model MsSession */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ms-session-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo CHtml::activeHiddenField($model, 'class_id');?>

	<div class="row">
		<?php echo $form->labelEx($model,'session_name'); ?>
		<?php echo $form->textField($model,'session_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'session_name'); ?>
	</div>

	<?php echo CHtml::activeHiddenField($model, 'session_number');?>
	<?php echo CHtml::activeHiddenField($model, 'front_image');?>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('size'=>60,'maxlength'=>10000)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_start'); ?>
		<?php echo $form->textField($model,'date_start'); ?>
		<?php echo $form->error($model,'date_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_end'); ?>
		<?php echo $form->textField($model,'date_end'); ?>
		<?php echo $form->error($model,'date_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_input'); ?>
		<?php echo $form->textField($model,'user_input',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'user_input'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'input_date'); ?>
		<?php echo $form->textField($model,'input_date'); ?>
		<?php echo $form->error($model,'input_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_record'); ?>
		<?php echo $form->textField($model,'status_record',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'status_record'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

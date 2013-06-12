<?php
/* @var $this TrVideoController */
/* @var $model TrVideo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tr-video-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'video_name'); ?>
		<?php echo $form->textField($model,'video_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'video_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video_url'); ?>
		<?php echo $form->textField($model,'video_url',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'video_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'added_by'); ?>
		<?php echo $form->textField($model,'added_by'); ?>
		<?php echo $form->error($model,'added_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'added_date'); ?>
		<?php echo $form->textField($model,'added_date'); ?>
		<?php echo $form->error($model,'added_date'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'session_id'); ?>
		<?php echo $form->textField($model,'session_id'); ?>
		<?php echo $form->error($model,'session_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
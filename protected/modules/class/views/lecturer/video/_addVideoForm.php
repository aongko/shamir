<?php
/* @var $this AddVideoFormController */
/* @var $model AddVideoForm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'add-video-form-_addVideoForm-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'video_name'); ?>
		<?php echo $form->textField($model,'video_name'); ?>
		<?php echo $form->error($model,'video_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video_url'); ?>
		<?php echo $form->textField($model,'video_url'); ?>
		<?php echo $form->error($model,'video_url'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
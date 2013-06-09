<?php
/* @var $this AddPostFormController */
/* @var $model AddPostForm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'add-post-form-index-form',
	'enableAjaxValidation'=>false,
)); ?>
	<h1>Manage Home</h1>
	<h3>Add new post</h3>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content'); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Post'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

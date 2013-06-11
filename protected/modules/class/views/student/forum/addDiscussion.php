<?php
/* @var $this AddDiscussionFormController */
/* @var $model AddDiscussionForm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'add-discussion-form-addDiscussion-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'discussion_title'); ?>
		<?php echo $form->textField($model,'discussion_title'); ?>
		<?php echo $form->error($model,'discussion_title'); ?>
	</div>

	<?php echo CHtml::activeHiddenField($model,'discussion_category_id'); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content'); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<?php echo CHtml::activeHiddenField($model,'discussion_id'); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

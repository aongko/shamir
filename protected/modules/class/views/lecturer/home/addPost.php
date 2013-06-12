<h3>Add new post</h3>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'add-post-form-index-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content'); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>
	
	<?php echo CHtml::activeHiddenField($model, 'discussion_id')?>
	<?php echo CHtml::activeHiddenField($model, 'class_id')?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Post'); ?>
	</div>

<?php $this->endWidget(); ?>

<?php
/* @var $this SessionController */
/* @var $model MsSession */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'session_id'); ?>
		<?php echo $form->textField($model,'session_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'class_id'); ?>
		<?php echo $form->textField($model,'class_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'session_name'); ?>
		<?php echo $form->textField($model,'session_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'session_number'); ?>
		<?php echo $form->textField($model,'session_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'front_image'); ?>
		<?php echo $form->textField($model,'front_image',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'content'); ?>
		<?php echo $form->textField($model,'content',array('size'=>60,'maxlength'=>10000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_start'); ?>
		<?php echo $form->textField($model,'date_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_end'); ?>
		<?php echo $form->textField($model,'date_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_input'); ?>
		<?php echo $form->textField($model,'user_input',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'input_date'); ?>
		<?php echo $form->textField($model,'input_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_record'); ?>
		<?php echo $form->textField($model,'status_record',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
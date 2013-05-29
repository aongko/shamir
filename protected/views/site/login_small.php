<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'action'=>CHtml::normalizeUrl(array('/site/login')),
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<div id = "signin">Sign in</div>
	<span class="row login_small">
		<label class = "required">Username :</label>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?></br>
	</span>

	<span class="row login_small">
		<label class = "required">Password : </label>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?></br>
	</span>

	<span class="row rememberMe login_small">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</span>

	<span class="row buttons login_small">
		<?php echo CHtml::submitButton('Login'); ?>
	</span>

<?php $this->endWidget(); ?>
</div><!-- form -->

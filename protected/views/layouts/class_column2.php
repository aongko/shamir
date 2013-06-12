<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=> (empty($this->menuTitle) ? '' : $this->menuTitle . ' ') . 'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	<?php
		if (!empty($this->menuStudentOperation)) {
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>MsClass::model()->findByPk($this->module->classId)->class_name,
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menuStudentOperation,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		}
		
		if (!empty($this->menuLecturerOperation)) {
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Lecturer Tools',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menuLecturerOperation,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		}
	?>
	
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>

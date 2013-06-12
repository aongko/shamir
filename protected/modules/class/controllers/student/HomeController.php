<?php

class HomeController extends ClassController
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'expression'=>'$user->hasAdminType() || $user->hasLecturerType(Yii::app()->controller->module->classId) || $user->joinedClass(Yii::app()->controller->module->classId)',
			),
			array('deny'),
		);
	}
	public function actionIndex()
	{
		$model = new TrPost('search');
		$model->class_id = $this->module->classId;
		$model->status_record = 'A';
		$this->render('index', array('model'=>$model));
	}
}

<?php

class VideoController extends ClassController
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
		$dataProvider=new CActiveDataProvider('TrVideo');
		$dataProvider->criteria->join = 'JOIN ms_session s ON s.session_id = t.session_id';
		$dataProvider->criteria->addCondition('t.status_record <> "D" AND s.status_record <> "D" AND s.class_id = ' . $this->module->classId);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionView($id) {
		$id = CHtml::encode($id);
		$video = TrVideo::model()->findByPk($id, 'status_record <> "D"');
		if (empty($video)) throw new CHttpException(404, 'Page not found');
		$this->render('view', array('video'=>$video));
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}

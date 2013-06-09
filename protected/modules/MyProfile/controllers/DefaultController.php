<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$model = MasterProfile::model()->findByAttributes(array('profile_id'=>Yii::app()->user->getState('accountId')));
		if (empty($model)) throw new CHttpException(404,'Your profile page could not be found.');
		
		$this->module->setId('My Profile');
		$this->render('index', array('model'=>$model));
	}
}

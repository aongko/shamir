<?php

class LearnController extends Controller
{
	public function actionIndex($classCategoryId=1)
	{
		$model = new MsClass;
		$model->unsetAttributes();
		$model->class_category_id = $classCategoryId;
		$classCategoryList = LtClassCategory::model()->findAll("status_record <> 'D'");
		$this->render('index', array('model'=>$model, 'classCategoryList'=>$classCategoryList));
	}
	
	public function actionClassDetail($classId=1) {
		$model = MsClass::model()->findByPk($classId, "status_record <> 'D'");
		if (empty($model)) throw new CHttpException(403,'Your request is invalid. The specified class cannot be found.');
		$this->render('classDetail', array('model'=>$model));
	}
	
	public function actionJoinClass($classId=0) {
		if (Yii::app()->user->isGuest) $this->redirect(CHtml::normalizeUrl(array('/site/login')));
		$class = MsClass::model()->findByPk($classId, "status_record <> 'D'");
		if (empty($class)) throw new CHttpException(403,'Your request is invalid. The specified class cannot be found.');
		//$joined = TrClass::model()->findBySql("SELECT *z FROM tr_class WHERE class_id='%:class_id%' AND account_id= '%:account_id%'", array(':class_id'=>$classId, ':account_id'=>Yii::app()->user->getState('accountId')));
		$joined = TrClass::model()->findByPk(array('class_id'=>$classId, 'account_id'=>Yii::app()->user->getState('accountId')),  "status_record <> 'D'");
		if (!empty($joined)) throw new CHttpException(403, 'Your request is invalid. You have already joined this class.');
		$model = new TrClass;
		$model->class_id = $classId;
		$model->account_id = Yii::app()->user->getState('accountId');
		$model->user_input = Yii::app()->user->name;
		$model->input_date = new CDbExpression('NOW()');
		$model->status_record = 'A';
		$model->save();
		$this->render('successJoin');
		
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

<?php

class LearnController extends Controller
{
	public function actionIndex($classCategoryId=1)
	{
		$model = new MasterClass;
		$model->unsetAttributes();
		$model->class_category_id = $classCategoryId;
		$classCategoryList = MasterClassCategory::model()->findAll();
		$this->render('index', array('model'=>$model, 'classCategoryList'=>$classCategoryList));
	}
	
	public function actionClassDetail($classId=1) {
		$model = MasterClass::model()->findByPk($classId);
		if (empty($model)) throw new CHttpException(404,'The specified class cannot be found.');
		$this->render('classDetail', array('model'=>$model));
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

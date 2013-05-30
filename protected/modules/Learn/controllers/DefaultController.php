<?php

class DefaultController extends Controller
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
}

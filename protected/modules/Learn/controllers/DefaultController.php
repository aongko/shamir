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
}

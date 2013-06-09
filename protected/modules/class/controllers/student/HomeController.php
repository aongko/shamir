<?php

class HomeController extends ClassController
{
	public function actionIndex()
	{
		$model = new TrPost('search');
		$model->class_id = $this->module->classId;
		$model->status_record = 'A';
		$this->render('index', array('model'=>$model));
	}
}

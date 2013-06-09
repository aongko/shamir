<?php

class HomeController extends ClassController
{
	public function actionIndex()
	{
		echo $this->module->classId;
		$this->render('index');
	}
}

<?php

class HomeController extends ClassController
{
	public function actionIndex()
	{
		echo $this->module->classID;
		$this->render('index');
	}
}

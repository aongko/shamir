<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->module->setId('My Class');
		$this->render('index');
	}
}
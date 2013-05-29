<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->module->setId('My Profile');
		$this->render('index');
	}
}
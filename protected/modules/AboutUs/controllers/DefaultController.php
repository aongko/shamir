<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->module->setId('About Us');
		$this->render('index');
	}
}
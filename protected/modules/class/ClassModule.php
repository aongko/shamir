<?php

class ClassModule extends CWebModule
{
	public $classId;
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'class.models.*',
			'class.components.*',
		));
		if (empty($_GET['classId'])) {
			throw new CHttpException('403', 'Your request is invalid');
		}
		$this->classId = $_GET['classId'];
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}

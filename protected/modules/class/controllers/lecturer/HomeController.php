<?php

class HomeController extends ClassController
{
	public function actionIndex()
	{
		$model=new AddPostForm;

		// uncomment the following code to enable ajax-based validation
		/*
		if(isset($_POST['ajax']) && $_POST['ajax']==='add-post-form-index-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		*/

		if(isset($_POST['AddPostForm']))
		{
			$model->attributes=$_POST['AddPostForm'];
			if($model->validate())
			{
				// form inputs are valid, do something here
				return;
			}
		}
		$this->render('index',array('model'=>$model));
	}
}

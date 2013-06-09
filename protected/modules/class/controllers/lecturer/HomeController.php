<?php

class HomeController extends ClassController
{
	/*
	public function filters() {
		return array('accessControl');
	}
	
	public function accessRules() {
		return array(
			array(
				'allow',
				'users'=>array('DeimonDB'),
			),
			array(
				'deny',
			)
		);
	}
	*/
	public function actionIndex()
	{
		$model1=new AddPostForm;
		if(isset($_POST['AddPostForm']))
		{
			$model1->attributes=$_POST['AddPostForm'];
			if($model1->validate())
			{
				$post = new TrPost;
				$post->account_id = Yii::app()->user->getState('accountId');
				$post->created_date = new CDbExpression('NOW()');
				$post->content = $model1->content;
				$post->discussion_id = null;
				$post->class_id = $this->module->classId;
				
				$post->user_input = Yii::app()->user->name;
				$post->input_date = new CDbExpression('NOW()');
				$post->status_record = 'A';
				if ($post->save()) {
					$this->redirect(array('view','id'=>$post->post_id, 'classId'=>$this->module->classId));
				}
			}
		}
		
		$model2=new TrPost('search');
		$model2->unsetAttributes();  // clear any default values
		if(isset($_GET['TrPost']))
			$model2->attributes=$_GET['TrPost'];
		$model2->class_id = $this->module->classId;
		$this->render('index',array('model1'=>$model1, 'model2'=>$model2));
	}
	
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function loadModel($id)
	{
		$model=TrPost::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		if(isset($_POST['TrPost']))
		{
			$model->attributes=$_POST['TrPost'];
			$model->user_input = Yii::app()->user->name;
			$model->input_date = new CDbExpression('NOW()');
			if($model->save())
				$this->redirect(array('view','id'=>$model->post_id, 'classId'=>$this->module->classId));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
}

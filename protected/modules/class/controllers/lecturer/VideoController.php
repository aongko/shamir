<?php

class VideoController extends ClassController
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'expression'=>'$user->hasAdminType() || $user->hasLecturerType(Yii::app()->controller->module->classId)',
			),
			array('deny'),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new AddVideoForm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AddVideoForm']))
		{
			$model->attributes=$_POST['AddVideoForm'];
			if($model->validate()) {
				$video = new TrVideo;
				$session = new MsSession;
				$transaction = $session->dbConnection->beginTransaction();
				try {
					$session->class_id = $this->module->classId;
					$session->session_name = 'Video of classId' . $this->module->classId;
					$session->session_number = 0;
					$session->description = 'Video of classId' . $this->module->classId;
					$session->content = 'Video of classId' . $this->module->classId;
					$session->user_input = Yii::app()->user->name;
					$session->input_date = new CDbExpression('NOW()');
					$session->status_record = 'A';
					if (!$session->save()) {
						throw new Exception ($session->getErrors());
					}
					
					$video->video_name = $model->video_name;
					$video->video_url = $model->video_url;
					$video->added_by = Yii::app()->user->accountId;
					$video->added_date = new CDbExpression('NOW()');
					$video->session_id = $session->session_id;
					$video->user_input = Yii::app()->user->name;
					$video->input_date = new CDbExpression('NOW()');
					$video->status_record = 'A';
					if (!$video->save()) {
						throw new Exception ($video->getErrors());
					}
					$transaction->commit();
				}
				catch (Exception $e) {
					$transaction->rollback();
					echo $e;
					die();
				}
				$this->redirect(array('view','id'=>$video->video_id, 'classId'=>$this->module->classId));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TrVideo']))
		{
			$model->attributes=$_POST['TrVideo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->video_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$zz = $this->loadModel($id);
		$zz->status_record = 'D';
		$zz->save();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin', 'classId'=>$this->module->classId));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TrVideo');
		$dataProvider->criteria->join = 'JOIN ms_session s ON s.session_id = t.session_id';
		$dataProvider->criteria->addCondition('t.status_record <> "D" AND s.status_record <> "D" AND s.class_id = ' . $this->module->classId);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TrVideo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TrVideo']))
			$model->attributes=$_GET['TrVideo'];
		$model->status_record = '<> D';
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TrVideo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TrVideo::model()->findByPk($id, 'status_record <> "D"');
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TrVideo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tr-video-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php

class AssignmentController extends ClassController
{

	/**
	 * @return array action filters
	 */
	 /*
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	*/
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
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
		$model=new AddAssignmentForm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AddAssignmentForm']))
		{
			$model->attributes=$_POST['AddAssignmentForm'];
			$model->doc = CUploadedFile::getInstance($model, 'doc');
			if ($model->validate()) {
				$assignment = new TrAssignment;
				$session = new MsSession;
				$files = new TrFiles;
				$transaction = $assignment->dbConnection->beginTransaction();
				try {
					$session->class_id = $this->module->classId;
					$session->session_name = 'Assignment of classId' . $this->module->classId;
					$session->session_number = 0;
					$session->description = 'Assignment of classId' . $this->module->classId;
					$session->content = 'Assignment of classId' . $this->module->classId;
					$session->date_start = $model->date_start;
					$session->date_end = $model->date_end;
					$session->user_input = Yii::app()->user->name;
					$session->input_date = new CDbExpression('NOW()');
					$session->status_record = 'A';
					
					if (!$session->save()) throw new Exception('Fail saving session!');
					
					$files->file_name = $model->doc->name;
					$files->file_src = 'protected/files/assignment';
					$files->added_by = Yii::app()->user->accountId;
					$files->added_date = new CDbExpression('NOW()');
					
					$files->user_input = Yii::app()->user->name;
					$files->input_date = new CDbExpression('NOW()');
					$files->status_record = 'A';
					if (!$files->save()) throw new Exception('Fail saving files!');
					
					if (!$model->doc->saveAs($files->file_src . '/' . $files->file_id . '_' . $files->file_name, true)) throw new Exception('Fail save as!');
					$assignment->session_id = $session->session_id;
					$assignment->created_by = Yii::app()->user->accountId;
					$assignment->created_date = new CDbExpression('NOW()');
					$assignment->content = $model->content;
					$assignment->file_id = $files->file_id;
					
					$assignment->user_input = Yii::app()->user->name;
					$assignment->input_date = new CDbExpression('NOW()');
					$assignment->status_record = 'A';
					if (!$assignment->save()) throw new Exception('Fail saving assignment!');
					$transaction->commit();
					$this->redirect(array('view','id'=>$assignment->assignment_id, 'classId'=>$this->module->classId));
				}
				catch (Exception $e) {
					$transaction->rollback();
					echo $e;
					return;
				}
			}
			else {
				echo 'a';
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

		if(isset($_POST['TrAssignment']))
		{
			$model->attributes=$_POST['TrAssignment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->assignment_id));
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
		$model = $this->loadModel($id);
		$model->status_record = 'D';
		$model->save();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin', 'classId'=>$this->module->classId));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TrAssignment');
		$dataProvider->criteria->with = 'session';
		$dataProvider->criteria->addCondition('session.class_id = ' . $this->module->classId);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TrAssignment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TrAssignment']))
			$model->attributes=$_GET['TrAssignment'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TrAssignment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TrAssignment::model()->findByPk($id, 'status_record <> "D"');
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TrAssignment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tr-assignment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

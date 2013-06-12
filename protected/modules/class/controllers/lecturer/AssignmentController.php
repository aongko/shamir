<?php

class AssignmentController extends ClassController
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


	public function actionGetAssignmentDetailFile($assignmentDetailId) {
		$model = TrAssignmentDetail::model()->with('file')->findByPk($assignmentDetailId, 't.status_record <> "D"');
		if (empty($model)) throw new CHttpException ('404', 'File not found');
		$path = $model->file->file_src . '/' . $model->file->file_id . '_' . $model->file->file_name;
		if (!file_exists($path)) throw new CHttpException ('404', 'File not found');
		Yii::app()->request->sendFile($model->file->file_name, file_get_contents($model->file->file_src . '/' . $model->file->file_id . '_' . $model->file->file_name));
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TrAssignmentDetail');
		/*
		$dataProvider->criteria->with = array(
											'assignment'=>array(
												'select'=>false,
												'condition'=>'assignment.status_record <> "D"',
												'joinType'=>'INNER JOIN',
												'with'=>array(
													'session'=>array(
														'select'=>false,
														'condition'=>'','session.class_id = ' . $this->module->classId,
														'joinType' => 'INNER JOIN',
													),
												),
											),
										);
		*/
		$dataProvider->criteria->join = 'JOIN tr_assignment a ON a.assignment_id = t.assignment_id JOIN ms_session s ON s.session_id = a.session_id';
		$dataProvider->criteria->condition = 's.class_id = ' . $this->module->classId;
		$dataProvider->criteria->addCondition('t.status_record <> "D"');
		$dataProvider->criteria->addCondition('s.status_record <> "D"');
		$dataProvider->criteria->addCondition('a.status_record <> "D"');
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

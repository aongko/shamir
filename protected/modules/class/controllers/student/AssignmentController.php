<?php

class AssignmentController extends ClassController
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'expression'=>'$user->hasAdminType() || $user->hasLecturerType(Yii::app()->controller->module->classId) || $user->joinedClass(Yii::app()->controller->module->classId)',
			),
			array('deny'),
		);
	}
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('TrAssignment');
		$dataProvider->criteria->with = 'session';
		$dataProvider->criteria->condition = 't.status_record <> "D" AND session.class_id = ' . $this->module->classId;
		$this->render('index', array('dp'=>$dataProvider));
	}

	public function actionGetAssignmentFile($assignmentId) {
		$model = TrAssignment::model()->with('file')->findByPk($assignmentId, 't.status_record <> "D"');
		if (empty($model)) throw new CHttpException ('404', 'File not found');
		$path = $model->file->file_src . '/' . $model->file->file_id . '_' . $model->file->file_name;
		if (!file_exists($path)) throw new CHttpException ('404', 'File not found');
		Yii::app()->request->sendFile($model->file->file_name, file_get_contents($model->file->file_src . '/' . $model->file->file_id . '_' . $model->file->file_name));
	}
	
	public function hasSubmitted($assignmentId) {
		$cari = TrAssignmentDetail::model()->findByAttributes(array('assignment_id'=>$assignmentId, 'account_id'=>Yii::app()->user->accountId), 't.status_record <> "D"');
		return !empty($cari);
	}
	public function actionView($assignmentId) {
		$model = TrAssignment::model()->findByPk($assignmentId, 't.status_record <> "D"');
		if (empty($model)) throw new CHttpException('404', 'Assignment not found');
		$model2 = new SubmitAssignmentForm;
		if(isset($_POST['SubmitAssignmentForm']))
		{
			$model2->attributes=$_POST['SubmitAssignmentForm'];
			$model2->doc = CUploadedFile::getInstance($model2, 'doc');
			if($model2->validate())
			{
				$cari = TrAssignmentDetail::model()->with('file')->findByAttributes(array('assignment_id'=>$assignmentId, 'account_id'=>Yii::app()->user->accountId), 't.status_record <> "D"');
				if (!empty($cari)) {
					$transaction = $cari->dbConnection->beginTransaction();
					$file = new TrFiles;
					try {
						$cari->content = $model2->content;
						$cari->user_input = Yii::app()->user->name;
						$cari->input_date = new CDbExpression('NOW()');
						$cari->status_record = 'A';
						
						$path = $cari->file->file_src . '/' . $cari->file->file_id . '_' . $cari->file->file_name;
						if (file_exists($path))	unlink($path);
						
						$file = $cari->file;
						$file->file_name = $model2->doc->name;
						$file->added_by = Yii::app()->user->accountId;
						
						$file->user_input = Yii::app()->user->name;
						$file->input_date = new CDbExpression('NOW()');
						$file->status_record = 'A';
						if (!$file->save()) {
							print_r($file->getErrors());
							throw new Exception('save tr file fail!');
						}
						if (!$cari->save()) throw new Exception('save assignment detail fail!');
						$transaction->commit();
					}
					catch (Exception $e) {
						$transaction->rollback();
						echo $e;
						die();
					}
				}
				else {
					$cari = new TrAssignmentDetail;
					$doc = new TrFiles;
					$transaction = $doc->dbConnection->beginTransaction();
					try {
						$doc->file_name = $model2->doc->name;
						$doc->file_src = 'protected/files/assignment';
						$doc->added_by = Yii::app()->user->accountId;
						$doc->added_date = new CDbExpression('NOW()');
						$doc->user_input = Yii::app()->user->name;
						$doc->input_date = new CDbExpression('NOW()');
						$doc->status_record = 'A';
						if (!$doc->save()) {
							/*
							echo $doc->file_name . '<br>';
							echo $doc->file_src . '<br>';
							echo $doc->added_by . '<br>';
							echo $doc->user_input . '<br>';
							echo $doc->input_date . '<br>';
							echo $doc->status_record . '<br>';
							echo $doc->file_src . '/' . $doc->file_id . '_' . $doc->file_name;
							*/
							throw new Exception ('Error saving file!');
						}
						if (!$model2->doc->saveAs($doc->file_src . '/' . $doc->file_id . '_' . $doc->file_name, true)) throw new Exception('Fail save as!');
						$cari->assignment_id = $assignmentId;
						$cari->account_id = Yii::app()->user->accountId;
						$cari->content = $model2->content;
						$cari->file_id = $doc->file_id;
						$cari->user_input = Yii::app()->user->name;
						$cari->input_date = new CDbExpression('NOW()');
						$cari->status_record = 'A';
						if(!$cari->save()) throw new Exception ('Error saving assignment detail!');
						$transaction->commit();
					}
					catch (Exception $e) {
						$transaction->rollback();
						echo $e->getMessage();
						die();
					}
				}
				
				$this->redirect(array('index', 'classId'=>$this->module->classId));
				return;
			}
		}
		$model2->assignment_id = $assignmentId;
		$this->render('view', array('model'=>$model, 'model2'=>$model2));
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}

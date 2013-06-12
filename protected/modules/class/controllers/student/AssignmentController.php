<?php

class AssignmentController extends ClassController
{
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
		Yii::app()->request->sendFile($model->file->file_name, file_get_contents($model->file->file_src . '/' . $model->file->file_id . '_' . $model->file->file_name));
		
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
				
				$this->redirect(array('index', 'classId'=>$this->module->classId));
				return;
			}
		}
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

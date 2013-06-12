<?php

class ForumController extends ClassController
{
	public function actionIndex()
	{
		
		$classCategory = LtDiscussionCategory::model()->findByAttributes(array('class_id'=>$this->module->classId));
		/*
		$subCategoryCriteria = new LtDiscussionCategory('search');
		$subCategoryCriteria->unsetAttributes();
		$discussionCriteria = new TrDiscussion('search');
		$discussionCriteria->unsetAttributes();
		*/
		if (empty($classCategory)) {
			throw new CHttpException('404', 'Page not found.');
			/*
			$subCategoryCriteria->parent_id = 0;
			$discussionCriteria->discussion_category_id = 0;
			*/
		}
		else {
			$this->view($classCategory->discussion_category_id, null);
			/*
			$subCategoryCriteria->parent_id = $classCategory->discussion_category_id;
			$discussionCriteria->discussion_category_id = $classCategory->discussion_category_id;
			*/
		}
		//$this->render('index');
	}
	
	public function actionViewCategory($discussionCategoryId) {
		$this->view($discussionCategoryId, null);
	}
	public function actionViewDiscussion($discussionId) {
		$this->view(null, $discussionId);
	}
	
	public function view($discussionCategoryId, $discussionId) {
		if (!empty($discussionCategoryId)) {
			$subCategoryCriteria = new LtDiscussionCategory('search');
			$subCategoryCriteria->unsetAttributes();
			$discussionCriteria = new TrDiscussion('search');
			$discussionCriteria->unsetAttributes();
			
			$subCategoryCriteria->parent_id = $discussionCategoryId;
			$subCategoryCriteria->status_record = 'A';
			
			$discussionCriteria->discussion_category_id = $discussionCategoryId;
			$discussionCriteria->status_record = 'A';
			
			$addDiscussionModel = new AddDiscussionForm;
			$addDiscussionModel->discussion_category_id = $discussionCategoryId;
			
			if(isset($_POST['AddDiscussionForm']))
			{
				$addDiscussionModel->attributes=$_POST['AddDiscussionForm'];
				if($addDiscussionModel->validate())
				{
					$discussionModel = new TrDiscussion;
					$postModel = new TrPost;
					$transaction = $discussionModel->dbConnection->beginTransaction();
					try {
						$discussionModel->discussion_title = $addDiscussionModel->discussion_title;
						$discussionModel->discussion_category_id = $addDiscussionModel->discussion_category_id;
						$discussionModel->created_by = Yii::app()->user->getState('accountId');
						$discussionModel->created_date = new CDbExpression('NOW()');
						$discussionModel->user_input = Yii::app()->user->name;
						$discussionModel->input_date = new CDbExpression('NOW()');
						$discussionModel->status_record = 'A';
						if (!$discussionModel->save()) {
							echo $discussionModel->discussion_title . '<br>';
							echo $discussionModel->discussion_category_id . '<br>';
							echo $discussionModel->created_by . '<br>';
							echo $discussionModel->user_input . '<br>';
							echo $discussionModel->input_date . '<br>';
							echo $discussionModel->status_record . '<br>';
							throw new Exception('save to discussionModel fail!');
						}
						$postModel->account_id = Yii::app()->user->getState('accountId');
						$postModel->created_date = new CDbExpression('NOW()');
						$postModel->content = $addDiscussionModel->content;
						$postModel->user_input = Yii::app()->user->name;
						$postModel->input_date = new CDbExpression('NOW()');
						$postModel->status_record = 'A';
						$postModel->discussion_id = $discussionModel->discussion_id;
						if (!$postModel->save()) {
							throw new Exception ('save to postModel fail!');
						}
						$transaction->commit();
						$addDiscussionModel->unsetAttributes();
					}
					catch (Exception $e) {
						$transaction->rollback();
						echo $e;
					}
					$this->redirect(array('viewDiscussion', 'classId'=>$this->module->classId, 'discussionId'=>$discussionModel->discussion_id));
					return;
				}
			}
			$this->render('viewCategory', array(
					'subCategoryCriteria'=>$subCategoryCriteria,
					'discussionCriteria'=>$discussionCriteria,
					'addDiscussionModel'=>$addDiscussionModel,
				)
			);
		}
		else if (!empty($discussionId)) {
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
					$post->discussion_id = $discussionId;
					$post->class_id = $this->module->classId;
					
					$post->user_input = Yii::app()->user->name;
					$post->input_date = new CDbExpression('NOW()');
					$post->status_record = 'A';
					if ($post->save()) {
						$this->redirect(array('viewDiscussion','discussionId'=>$discussionId, 'classId'=>$this->module->classId));
					}
				}
			}
			$model1->discussion_id = $discussionId;
			$model1->class_id = $this->module->classId;
			
			$postCriteria = new TrPost('search');
			$postCriteria->unsetAttributes();
			
			$postCriteria->discussion_id = $discussionId;
			
			$discussion = TrDiscussion::model()->findByPk($discussionId, "status_record <> 'D'");
			$this->render('viewDiscussion', array(
												'postCriteria'=>$postCriteria,
												'discussion'=>$discussion,
												'model1'=>$model1,
											));
		}
		else {
			throw new CHttpException('404', 'Page not found');
		}
	}
	
	public function actionAddDiscussion() {
		
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

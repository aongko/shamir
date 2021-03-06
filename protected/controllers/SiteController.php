<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	public function actionRegister()
	{
		$model=new RegisterForm;
		$acc = new MsAccount;
		$prof = new MsProfile;
		// uncomment the following code to enable ajax-based validation
		/*
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form-register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		*/

		if(isset($_POST['RegisterForm']))
		{
			$model->attributes=$_POST['RegisterForm'];
			if($model->validate())
			{
				$transaction = $prof->dbConnection->beginTransaction();
				try {
					$prof->first_name = $model->first_name;
					$prof->middle_name = $model->middle_name;
					$prof->last_name = $model->last_name;
					$prof->date_of_birth = $model->date_of_birth;
					$prof->phone1 = $model->phone1;
					$prof->phone2 = $model->phone2;
					$prof->address = $model->address;
					$prof->email1 = $model->email1;
					$prof->email2 = $model->email2;
					$prof->motto = $model->motto;
					$prof->city_id = $model->city_id;
					$prof->user_input = 'Unregistered user';
					$prof->input_date = new CDbExpression('NOW()');
					$prof->status_record = 'A';
					if (!$prof->save()) throw new Exception('Error saving profile!');
					$acc->user_name = $model->user_name;
					$acc->password = sha1($model->password);
					$acc->user_type_id = 1;
					$acc->profile_id = $prof->profile_id;
					$acc->status_record = 'A';
					
					$acc->user_input = 'Unregistered user';
					$acc->input_date = new CDbExpression('NOW()');
					$acc->status_record = 'A';
					if (!$acc->save()) throw new Exception('Error saving account!');
					$transaction->commit();
				}
				catch (Exception $e) {
					$transaction->rollback();
					echo $e;
					die();
				}
				$this->redirect(CHtml::normalizeUrl(array('site/index')));
			}
		}
		$this->render('register',array('model'=>$model, 'acc'=>$acc, 'prof'=>$prof));
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8\r\n".
					"Subject: $subject";

				require_once "Mail.php";

				$host = "ssl://smtp.gmail.com";
				$port = "465";
				$username = "myaccount@gmail.com";
				$password = "password";

				$smtp = Mail::factory('smtp',
				    array ('host' => $host,
				        'port' => $port,
				        'auth' => true,
				        'username' => $username,
				        'password' => $password));
				$to = Yii::app()->params['adminEmail'];
				$mail = $smtp->send($to, $headers, $model->body);

				if (PEAR::isError($mail))
				    echo("<p>" . $mail->getMessage() . "</p>");
				else
				    //echo("<p>Message successfully sent!</p>");


				//mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if (!Yii::app()->user->isGuest) $this->redirect(Yii::app()->user->returnUrl);
		$model=new LoginForm;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				//$this->redirect(Yii::app()->user->returnUrl);
				$this->redirect(Yii::app()->request->urlReferrer);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		//$tmp = Yii::app()->user->returnUrl;
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->request->urlReferrer);
	}
	
	public function actionAboutUs()
	{
		//$this->module->setId('About Us');
		$this->render('aboutUs');
	}
	
	public function actionMyProfile()
	{
		if (Yii::app()->user->isGuest) throw new CHttpException(403, 'You are not allowed to perform this action');
		//$model = MsProfile::model()->findByAttributes(array('profile_id'=>Yii::app()->user->getState('accountId')));
		$acc = MsAccount::model()->findByPk(Yii::app()->user->getState('accountId'),  "status_record <> 'D'");
		if (empty($acc)) throw new CHttpException(404,'Your profile page could not be found.');
		$model = $acc->profile;
		if (empty($model)) throw new CHttpException(404,'Your profile page could not be found.');
		
		//$this->module->setId('My Profile');
		$this->render('myProfile', array('model'=>$model));
	}
	
	public function actionMyClass() {
		if (Yii::app()->user->isGuest) $this->redirect(CHtml::normalizeUrl(array('/site/login')));
		$joined = new TrClass;
		$joined->unsetAttributes();
		$joined->account_id = Yii::app()->user->getState('accountId');		
		$this->render('myClass', array('joined'=>$joined));
	}
}

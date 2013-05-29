<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dropdownmenu.css" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<?php if (Yii::app()->user->isGuest &&
				(Yii::app()->createUrl(Yii::app()->user->loginUrl[0])!=Yii::app()->request->getUrl())) {
		?>
		<div id="signin" style="float:right; padding:5px">
			<?php $this->renderPartial('application.views.site.login_small', array('model'=>(new LoginForm))); ?>
		</div>
		<?php } ?>
		<div id="cssmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Home', 'url'=>array('/site/index')),
					array('label'=>'Learn', 'url'=>array('/Learn'),
						'itemOptions'=>array('class'=>'has-sub'),
						'items'=>array(
							array('label'=>'Matematika', 'url'=>'#'),
							array('label'=>'Fisika', 'url'=>'#'),
							array('label'=>'Biologi', 'url'=>'#'),
						)
					),
					array('label'=>'My Class', 'url'=>array('/MyClass'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'My Profile', 'url'=>array('/MyProfile'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'About Us', 'url'=>array('/AboutUs')),
					array('label'=>'Contact Us', 'url'=>array('/ContactUs')),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Register', 'url'=>array('/site/register'), 'visible'=>Yii::app()->user->isGuest),
					
				),
			)); ?>
		</div><!-- mainmenu -->
	</div><!-- header -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>

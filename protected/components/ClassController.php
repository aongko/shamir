<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class ClassController extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/class_column2';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menuStudentOperation;
	public $menuLecturerOperation;
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	public function init() {
		parent::init();
		$this->menuStudentOperation=array(
			array('label'=>'Home', 'url'=>array('/class/student/home', 'classID'=>$this->module->classID)),
			array('label'=>'Video', 'url'=>array('/class/student/video', 'classID'=>$this->module->classID)),
			array('label'=>'Additional Material', 'url'=>array('/class/student/additionalMaterial', 'classID'=>$this->module->classID)),
			array('label'=>'Forum', 'url'=>array('/class/student/forum', 'classID'=>$this->module->classID)),
			array('label'=>'Assignment', 'url'=>array('/class/student/assignment', 'classID'=>$this->module->classID)),
		);
		
		$this->menuLecturerOperation=array(
			array('label'=>'Manage Home', 'url'=>array('/class/lecturer/home', 'classID'=>$this->module->classID)),
			array('label'=>'Manage Video', 'url'=>array('/class/lecturer/video', 'classID'=>$this->module->classID)),
			array('label'=>'Manage Additional Material', 'url'=>array('/class/lecturer/additionalMaterial', 'classID'=>$this->module->classID)),
			array('label'=>'Manage Forum', 'url'=>array('/class/lecturer/forum', 'classID'=>$this->module->classID)),
			array('label'=>'Manage Assignment', 'url'=>array('/class/lecturer/assignment', 'classID'=>$this->module->classID)),
		);
	}
}

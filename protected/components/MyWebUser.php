<?php
class MyWebUser extends CWebUser {
	public function hasAdminType() {
		if ($this->isGuest) return false;
		$model = MsAccount::model()->findByPk($this->accountId);
		return $model->user_type_id == 3;
	}
	public function hasLecturerType($classId) {
		if ($this->isGuest) return false;
		$model = MsAccount::model()->findByPk($this->accountId);
		$class = MsClass::model()->findByPk($classId, 't.lecturer_id = ' . $this->accountId);
		return $model->user_type_id == 3 || ($model->user_type_id == 2 && !empty($class));
	}
	
	public function joinedClass($classId) {
		if ($this->isGuest) return false;
		$model = TrClass::model()->findByPk(array('class_id'=>$classId, 'account_id'=>$this->accountId));
		return !empty($model);
	}
}
?>

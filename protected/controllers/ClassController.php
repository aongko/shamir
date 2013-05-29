<?php

class ClassController extends Controller
{
	public function actionIndex($id = null)
	{
		/*
		$kelas = Kelas::Model()->findAll();
		$kirim = array();
		foreach($kelas as $value) {
			$tmp = array();
			$tmp['namaKelas'] = $value->namaKelas;
			$tmp['IDkelas'] = $value->IDkelas;
			$tmp['materi'] = array();
			if ($value->IDkelas == $id) {
				array_push($tmp['materi'], 'a', 'b', 'c');
			}
			array_push($kirim, $tmp);
		}
		*/
		$nowUrl = CHtml::normalizeUrl(array(Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId()));
		$kelasTree = array();
		$kelas = Kelas::Model()->findAll();
		foreach($kelas as $value) {
			$tmp = array();
			$tmp['text'] = '<a href=' . $nowUrl . '/' . $value['IDkelas'] . '/>' . $value['namaKelas'] . '</a>';
			if ($value->IDkelas == $id) {
				$tmp['children'] = array();
				array_push($tmp['children'], array('text' => 'ini nanti bisa di-klik trus bakal buka materi yang bersangkutan di kanan'), array('text' => 'a'), array('text' => 'b'), array('text' => 'c'));
			}
			array_push($kelasTree, $tmp);
		}
		$this->render('index', array('kelasTree' => $kelasTree));
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

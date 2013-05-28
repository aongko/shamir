<?php

/**
 * This is the model class for table "tbl_isi_kelas".
 *
 * The followings are the available columns in table 'tbl_isi_kelas':
 * @property integer $IDisiKelas
 * @property integer $IDkelas
 * @property integer $IDmateri
 */
class IsiKelas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IsiKelas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_isi_kelas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IDkelas, IDmateri', 'required'),
			array('IDkelas, IDmateri', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDisiKelas, IDkelas, IDmateri', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDisiKelas' => 'Idisi Kelas',
			'IDkelas' => 'Idkelas',
			'IDmateri' => 'Idmateri',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('IDisiKelas',$this->IDisiKelas);
		$criteria->compare('IDkelas',$this->IDkelas);
		$criteria->compare('IDmateri',$this->IDmateri);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
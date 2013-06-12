<?php

/**
 * This is the model class for table "tr_files".
 *
 * The followings are the available columns in table 'tr_files':
 * @property integer $file_id
 * @property string $file_name
 * @property string $file_src
 * @property integer $added_by
 * @property string $added_date
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 *
 * The followings are the available model relations:
 * @property TrAssignment[] $trAssignments
 * @property TrAssignmentDetail[] $trAssignmentDetails
 * @property MsAccount $addedBy
 */
class TrFiles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrFiles the static model class
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
		return 'tr_files';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('file_name, file_src, added_by, added_date', 'required'),
			array('added_by', 'numerical', 'integerOnly'=>true),
			array('file_name, user_input', 'length', 'max'=>50),
			array('file_src', 'length', 'max'=>250),
			array('status_record', 'length', 'max'=>1),
			array('input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('file_id, file_name, file_src, added_by, added_date, user_input, input_date, status_record', 'safe', 'on'=>'search'),
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
			'trAssignments' => array(self::HAS_MANY, 'TrAssignment', 'file_id'),
			'trAssignmentDetails' => array(self::HAS_MANY, 'TrAssignmentDetail', 'file_id'),
			'addedBy' => array(self::BELONGS_TO, 'MsAccount', 'added_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'file_id' => 'File',
			'file_name' => 'File Name',
			'file_src' => 'File Src',
			'added_by' => 'Added By',
			'added_date' => 'Added Date',
			'user_input' => 'User Input',
			'input_date' => 'Input Date',
			'status_record' => 'Status Record',
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

		$criteria->compare('file_id',$this->file_id);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('file_src',$this->file_src,true);
		$criteria->compare('added_by',$this->added_by);
		$criteria->compare('added_date',$this->added_date,true);
		$criteria->compare('user_input',$this->user_input,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('t.status_record','<>D',true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
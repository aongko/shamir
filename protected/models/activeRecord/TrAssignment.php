<?php

/**
 * This is the model class for table "tr_assignment".
 *
 * The followings are the available columns in table 'tr_assignment':
 * @property integer $assignment_id
 * @property integer $session_id
 * @property integer $created_by
 * @property string $created_date
 * @property string $content
 * @property integer $file_id
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 *
 * The followings are the available model relations:
 * @property MsSession $session
 * @property MsAccount $createdBy
 * @property TrFiles $file
 * @property TrAssignmentDetail[] $trAssignmentDetails
 */
class TrAssignment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrAssignment the static model class
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
		return 'tr_assignment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('session_id, created_by, created_date, content', 'required'),
			array('session_id, created_by, file_id', 'numerical', 'integerOnly'=>true),
			array('content', 'length', 'max'=>10000),
			array('user_input', 'length', 'max'=>50),
			array('status_record', 'length', 'max'=>1),
			array('input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('assignment_id, session_id, created_by, created_date, content, file_id, user_input, input_date, status_record', 'safe', 'on'=>'search'),
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
			'session' => array(self::BELONGS_TO, 'MsSession', 'session_id'),
			'createdBy' => array(self::BELONGS_TO, 'MsAccount', 'created_by'),
			'file' => array(self::BELONGS_TO, 'TrFiles', 'file_id'),
			'trAssignmentDetails' => array(self::HAS_MANY, 'TrAssignmentDetail', 'assignment_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'assignment_id' => 'Assignment',
			'session_id' => 'Session',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
			'content' => 'Content',
			'file_id' => 'File',
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

		$criteria->compare('assignment_id',$this->assignment_id);
		$criteria->compare('session_id',$this->session_id);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('file_id',$this->file_id);
		$criteria->compare('user_input',$this->user_input,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('t.status_record','<>D',true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
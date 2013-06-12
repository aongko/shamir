<?php

/**
 * This is the model class for table "tr_assignment_detail".
 *
 * The followings are the available columns in table 'tr_assignment_detail':
 * @property integer $assignment_detail_id
 * @property integer $assignment_id
 * @property integer $account_id
 * @property string $content
 * @property integer $file_id
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 *
 * The followings are the available model relations:
 * @property TrAssignment $assignment
 * @property MsAccount $account
 * @property TrFiles $file
 */
class TrAssignmentDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrAssignmentDetail the static model class
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
		return 'tr_assignment_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('assignment_id, account_id', 'required'),
			array('assignment_id, account_id, file_id', 'numerical', 'integerOnly'=>true),
			array('content', 'length', 'max'=>10000),
			array('user_input', 'length', 'max'=>50),
			array('status_record', 'length', 'max'=>1),
			array('input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('assignment_detail_id, assignment_id, account_id, content, file_id, user_input, input_date, status_record', 'safe', 'on'=>'search'),
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
			'assignment' => array(self::BELONGS_TO, 'TrAssignment', 'assignment_id'),
			'account' => array(self::BELONGS_TO, 'MsAccount', 'account_id'),
			'file' => array(self::BELONGS_TO, 'TrFiles', 'file_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'assignment_detail_id' => 'Assignment Detail',
			'assignment_id' => 'Assignment',
			'account_id' => 'Account',
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

		$criteria->compare('assignment_detail_id',$this->assignment_detail_id);
		$criteria->compare('assignment_id',$this->assignment_id);
		$criteria->compare('account_id',$this->account_id);
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
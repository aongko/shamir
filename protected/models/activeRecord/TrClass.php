<?php

/**
 * This is the model class for table "tr_class".
 *
 * The followings are the available columns in table 'tr_class':
 * @property integer $class_id
 * @property integer $account_id
 * @property string $date_start
 * @property string $date_finish
 * @property string $last_accessed
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 *
 * The followings are the available model relations:
 * @property MsAccount $account
 */
class TrClass extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrClass the static model class
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
		return 'tr_class';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_id, account_id', 'required'),
			array('class_id, account_id', 'numerical', 'integerOnly'=>true),
			array('user_input', 'length', 'max'=>50),
			array('status_record', 'length', 'max'=>1),
			array('date_start, date_finish, last_accessed, input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('class_id, account_id, date_start, date_finish, last_accessed, user_input, input_date, status_record', 'safe', 'on'=>'search'),
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
			'account' => array(self::BELONGS_TO, 'MsAccount', 'account_id'),
			'class' => array(self::HAS_ONE, 'MsClass', 'class_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'class_id' => 'Class',
			'account_id' => 'Account',
			'date_start' => 'Date Start',
			'date_finish' => 'Date Finish',
			'last_accessed' => 'Last Accessed',
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

		$criteria->compare('class_id',$this->class_id);
		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('date_start',$this->date_start,true);
		$criteria->compare('date_finish',$this->date_finish,true);
		$criteria->compare('last_accessed',$this->last_accessed,true);
		$criteria->compare('user_input',$this->user_input,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('status_record',$this->status_record,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}

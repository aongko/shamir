<?php

/**
 * This is the model class for table "ms_session".
 *
 * The followings are the available columns in table 'ms_session':
 * @property integer $session_id
 * @property integer $class_id
 * @property string $session_name
 * @property integer $session_number
 * @property string $front_image
 * @property string $description
 * @property string $content
 * @property string $date_start
 * @property string $date_end
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 *
 * The followings are the available model relations:
 * @property MsClass $class
 * @property TrAssignment[] $trAssignments
 * @property TrRating[] $trRatings
 * @property TrVideo[] $trVideos
 */
class MsSession extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MsSession the static model class
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
		return 'ms_session';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_id, session_name, session_number, description, content', 'required'),
			array('class_id, session_number', 'numerical', 'integerOnly'=>true),
			array('session_name, user_input', 'length', 'max'=>50),
			array('front_image, description', 'length', 'max'=>250),
			array('content', 'length', 'max'=>10000),
			array('status_record', 'length', 'max'=>1),
			array('date_start, date_end, input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('session_id, class_id, session_name, session_number, front_image, description, content, date_start, date_end, user_input, input_date, status_record', 'safe', 'on'=>'search'),
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
			'class' => array(self::BELONGS_TO, 'MsClass', 'class_id'),
			'trAssignments' => array(self::HAS_MANY, 'TrAssignment', 'session_id'),
			'trRatings' => array(self::HAS_MANY, 'TrRating', 'session_id'),
			'trVideos' => array(self::HAS_MANY, 'TrVideo', 'session_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'session_id' => 'Session',
			'class_id' => 'Class',
			'session_name' => 'Session Name',
			'session_number' => 'Session Number',
			'front_image' => 'Front Image',
			'description' => 'Description',
			'content' => 'Content',
			'date_start' => 'Date Start',
			'date_end' => 'Date End',
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

		$criteria->compare('session_id',$this->session_id);
		$criteria->compare('class_id',$this->class_id);
		$criteria->compare('session_name',$this->session_name,true);
		$criteria->compare('session_number',$this->session_number);
		$criteria->compare('front_image',$this->front_image,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('date_start',$this->date_start,true);
		$criteria->compare('date_end',$this->date_end,true);
		$criteria->compare('user_input',$this->user_input,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('status_record','<>D',true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
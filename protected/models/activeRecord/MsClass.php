<?php

/**
 * This is the model class for table "ms_class".
 *
 * The followings are the available columns in table 'ms_class':
 * @property integer $class_id
 * @property string $class_name
 * @property integer $class_category_id
 * @property integer $max_capacity
 * @property string $description
 * @property string $date_start
 * @property string $date_end
 * @property integer $lecturer_id
 * @property string $front_image
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 *
 * The followings are the available model relations:
 * @property LtClassCategory $classCategory
 * @property MsAccount $lecturer
 * @property MsSession[] $msSessions
 * @property TrClassReview[] $trClassReviews
 * @property TrPost[] $trPosts
 * @property TrRating[] $trRatings
 */
class MsClass extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MsClass the static model class
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
		return 'ms_class';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_name, class_category_id, max_capacity, description, lecturer_id, front_image', 'required'),
			array('class_category_id, max_capacity, lecturer_id', 'numerical', 'integerOnly'=>true),
			array('class_name, user_input', 'length', 'max'=>50),
			array('description, front_image', 'length', 'max'=>250),
			array('status_record', 'length', 'max'=>1),
			array('date_start, date_end, input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('class_id, class_name, class_category_id, max_capacity, description, date_start, date_end, lecturer_id, front_image, user_input, input_date, status_record', 'safe', 'on'=>'search'),
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
			'classCategory' => array(self::BELONGS_TO, 'LtClassCategory', 'class_category_id'),
			'lecturer' => array(self::BELONGS_TO, 'MsAccount', 'lecturer_id'),
			'msSessions' => array(self::HAS_MANY, 'MsSession', 'class_id'),
			'trClassReviews' => array(self::HAS_MANY, 'TrClassReview', 'class_id'),
			'trPosts' => array(self::HAS_MANY, 'TrPost', 'class_id'),
			'trRatings' => array(self::HAS_MANY, 'TrRating', 'class_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'class_id' => 'Class',
			'class_name' => 'Class Name',
			'class_category_id' => 'Class Category',
			'max_capacity' => 'Max Capacity',
			'description' => 'Description',
			'date_start' => 'Date Start',
			'date_end' => 'Date End',
			'lecturer_id' => 'Lecturer',
			'front_image' => 'Front Image',
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
		$criteria->compare('class_name',$this->class_name,true);
		$criteria->compare('class_category_id',$this->class_category_id);
		$criteria->compare('max_capacity',$this->max_capacity);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date_start',$this->date_start,true);
		$criteria->compare('date_end',$this->date_end,true);
		$criteria->compare('lecturer_id',$this->lecturer_id);
		$criteria->compare('front_image',$this->front_image,true);
		$criteria->compare('user_input',$this->user_input,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('status_record','<>D',true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
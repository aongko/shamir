<?php

/**
 * This is the model class for table "master_class".
 *
 * The followings are the available columns in table 'master_class':
 * @property integer $class_id
 * @property string $class_name
 * @property integer $class_category_id
 * @property integer $max_capacity
 * @property string $description
 * @property string $date_start
 * @property string $date_end
 * @property integer $lecture_id
 * @property string $front_image
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 *
 * The followings are the available model relations:
 * @property ClassReview[] $classReviews
 * @property MasterAccount $lecture
 * @property MasterClassCategory $classCategory
 * @property MasterSession[] $masterSessions
 * @property MasterAccount[] $masterAccounts
 */
class MasterClass extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MasterClass the static model class
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
		return 'master_class';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_name, class_category_id, max_capacity, description, lecture_id, front_image', 'required'),
			array('class_category_id, max_capacity, lecture_id', 'numerical', 'integerOnly'=>true),
			array('class_name, front_image, user_input', 'length', 'max'=>50),
			array('status_record', 'length', 'max'=>1),
			array('date_start, date_end, input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('class_id, class_name, class_category_id, max_capacity, description, date_start, date_end, lecture_id, front_image', 'safe', 'on'=>'search'),
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
			'classReviews' => array(self::HAS_MANY, 'ClassReview', 'class_id'),
			'lecture' => array(self::BELONGS_TO, 'MasterAccount', 'lecture_id'),
			'classCategory' => array(self::BELONGS_TO, 'MasterClassCategory', 'class_category_id'),
			'masterSessions' => array(self::HAS_MANY, 'MasterSession', 'class_id'),
			'masterAccounts' => array(self::MANY_MANY, 'MasterAccount', 'tr_class(class_id, account_id)'),
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
			'lecture_id' => 'Lecture',
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
		$criteria->compare('lecture_id',$this->lecture_id);
		$criteria->compare('front_image',$this->front_image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
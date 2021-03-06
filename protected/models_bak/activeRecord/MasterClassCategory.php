<?php

/**
 * This is the model class for table "master_class_category".
 *
 * The followings are the available columns in table 'master_class_category':
 * @property integer $class_category_id
 * @property string $class_category_name
 * @property integer $parent_id
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 *
 * The followings are the available model relations:
 * @property MasterClass[] $masterClasses
 * @property MasterClassCategory $parent
 * @property MasterClassCategory[] $masterClassCategories
 */
class MasterClassCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MasterClassCategory the static model class
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
		return 'master_class_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_category_name', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('class_category_name, user_input', 'length', 'max'=>50),
			array('status_record', 'length', 'max'=>1),
			array('input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('class_category_id, class_category_name, parent_id', 'safe', 'on'=>'search'),
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
			'masterClasses' => array(self::HAS_MANY, 'MasterClass', 'class_category_id'),
			'parent' => array(self::BELONGS_TO, 'MasterClassCategory', 'parent_id'),
			'masterClassCategories' => array(self::HAS_MANY, 'MasterClassCategory', 'parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'class_category_id' => 'Class Category',
			'class_category_name' => 'Class Category Name',
			'parent_id' => 'Parent',
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

		$criteria->compare('class_category_id',$this->class_category_id);
		$criteria->compare('class_category_name',$this->class_category_name,true);
		$criteria->compare('parent_id',$this->parent_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
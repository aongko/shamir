<?php

/**
 * This is the model class for table "lt_discussion_category".
 *
 * The followings are the available columns in table 'lt_discussion_category':
 * @property integer $discussion_category_id
 * @property string $discussion_category_name
 * @property integer $class_id
 * @property integer $parent_id
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 *
 * The followings are the available model relations:
 * @property MsClass $class
 * @property LtDiscussionCategory $parent
 * @property LtDiscussionCategory[] $ltDiscussionCategories
 * @property TrDiscussion[] $trDiscussions
 */
class LtDiscussionCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LtDiscussionCategory the static model class
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
		return 'lt_discussion_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('discussion_category_name', 'required'),
			array('class_id, parent_id', 'numerical', 'integerOnly'=>true),
			array('discussion_category_name, user_input', 'length', 'max'=>50),
			array('status_record', 'length', 'max'=>1),
			array('input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('discussion_category_id, discussion_category_name, class_id, parent_id, user_input, input_date, status_record', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'LtDiscussionCategory', 'parent_id'),
			'ltDiscussionCategories' => array(self::HAS_MANY, 'LtDiscussionCategory', 'parent_id'),
			'trDiscussions' => array(self::HAS_MANY, 'TrDiscussion', 'discussion_category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'discussion_category_id' => 'Discussion Category',
			'discussion_category_name' => 'Discussion Category Name',
			'class_id' => 'Class',
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

		$criteria->compare('discussion_category_id',$this->discussion_category_id);
		$criteria->compare('discussion_category_name',$this->discussion_category_name,true);
		$criteria->compare('class_id',$this->class_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('user_input',$this->user_input,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('t.status_record','<>D',true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
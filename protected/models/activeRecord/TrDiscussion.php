<?php

/**
 * This is the model class for table "tr_discussion".
 *
 * The followings are the available columns in table 'tr_discussion':
 * @property integer $discussion_id
 * @property string $discussion_title
 * @property integer $discussion_category_id
 * @property integer $created_by
 * @property string $created_date
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 *
 * The followings are the available model relations:
 * @property LtDiscussionCategory $discussionCategory
 * @property MsAccount $createdBy
 * @property TrPost[] $trPosts
 */
class TrDiscussion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrDiscussion the static model class
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
		return 'tr_discussion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('discussion_title, discussion_category_id, created_by, created_date', 'required'),
			array('discussion_category_id, created_by', 'numerical', 'integerOnly'=>true),
			array('discussion_title, user_input', 'length', 'max'=>50),
			array('status_record', 'length', 'max'=>1),
			array('input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('discussion_id, discussion_title, discussion_category_id, created_by, created_date, user_input, input_date, status_record', 'safe', 'on'=>'search'),
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
			'discussionCategory' => array(self::BELONGS_TO, 'LtDiscussionCategory', 'discussion_category_id'),
			'createdBy' => array(self::BELONGS_TO, 'MsAccount', 'created_by'),
			'trPosts' => array(self::HAS_MANY, 'TrPost', 'discussion_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'discussion_id' => 'Discussion',
			'discussion_title' => 'Discussion Title',
			'discussion_category_id' => 'Discussion Category',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
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

		$criteria->compare('discussion_id',$this->discussion_id);
		$criteria->compare('discussion_title',$this->discussion_title,true);
		$criteria->compare('discussion_category_id',$this->discussion_category_id);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('user_input',$this->user_input,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('t.status_record','<>D',true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
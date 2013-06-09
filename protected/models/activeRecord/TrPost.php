<?php

/**
 * This is the model class for table "tr_post".
 *
 * The followings are the available columns in table 'tr_post':
 * @property integer $post_id
 * @property integer $account_id
 * @property string $created_date
 * @property string $content
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 * @property integer $discussion_id
 * @property integer $class_id
 *
 * The followings are the available model relations:
 * @property MsAccount $account
 * @property TrDiscussion $discussion
 * @property MsClass $class
 * @property TrRating[] $trRatings
 */
class TrPost extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrPost the static model class
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
		return 'tr_post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('account_id, created_date, content', 'required'),
			array('account_id, discussion_id, class_id', 'numerical', 'integerOnly'=>true),
			array('content', 'length', 'max'=>10000),
			array('user_input', 'length', 'max'=>50),
			array('status_record', 'length', 'max'=>1),
			array('input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('post_id, account_id, created_date, content, user_input, input_date, status_record, discussion_id, class_id', 'safe', 'on'=>'search'),
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
			'discussion' => array(self::BELONGS_TO, 'TrDiscussion', 'discussion_id'),
			'class' => array(self::BELONGS_TO, 'MsClass', 'class_id'),
			'trRatings' => array(self::HAS_MANY, 'TrRating', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'post_id' => 'Post',
			'account_id' => 'Account',
			'created_date' => 'Created Date',
			'content' => 'Content',
			'user_input' => 'User Input',
			'input_date' => 'Input Date',
			'status_record' => 'Status Record',
			'discussion_id' => 'Discussion',
			'class_id' => 'Class',
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

		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('user_input',$this->user_input,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('status_record',$this->status_record,true);
		$criteria->compare('discussion_id',$this->discussion_id);
		$criteria->compare('class_id',$this->class_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
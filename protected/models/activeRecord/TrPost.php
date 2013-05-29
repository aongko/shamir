<?php

/**
 * This is the model class for table "tr_post".
 *
 * The followings are the available columns in table 'tr_post':
 * @property integer $post_id
 * @property string $content
 * @property integer $discussion_id
 * @property string $date
 * @property integer $account_id
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 *
 * The followings are the available model relations:
 * @property TrDocs[] $trDocs
 * @property MasterAccount $account
 * @property TrForumDiscussion $discussion
 * @property MasterAccount[] $masterAccounts
 * @property TrVideo[] $trVideos
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
			array('content, discussion_id, date, account_id', 'required'),
			array('discussion_id, account_id', 'numerical', 'integerOnly'=>true),
			array('user_input', 'length', 'max'=>50),
			array('status_record', 'length', 'max'=>1),
			array('input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('post_id, content, discussion_id, date, account_id, user_input, input_date, status_record', 'safe', 'on'=>'search'),
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
			'trDocs' => array(self::HAS_MANY, 'TrDocs', 'post_id'),
			'account' => array(self::BELONGS_TO, 'MasterAccount', 'account_id'),
			'discussion' => array(self::BELONGS_TO, 'TrForumDiscussion', 'discussion_id'),
			'masterAccounts' => array(self::MANY_MANY, 'MasterAccount', 'tr_post_rating(post_id, account_id)'),
			'trVideos' => array(self::HAS_MANY, 'TrVideo', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'post_id' => 'Post',
			'content' => 'Content',
			'discussion_id' => 'Discussion',
			'date' => 'Date',
			'account_id' => 'Account',
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

		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('discussion_id',$this->discussion_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('user_input',$this->user_input,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('status_record',$this->status_record,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
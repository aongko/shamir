<?php

/**
 * This is the model class for table "tr_rating".
 *
 * The followings are the available columns in table 'tr_rating':
 * @property integer $rating_id
 * @property integer $account_id
 * @property integer $star
 * @property string $rate_date
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 * @property integer $class_id
 * @property integer $session_id
 * @property integer $post_id
 * @property integer $video_id
 *
 * The followings are the available model relations:
 * @property TrVideo $video
 * @property MsAccount $account
 * @property MsClass $class
 * @property MsSession $session
 * @property TrPost $post
 */
class TrRating extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrRating the static model class
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
		return 'tr_rating';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('account_id, star, rate_date', 'required'),
			array('account_id, star, class_id, session_id, post_id, video_id', 'numerical', 'integerOnly'=>true),
			array('user_input', 'length', 'max'=>50),
			array('status_record', 'length', 'max'=>1),
			array('input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rating_id, account_id, star, rate_date, user_input, input_date, status_record, class_id, session_id, post_id, video_id', 'safe', 'on'=>'search'),
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
			'video' => array(self::BELONGS_TO, 'TrVideo', 'video_id'),
			'account' => array(self::BELONGS_TO, 'MsAccount', 'account_id'),
			'class' => array(self::BELONGS_TO, 'MsClass', 'class_id'),
			'session' => array(self::BELONGS_TO, 'MsSession', 'session_id'),
			'post' => array(self::BELONGS_TO, 'TrPost', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rating_id' => 'Rating',
			'account_id' => 'Account',
			'star' => 'Star',
			'rate_date' => 'Rate Date',
			'user_input' => 'User Input',
			'input_date' => 'Input Date',
			'status_record' => 'Status Record',
			'class_id' => 'Class',
			'session_id' => 'Session',
			'post_id' => 'Post',
			'video_id' => 'Video',
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

		$criteria->compare('rating_id',$this->rating_id);
		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('star',$this->star);
		$criteria->compare('rate_date',$this->rate_date,true);
		$criteria->compare('user_input',$this->user_input,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('t.status_record','<>D',true);
		$criteria->compare('class_id',$this->class_id);
		$criteria->compare('session_id',$this->session_id);
		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('video_id',$this->video_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
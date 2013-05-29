<?php

/**
 * This is the model class for table "master_account".
 *
 * The followings are the available columns in table 'master_account':
 * @property integer $account_id
 * @property string $user_name
 * @property string $password
 * @property integer $profile_id
 * @property integer $user_type_id
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 *
 * The followings are the available model relations:
 * @property ClassReview[] $classReviews
 * @property MasterProfile $profile
 * @property MasterUserType $userType
 * @property MasterClass[] $masterClasses
 * @property TrAssignmentDetail[] $trAssignmentDetails
 * @property MasterClass[] $masterClasses1
 * @property TrPost[] $trPosts
 * @property TrPost[] $trPosts1
 * @property TrPriviledge[] $trPriviledges
 * @property TrVideo[] $trVideos
 */
class MasterAccount extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MasterAccount the static model class
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
		return 'master_account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, password, profile_id, user_type_id', 'required'),
			array('profile_id, user_type_id', 'numerical', 'integerOnly'=>true),
			array('user_name, password, user_input', 'length', 'max'=>50),
			array('status_record', 'length', 'max'=>1),
			array('input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('account_id, user_name, password, profile_id, user_type_id', 'safe', 'on'=>'search'),
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
			'classReviews' => array(self::HAS_MANY, 'ClassReview', 'account_id'),
			'profile' => array(self::BELONGS_TO, 'MasterProfile', 'profile_id'),
			'userType' => array(self::BELONGS_TO, 'MasterUserType', 'user_type_id'),
			'masterClasses' => array(self::HAS_MANY, 'MasterClass', 'lecture_id'),
			'trAssignmentDetails' => array(self::HAS_MANY, 'TrAssignmentDetail', 'account_id'),
			'masterClasses1' => array(self::MANY_MANY, 'MasterClass', 'tr_class(account_id, class_id)'),
			'trPosts' => array(self::HAS_MANY, 'TrPost', 'account_id'),
			'trPosts1' => array(self::MANY_MANY, 'TrPost', 'tr_post_rating(account_id, post_id)'),
			'trPriviledges' => array(self::HAS_MANY, 'TrPriviledge', 'account_id'),
			'trVideos' => array(self::MANY_MANY, 'TrVideo', 'tr_video_rating(account_id, video_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'account_id' => 'Account',
			'user_name' => 'User Name',
			'password' => 'Password',
			'profile_id' => 'Profile',
			'user_type_id' => 'User Type',
			//'user_input' => 'User Input',
			//'input_date' => 'Input Date',
			//'status_record' => 'Status Record',
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

		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('profile_id',$this->profile_id);
		$criteria->compare('user_type_id',$this->user_type_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
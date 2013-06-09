<?php

/**
 * This is the model class for table "tr_video".
 *
 * The followings are the available columns in table 'tr_video':
 * @property integer $video_id
 * @property string $video_name
 * @property string $video_url
 * @property integer $added_by
 * @property string $added_date
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 * @property integer $session_id
 *
 * The followings are the available model relations:
 * @property TrRating[] $trRatings
 * @property MsSession $session
 * @property MsAccount $addedBy
 */
class TrVideo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrVideo the static model class
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
		return 'tr_video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('video_name, video_url, added_by, added_date', 'required'),
			array('added_by, session_id', 'numerical', 'integerOnly'=>true),
			array('video_name, user_input', 'length', 'max'=>50),
			array('video_url', 'length', 'max'=>250),
			array('status_record', 'length', 'max'=>1),
			array('input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('video_id, video_name, video_url, added_by, added_date, user_input, input_date, status_record, session_id', 'safe', 'on'=>'search'),
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
			'trRatings' => array(self::HAS_MANY, 'TrRating', 'video_id'),
			'session' => array(self::BELONGS_TO, 'MsSession', 'session_id'),
			'addedBy' => array(self::BELONGS_TO, 'MsAccount', 'added_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'video_id' => 'Video',
			'video_name' => 'Video Name',
			'video_url' => 'Video Url',
			'added_by' => 'Added By',
			'added_date' => 'Added Date',
			'user_input' => 'User Input',
			'input_date' => 'Input Date',
			'status_record' => 'Status Record',
			'session_id' => 'Session',
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

		$criteria->compare('video_id',$this->video_id);
		$criteria->compare('video_name',$this->video_name,true);
		$criteria->compare('video_url',$this->video_url,true);
		$criteria->compare('added_by',$this->added_by);
		$criteria->compare('added_date',$this->added_date,true);
		$criteria->compare('user_input',$this->user_input,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('status_record',$this->status_record,true);
		$criteria->compare('session_id',$this->session_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
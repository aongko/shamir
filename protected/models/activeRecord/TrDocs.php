<?php

/**
 * This is the model class for table "tr_docs".
 *
 * The followings are the available columns in table 'tr_docs':
 * @property integer $doc_id
 * @property string $doc_url
 * @property string $doc_name
 * @property integer $post_id
 * @property integer $session_id
 * @property integer $assignment_id
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 *
 * The followings are the available model relations:
 * @property MasterSession $session
 * @property TrAssignment $assignment
 * @property TrPost $post
 */
class TrDocs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrDocs the static model class
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
		return 'tr_docs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('doc_url, doc_name', 'required'),
			array('post_id, session_id, assignment_id', 'numerical', 'integerOnly'=>true),
			array('doc_url', 'length', 'max'=>200),
			array('doc_name, user_input', 'length', 'max'=>50),
			array('status_record', 'length', 'max'=>1),
			array('input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('doc_id, doc_url, doc_name, post_id, session_id, assignment_id, user_input, input_date, status_record', 'safe', 'on'=>'search'),
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
			'session' => array(self::BELONGS_TO, 'MasterSession', 'session_id'),
			'assignment' => array(self::BELONGS_TO, 'TrAssignment', 'assignment_id'),
			'post' => array(self::BELONGS_TO, 'TrPost', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'doc_id' => 'Doc',
			'doc_url' => 'Doc Url',
			'doc_name' => 'Doc Name',
			'post_id' => 'Post',
			'session_id' => 'Session',
			'assignment_id' => 'Assignment',
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

		$criteria->compare('doc_id',$this->doc_id);
		$criteria->compare('doc_url',$this->doc_url,true);
		$criteria->compare('doc_name',$this->doc_name,true);
		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('session_id',$this->session_id);
		$criteria->compare('assignment_id',$this->assignment_id);
		$criteria->compare('user_input',$this->user_input,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('status_record',$this->status_record,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
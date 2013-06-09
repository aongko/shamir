<?php

/**
 * This is the model class for table "tr_priviledge".
 *
 * The followings are the available columns in table 'tr_priviledge':
 * @property integer $priviledge_id
 * @property integer $menu_id
 * @property integer $discussion_id
 * @property integer $discussion_category_id
 * @property integer $account_id
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 * @property integer $user_type_id
 *
 * The followings are the available model relations:
 * @property MasterAccount $account
 * @property MasterDiscussionCategory $discussionCategory
 * @property MasterMenu $menu
 * @property TrForumDiscussion $discussion
 */
class TrPriviledge extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrPriviledge the static model class
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
		return 'tr_priviledge';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('menu_id, discussion_id, discussion_category_id, account_id, user_type_id', 'numerical', 'integerOnly'=>true),
			array('user_input', 'length', 'max'=>50),
			array('status_record', 'length', 'max'=>1),
			array('input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('priviledge_id, menu_id, discussion_id, discussion_category_id, account_id, user_input, input_date, status_record, user_type_id', 'safe', 'on'=>'search'),
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
			'account' => array(self::BELONGS_TO, 'MasterAccount', 'account_id'),
			'discussionCategory' => array(self::BELONGS_TO, 'MasterDiscussionCategory', 'discussion_category_id'),
			'menu' => array(self::BELONGS_TO, 'MasterMenu', 'menu_id'),
			'discussion' => array(self::BELONGS_TO, 'TrForumDiscussion', 'discussion_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'priviledge_id' => 'Priviledge',
			'menu_id' => 'Menu',
			'discussion_id' => 'Discussion',
			'discussion_category_id' => 'Discussion Category',
			'account_id' => 'Account',
			'user_input' => 'User Input',
			'input_date' => 'Input Date',
			'status_record' => 'Status Record',
			'user_type_id' => 'User Type',
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

		$criteria->compare('priviledge_id',$this->priviledge_id);
		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('discussion_id',$this->discussion_id);
		$criteria->compare('discussion_category_id',$this->discussion_category_id);
		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('user_input',$this->user_input,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('status_record',$this->status_record,true);
		$criteria->compare('user_type_id',$this->user_type_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
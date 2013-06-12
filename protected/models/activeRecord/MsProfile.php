<?php

/**
 * This is the model class for table "ms_profile".
 *
 * The followings are the available columns in table 'ms_profile':
 * @property integer $profile_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $date_of_birth
 * @property string $phone1
 * @property string $phone2
 * @property string $address
 * @property string $email1
 * @property string $email2
 * @property integer $city_id
 * @property string $motto
 * @property string $user_input
 * @property string $input_date
 * @property string $status_record
 *
 * The followings are the available model relations:
 * @property MsAccount[] $msAccounts
 * @property LtCity $city
 */
class MsProfile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MsProfile the static model class
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
		return 'ms_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, date_of_birth, phone1, address, email1, city_id', 'required'),
			array('city_id', 'numerical', 'integerOnly'=>true),
			array('first_name, middle_name, last_name, email1, email2, user_input', 'length', 'max'=>50),
			array('phone1, phone2', 'length', 'max'=>25),
			array('address, motto', 'length', 'max'=>250),
			array('status_record', 'length', 'max'=>1),
			array('input_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('profile_id, first_name, middle_name, last_name, date_of_birth, phone1, phone2, address, email1, email2, city_id, motto, user_input, input_date, status_record', 'safe', 'on'=>'search'),
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
			'msAccounts' => array(self::HAS_MANY, 'MsAccount', 'profile_id'),
			'city' => array(self::BELONGS_TO, 'LtCity', 'city_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'profile_id' => 'Profile',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'date_of_birth' => 'Date Of Birth',
			'phone1' => 'Phone1',
			'phone2' => 'Phone2',
			'address' => 'Address',
			'email1' => 'Email1',
			'email2' => 'Email2',
			'city_id' => 'City',
			'motto' => 'Motto',
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

		$criteria->compare('profile_id',$this->profile_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('phone1',$this->phone1,true);
		$criteria->compare('phone2',$this->phone2,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('email1',$this->email1,true);
		$criteria->compare('email2',$this->email2,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('motto',$this->motto,true);
		$criteria->compare('user_input',$this->user_input,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('t.status_record','<>D',true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
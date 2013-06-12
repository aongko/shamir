<?php
class RegisterForm extends CFormModel {
	public $user_name, $password, $password_repeat;
	
	public $first_name = "";
	public $middle_name = "";
	public $last_name = "";
	public $date_of_birth;
	public $phone1;
	public $phone2;
	public $address;
	public $email1;
	public $email2;
	public $city_id;
	public $motto = "";
	
	public function rules() {
		return array(
			array('user_name, password, password_repeat, first_name, date_of_birth, phone1, address, email1, city_id', 'required'),
			array('city_id', 'numerical', 'integerOnly'=>true),
			array('user_name, password', 'length', 'max'=>50),
			array('password_repeat', 'compare', 'compareAttribute'=>'password'),
			array('email1, email2', 'email'),
			array('first_name, middle_name, last_name, email1, email2', 'length', 'max'=>50),
			array('phone1, phone2', 'length', 'max'=>25),
			array('date_of_birth', 'date', 'format'=>'yyyy-MM-dd'),
			array('address, motto', 'length', 'max'=>250),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'user_name' => 'Username',
			'password' => 'Password',
			'password_repeat' => 'Repeat Password',
			
		);
	}
}
?>

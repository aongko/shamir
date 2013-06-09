<?php
class AddPostForm extends CFormModel
{
	public $content;
	public function rules()
	{
		return array(
			array('content', 'length', 'max'=>10000),
		);
	}
	public function attributeLabels()
	{
		return array(
			'content'=>'Content',
		);
	}
}

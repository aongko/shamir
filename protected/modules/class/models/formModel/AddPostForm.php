<?php
class AddPostForm extends CFormModel
{
	public $content;
	public $discussion_id;
	public $class_id;
	public function rules()
	{
		return array(
			array('content', 'length', 'max'=>10000),
			array('discussion_id, class_id', 'numerical', 'integerOnly'=>true),
		);
	}
	public function attributeLabels()
	{
		return array(
			'content'=>'Content',
			'discussion_id'=>'Discussion ID',
			'class_id'=>'Class ID',
		);
	}
}
?>

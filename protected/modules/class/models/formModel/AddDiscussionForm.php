<?php
class AddDiscussionForm extends CFormModel
{
	//TrDiscussion
	public $discussion_title;
	public $discussion_category_id;
	
	//TrPost
	public $content;
	public $discussion_id;
	public function rules()
	{
		
		return array(
			array('discussion_title, discussion_category_id', 'required'),
			array('discussion_category_id', 'numerical', 'integerOnly'=>true),
			array('discussion_title', 'length', 'max'=>50),
			array('content', 'required'),
			array('discussion_id', 'numerical', 'integerOnly'=>true),
			array('content', 'length', 'max'=>10000),
		);
	}
	public function attributeLabels()
	{
		return array(
			'discussion_title'=>'Discussion Title',
			'discussion_category_id'=>'Discussion Category ID',
			'content'=>'Content',
			'discussion_id'=>'Discussion ID'
		);
	}
}
?>

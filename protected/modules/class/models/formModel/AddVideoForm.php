<?php
class AddVideoForm extends CFormModel
{
	public $video_name;
	public $video_url;
	public function rules()
	{
		return array(
			array('video_name, video_url', 'required'),
			array('video_name', 'length', 'max'=>50),
			array('video_url', 'length', 'max'=>250),
		);
	}
	public function attributeLabels()
	{
		return array(
			'video_name'=>'Video Name',
			'video_url'=>'Video URL',
		);
	}
}
?>

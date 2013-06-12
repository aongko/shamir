<?php
class SubmitAssignmentForm extends CFormModel
{
	public $content;
	public $assignment_id;
	public $doc;
	public function rules()
	{
		return array(
			array('content', 'length', 'max'=>10000),
			array('assignment_id', 'required'),
			array('doc', 'file', 'types'=>'jpg, gif, png, doc, docx, pdf, zip, rar'),
		);
	}
	public function attributeLabels()
	{
		return array(
			'content'=>'Content',
			'assignment_id'=>'Assignment ID',
			'doc'=>'Document',
		);
	}
}
?>

<?php
class AddAssignmentForm extends CFormModel
{
	//TrSession
	public $date_start;
	public $date_end;
	
	//TrAssignment
	public $content;
	
	//TrFiles
	public $doc;
	public function rules()
	{
		
		return array(
			array('date_start, date_end', 'date', 'format'=>'yyyy-MM-dd'),
			array('content', 'required'),
			array('content', 'length', 'max'=>10000),
			array('doc', 'file', 'types'=>'jpg, gif, png, doc, docx, pdf, zip, rar'),
		);
	}
	public function attributeLabels()
	{
		return array(
			'date_start'=>'Date Start',
			'date_end'=>'Date End',
			'content'=>'Content',
			'doc'=>'Document',
		);
	}
}
?>

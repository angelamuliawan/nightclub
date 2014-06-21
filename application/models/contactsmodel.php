<?php
class ContactsModel extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function insertContactUs($name, $email, $subject, $message)
	{
		$query = $this->db->query("INSERT INTO contact (name, email, subject, message) VALUES('{$name}','{$email}','{$subject}','{$message}') ");

		if($this->db->affected_rows()>0)
			return 1;
		else
		  	return 0;
	}
	function getMessage()
	{
		$query = $this->db->query('select contactid, name, email, subject, message from contact');

		if($this->db->affected_rows()>0)
			return $query->result_array();
		else
		  	return 0;
	}
	function deleteMessage($id)
	{
		$query = $this->db->query('delete from contact where contactid = '.$id);

		if($this->db->affected_rows()>0)
			return 1;
		else
		  	return 0;
	}
}
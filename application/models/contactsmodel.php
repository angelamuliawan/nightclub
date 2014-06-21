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
}
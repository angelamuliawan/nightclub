<?php
//Created by		: Angela Muliawan
class Homemodel extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function checkLogin($username, $password)
	{
		$this->db->select('UserID,UserName,Password, UserStatus');
		$this->db->where("Username = '$username' AND Password = '$password'");
		$query = $this->db->get('msuser');

		if($this->db->affected_rows()>0)
			return $query->result_array();
		else
		  	return 0;
	}
}
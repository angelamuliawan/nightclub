<?php
//Created by		: Angela Muliawan
class Homemodel extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	function getUpcomingEvents()
	{
		$query = $this->db->query("SELECT eventid, title, DATE_FORMAT( Date, '%d %M %Y' ) AS Date1, Time, Description, Place, ImageURL from event order by Date limit 2");
		if($this->db->affected_rows()>0)
			return $query->result_array();
		else
		  	return 0;
	}
	function checkLogin($username, $password)
	{
		$query = $this->db->query("SELECT staffid, username, fullname from staff where username = '{$username}' AND password = '{$password}'");
		if($this->db->affected_rows()>0)
			return $query->result_array();
		else
		  	return 0;
	}
}
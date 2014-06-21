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

}
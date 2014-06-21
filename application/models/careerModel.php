<?php
class careerModel extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function getCareer()
	{
		$query = $this->db->query("SELECT * from career");
		if($this->db->affected_rows()>0)
			return $query->result_array();
		else
		  	return 0;
	}
}
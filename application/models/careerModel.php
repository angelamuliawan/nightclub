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
	function deleteCareer($id)
	{
		$query = $this->db->query("delete from career where careerid = ".$id);
		if($this->db->affected_rows()>0)
			return 1;
		else
		  	return 0;
	}
	function insertCareer($title, $requirement, $jobcontact, $careerid, $staffid)
	{	
		$query = $this->db->query("INSERT INTO career (careerposition, requirement, contact, staffid) values ('{$title}', '{$requirement}', '{$jobcontact}', {$staffid})");
		
		if($this->db->affected_rows()>0)
			return 1;
		else
		  	return 0;
	}
	function editCareer($title, $requirement, $jobcontact, $careerid, $staffid)
	{	
		$query = $this->db->query("UPDATE career set careerposition = '{$title}' ,requirement = '{$requirement}', contact='{$jobcontact}' where careerid = ".$careerid);

		if($this->db->affected_rows()>0)
			return 1;
		else
		  	return 0;
	}
}
<?php

class ProfileModel extends CI_Model
{	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}	
	
	//daftar admin
	public function getProfile($id)
	{
		$query = $this->db->query("SELECT * FROM MsUser WHERE UserID = {$id} ");

		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return 0;
	}
	
	function ViewBasicProfile($userid)
	{
				$this->db->select('UserID, UserName, FullName, Job, CurrentCity, CurrentCountry, DateOfBirth, PlaceOfBirth');
				$this->db->from('msuser');
				$this->db->where("UserID = '$userid' AND AuditedActivity !='D'");
					
				$query = $this->db->get();
				
				if($this->db->affected_rows()>0)
					return $query->result_array();
				else
					return 0;
	}

	function ViewEducationProfile($userid)
	{
				$this->db->select('me.EducationID, me.EducationName, me.StartYear, me.EndYear, me.CurrentEducation, me.Major');
				$this->db->from('msuser as mu');
				$this->db->join('mseducation as me', 'mu.UserID = me.UserID');
				$this->db->where("mu.UserID = '$userid' AND (mu.AuditedActivity !='D' OR me.AuditedActivity != 'D')");
					
				$query = $this->db->get();
				
				if($this->db->affected_rows()>0)
					return $query->result_array();
				else
					return 0;
	}

	function ViewWorkExperienceProfile($userid)
	{
				$this->db->select('mwe.WorkExperienceID, mwe.CompanyName, mwe.Job, mwe.StartYear, mwe.EndYear, mwe.CurrentWork');
				$this->db->from('msuser as mu');
				$this->db->join('msworkexperience as mwe', 'mu.UserID = mwe.UserID');
				$this->db->where("mu.UserID = '$userid' AND (mu.AuditedActivity !='D' OR mwe.AuditedActivity !='D')");
					
				$query = $this->db->get();
				
				if($this->db->affected_rows()>0)
					return $query->result_array();
				else
					return 0;
	}
}
?>

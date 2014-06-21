<?php

class RegisterModel extends CI_Model
{	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}	
	
	//daftar admin
	public function SaveBasicInformation ($UserName ,$Password, $FullName, $Email, $Address, $CurrentCity, $CurrentCountry, 
		$PlaceOfBirth, $DateOfBirth, $Job, $UserStatus, $Booking)
	{
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s');
		$now2 = strtotime($now);
		
		$data=array
		(
			'UserName' => $UserName,
			'Password' => $Password,
			'FullName' => $FullName,
			'Email' => $Email,
			'Address' => $Address,
			'CurrentCity' => $CurrentCity,
			'CurrentCountry' => $CurrentCountry,
			'PlaceOfBirth' => $PlaceOfBirth,
			'DateOfBirth' => $DateOfBirth,
			'Job' => $Job,
			'UserStatus' => $UserStatus,
			'Booking' => $Booking,
			'AuditedUser' => '1',
			'AuditedActivity' => 'A',
			'AuditedTime' => $now,
			'CreatedTime' => $now
		);

		if($this->db->insert('MsUser', $data))
		{
			return $this->db->insert_id();
		}
		else
		{
			return 0;
		}
				
	}
	
	function SaveEducation($userid, $educationname, $startyear, $endyear, $currenteducation, $major)
	{
			date_default_timezone_set('Asia/Jakarta');
			$now = date('Y-m-d H:i:s');
			
			$data = array(
					'UserID' => $userid, 
					'EducationName' => $educationname, 
					'StartYear' => $startyear,
					'EndYear' => $endyear,
					'CurrentEducation' => $currenteducation,
					'Major' => $major,
					'AuditedActivity' => 'A',
					'AuditedUser' => $userid,
					'AuditedTime' => $now,
					'CreatedTime' => $now
				);
			$this->db->insert('mseducation', $data);
			
			if($this->db->affected_rows()>0)
				return 1;
			else
				return 0;
	}

	function SaveWorkExperience($userid, $companyname, $job, $startyear, $endyear, $currentwork)
	{
			date_default_timezone_set('Asia/Jakarta');
			$now = date('Y-m-d H:i:s');
			
			$data = array(
					'UserID' => $userid, 
					'CompanyName' => $companyname, 
					'Job' => $job,
					'StartYear' => $startyear,
					'EndYear' => $endyear,
					'CurrentWork' => $currentwork,
					'AuditedActivity' => 'A',
					'AuditedUser' => $userid,
					'AuditedTime' => $now,
					'CreatedTime' => $now
				);
			
			$this->db->insert('msworkexperience', $data);
			
			if($this->db->affected_rows()>0)
				return 1;
			else
				return 0;
	}
}
?>

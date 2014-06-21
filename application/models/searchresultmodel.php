<?php

class SearchResultModel extends CI_Model
{	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}	
	
	//daftar admin
	public function getExpertList($searchParam)
	{
		$query = $this->db->query("SELECT * FROM MsUser WHERE Job LIKE '%{$searchParam}%' OR UserName LIKE '%{$searchParam}%' ");

		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return 0;
	}
	
	
}
?>

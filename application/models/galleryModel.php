<?php
class GalleryModel extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function getAlbums()
	{
		$query = $this->db->query("SELECT AlbumID, AlbumName, AlbumDescription, DATE_FORMAT( DateTaken, '%d %b %Y' ) AS Date from Album");
		if($this->db->affected_rows()>0)
			return $query->result_array();
		else
		  	return 0;
	}
	
	function getImage()
	{
		$data = $this->input->post();
		$albumid = $data['albumid'];
		
		$query = $this->db->query("SELECT PhotoID, PhotoURL, PhotoDescription from Photo WHERE AlbumID = $albumid");
		if($this->db->affected_rows()>0)
			return $query->result_array();
		else
		  	return 0;
	}
	
	function getImageInsideAlbum()
	{
		$data = $this->input->post();
		$albumid = $data['albumid'];
		
		$query = $this->db->query("SELECT PhotoURL from Photo WHERE AlbumID = $albumid ORDER BY PhotoID DESC LIMIT 1");
		if($this->db->affected_rows()>0)
			return $query->result_array();
		else
		  	return 0;
	}
}
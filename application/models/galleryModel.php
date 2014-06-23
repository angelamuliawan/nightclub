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
	
	function deleteAlbums()
	{
		$data = $this->input->post();
		$albumid = $data['albumid'];
		
		$query = $this->db->query("DELETE FROM Album WHERE AlbumID = $albumid");
		if($this->db->affected_rows()>0)
			return $query->result_array();
		else
		  	return 0;
	}
	
	function createAlbums()
	{
		$data = $this->input->post();
		$albumname = $data['albumname'];
		$albumdescription = $data['albumdescription'];
		$staffID = $this->session->userdata('userid');
		
		$query = $this->db->query("INSERT INTO album (albumname, albumdescription, datetaken, staffid) VALUES('{$albumname}','{$albumdescription}',CURDATE(),'{$staffID}') ");

		if($this->db->affected_rows()>0)
			return 1;
		else
		  	return 0;
	}
	
	function updateAlbums()
	{
		$data = $this->input->post();
		$albumid = $data['albumid'];
		$albumname = $data['albumname'];
		$albumdescription = $data['albumdescription'];
		
		$query = $this->db->query("UPDATE Album SET AlbumName = '$albumname', AlbumDescription = '$albumdescription' WHERE AlbumID = $albumid");
		if($this->db->affected_rows()>0)
			return $query->result_array();
		else
		  	return 0;
	}
	
	function deleteImage()
	{
		$data = $this->input->post();
		$imageid = $data['imageid'];
		
		$query = $this->db->query("DELETE FROM Photo WHERE PhotoID = $imageid");
		if($this->db->affected_rows()>0)
			return $query->result_array();
		else
		  	return 0;
	}
}
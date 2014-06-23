<?php
class EventsModel extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function getEvents()
	{
		$query = $this->db->query("SELECT eventid, title, DATE_FORMAT( Date, '%d %b %Y' ) AS Date, Time, Description, Place, ImageURL from event");
		if($this->db->affected_rows()>0)
			return $query->result_array();
		else
		  	return 0;
	}
	
	function getEventByID()
	{
		$data = $this->input->post();
		$eventid = $data['eventid'];
		$query = $this->db->query("SELECT eventid, Title, DATE_FORMAT( Date, '%d %b %Y' ) AS Date, Time, Description, Place, ImageURL from event WHERE EventID = $eventid");
		if($this->db->affected_rows()>0)
			return $query->result_array();
		else
		  	return 0;
	}
	
	function deleteEvent($id)
	{
		$query = $this->db->query("delete from event where eventid = ".$id);
		if($this->db->affected_rows()>0)
			return 1;
		else
		  	return 0;
	}
	function insertEvent()
	{	
		$data = $this->input->post();
		$title = $data['title'];
		$date = explode('/', $data['date']);
		$new_date = $date[2].'-'.$date[1].'-'.$date[0];
		$time = $data['time'];
		$description = $data['description'];
		$place = $data['place'];
		$imageURL = $data['imageURL'];
		$staffid = $this->session->userdata('userid');
		
		$query = $this->db->query("INSERT INTO event (title, date, time, description, place, imageurl, staffid) values('{$title}', '$new_date', '{$time}', '{$description}', '{$place}', '{$imageURL}',{$staffid})");
		if($this->db->affected_rows()>0)
			return 1;
		else
		  	return 0;
	}
	function editEvent()
	{	
		$data = $this->input->post();
		$title = $data['title'];
		$date = explode('/', $data['date']);
		$new_date = $date[2].'-'.$date[1].'-'.$date[0];
		$time = $data['time'];
		$description = $data['description'];
		$place = $data['place'];
		//$imageURL = $data['imageURL'];
		$eventid = $data['eventid'];
		$staffid = $this->session->userdata('userid');
		$query = $this->db->query("UPDATE event set title='{$title}', date='{$new_date}', time='{$time}', description='{$description}', place='{$place}', staffid={$staffid} where eventid = $eventid");

		if($this->db->affected_rows()>0)
			return 1;
		else
		  	return 0;
	}
}
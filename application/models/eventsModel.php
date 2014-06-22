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
	function deleteEvent($id)
	{
		$query = $this->db->query("delete from event where eventid = ".$id);
		if($this->db->affected_rows()>0)
			return 1;
		else
		  	return 0;
	}
	function insertEvent($title, $date, $time, $description, $place, $imageurl, $staffid)
	{	
		$query = $this->db->query("INSERT INTO event (title, date, time, description, place, imageurl, staffid) values('{$title}', '{$date}', '{$time}', '{$description}', '{$place}', '{$imageurl}',{$staffid})");
		if($this->db->affected_rows()>0)
			return 1;
		else
		  	return 0;
	}
	function editEvent($eventid, $title, $date, $time, $description, $place, $imageurl, $staffid)
	{	
		$query = $this->db->query("UPDATE event set title='{$title}', date='{$date}', time='{$time}', description='{$description}', place='{$place}', imageurl='{$imageurl}', staffid={$staffid} where eventid = ".$eventid);

		if($this->db->affected_rows()>0)
			return 1;
		else
		  	return 0;
	}
}
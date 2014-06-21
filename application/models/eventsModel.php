<?php
class EventsModel extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function getEvents()
	{
		/*$this->db->select("eventid, title, DATE_FORMAT( Date, '%d %b %Y' ) AS Date, Time, Description, Place, ImageURL");
		$query = $this->db->get('event');
*/
		$query = $this->db->query("SELECT eventid, title, DATE_FORMAT( Date, '%d %b %Y' ) AS Date, Time, Description, Place, ImageURL from event");
		if($this->db->affected_rows()>0)
			return $query->result_array();
		else
		  	return 0;
	}
}
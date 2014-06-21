<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
	}
	
	public function index()
	{
		$pageContent = $this->load->view('content/contacts', '' , TRUE);

		//Load Master View, put $pageContent inside
		$this->load->view('master/masterlayout', array('pageContent'=>$pageContent));
	}
	public function insertContactUs()
	{
		$this->load->model('contactsmodel');
		$data = $this->input->post();		
		$result = $this->contactsmodel->insertContactUs($data['name'], $data['email'], $data['subject'], $data['message']);
		$this->output->set_output( json_encode($result));
	}
	public function getMessage()
	{
		$this->load->model('contactsmodel');
		$result = $this->contactsmodel->getMessage();
		$this->output->set_output( json_encode($result));
	}
	public function deleteMessage($id = 0)
	{
		$this->load->model('contactsmodel');
		$result = $this->contactsmodel->deleteMessage($id);
		if($result == 1) redirect('contacts');
	}
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
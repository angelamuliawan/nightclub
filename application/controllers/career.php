<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Career extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
	}
	
	public function index()
	{
		//content
		// REMEMBER !!!!, $this->load->view() CONSIST BY 3 PARAMETER, 
		/*
			1. The is page that you want to load
			2. some variables of parameter that you want to passing to tha loaded page ()
					Notes: if you don't pass anything, just provided it with '', otherwise it will loaded first before the masterpage
			3. TRUE

		*/
			
		$pageContent = $this->load->view('content/career', '' , TRUE);

		//Load Master View, put $pageContent inside
		$this->load->view('master/masterlayout', array('pageContent'=>$pageContent));
	}
	public function getCareer(){
		$this->load->model('careerModel');
		$result = $this->careerModel->getCareer();
		$this->output->set_output(json_encode($result));
	}
	public function deleteCareer($careerid = 0){
		$this->load->model('careerModel');
		$result = $this->careerModel->deleteCareer($careerid);
		redirect('career');
	}
	public function saveCareer()
	{
		$this->load->model('careerModel');
		$data = $this->input->post();		
		if($data['careerid'] == "") $result = $this->careerModel->insertCareer($data['title'], $data['requirement'], $data['jobcontactus'], $data['careerid'], $this->session->userdata('userid'));
		else $result = $this->careerModel->editCareer($data['title'], $data['requirement'], $data['jobcontactus'], $data['careerid'], $this->session->userdata('userid'));
		$this->output->set_output(json_encode($result));
	}
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
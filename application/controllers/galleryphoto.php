<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GalleryPhoto extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
	}
	
	public function index($param = 0)
	{
		//content
		// REMEMBER !!!!, $this->load->view() CONSIST BY 3 PARAMETER, 
		/*
			1. The is page that you want to load
			2. some variables of parameter that you want to passing to tha loaded page ()
					Notes: if you don't pass anything, just provided it with '', otherwise it will loaded first before the masterpage
			3. TRUE

		*/
		
		$data = array('param' => $param);
		$pageContent = $this->load->view('content/galleryphoto', $data , TRUE);

		//Load Master View, put $pageContent inside
		$this->load->view('master/masterlayout', array('pageContent'=>$pageContent));
	}
	
	public function getImage(){
		$this->load->model('galleryModel');
		$result = $this->galleryModel->getImage();

		$this->output->set_output(json_encode($result));
	}
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
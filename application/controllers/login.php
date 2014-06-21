<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
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
			
		$pageContent = $this->load->view('content/login', '' , TRUE);

		//Load Master View, put $pageContent inside
		$this->load->view('master/masterlayout', array('pageContent'=>$pageContent));
	}
	public function checkLogin(){
		$this->load->helper('url');
		$this->session->sess_destroy();
		redirect('home');
	}
	public function checkLogout(){
		$this->load->helper('url');
		$this->session->sess_destroy();
		redirect('home');
	}
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
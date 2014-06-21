<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
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
			
		$pageContent = $this->load->view('content/home', '' , TRUE);

		//Load Master View, put $pageContent inside
		$this->load->view('master/masterlayout', array('pageContent'=>$pageContent));
	}

	public function checkLogin()
	{
		$this->load->model('homemodel');
		$data = $this->input->post();
		
		$result = $this->homemodel->checkLogin($data['username'],$data['password']);
		
		if($result != 0)
		{
			$this->session->set_userdata('loggedin',TRUE);
			$this->session->set_userdata('UserID',$result[0]['UserID']);
			$this->session->set_userdata('UserName',$result[0]['UserName']);
			$this->session->set_userdata('UserStatus',$result[0]['UserStatus']);

			redirect('home');
		}
		else 
		{
			//$this->output->set_output("login salah");
			//redirect('home');
		}
	}

	public function Logout()
	{
		$this->load->helper('url','form');
		$this->session->sess_destroy();
		redirect('home');
	}
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
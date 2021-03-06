<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GalleryAddPhoto extends CI_Controller {
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
		$pageContent = $this->load->view('content/galleryaddphoto', $data , TRUE);

		//Load Master View, put $pageContent inside
		$this->load->view('master/masterlayout', array('pageContent'=>$pageContent));
	}
	
	public function douploadimage(){
		
		//Load Uploader Library
		$config['upload_path'] = 'assets/images/gallery';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('qqfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			echo json_encode(array('status' => "-1", 'msg' => $error));

		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			//$config['image_library'] = 'gd2';
			$config['source_image'] = 'assets/images/gallery/'.$data['upload_data']['file_name'];

			//Get file extention
			$info = pathinfo($data['upload_data']['file_name']);
			$extention = $info['extension'];

			$name = uniqid("image_",true).'.'.$extention;

			//$config['new_image'] = 'assets/images/gallery/'.$name;

			//$this->load->library('my_image');
			//$this->my_image->resize_crop($config);

			//Delete temporary file
			//unlink('assets/images/gallery/'.$data['upload_data']['file_name']);

			echo json_encode(array('status' => "1", 'name' => $data['upload_data']['file_name']));
		}
	}
	
	public function insertNewImage(){
		$this->load->model('galleryModel');
		$result = $this->galleryModel->addNewImage();

		$this->output->set_output(json_encode($result));
	}
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
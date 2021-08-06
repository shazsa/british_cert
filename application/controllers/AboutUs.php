<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutUs extends MY_Controller {
	function __construct(){
        parent::__construct();   
        $this->load->model('User_model');  
        $this->load->library('form_validation');
 	}


	public function index()
	{
		$data['title'] = 'About Us';
		$data['page']   = 'about';
		$this->load->view('admin/templates/top_header', $data);
		$this->load->view('templates/menu',$data);
		$this->load->view('aboutus', $data);
		$this->load->view('signUpLogin');
		$this->load->view('templates/footer');
	}

}

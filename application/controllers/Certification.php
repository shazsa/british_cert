<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certification extends MY_Controller {
	function __construct(){
        parent::__construct();   
        $this->load->model('User_model');  
        $this->load->model('Product_model');  
        $this->load->library('form_validation');
 	}


	public function index()
	{
		$data['title'] = 'ISO Certification';
		$data['page']   = 'service';
		$data['certs'] = $this->Product_model->getActiveCertificates();
		$this->load->view('admin/templates/top_header', $data);    
		$this->load->view('templates/menu',$data);
		$this->load->view('services', $data);
		$this->load->view('signUpLogin');
		$this->load->view('templates/footer');
	}
	//create Dynamic url for each certificate based on page_slug
	public function showCertificate($page_slug)
	{
		$data['title'] = 'ISO Certification '. $page_slug;
		$data['page']   = 'service';
		$data['cert'] = $this->Product_model->getCertificate(null, $page_slug);
		$data['matchingCert'] = $this->Product_model->matchingCertificates();
		$this->load->view('admin/templates/top_header', $data);    
		$this->load->view('templates/menu',$data);
		$this->load->view('common_certificate', $data);
		$this->load->view('signUpLogin');
		$this->load->view('templates/footer');
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUs extends MY_Controller {
	function __construct(){
        parent::__construct();     
        $this->load->library('form_validation');
        $this->load->helper('captcha');
 	}


	public function index()
	{
		$data['title'] = 'Contact Us';
		$data['page']   = 'contact';
		$data['captcha']  = $this->createCaptcha();
		$this->load->view('admin/templates/top_header', $data);
		$this->load->view('templates/menu',$data);
		$this->load->view('contactus', $data);
		$this->load->view('signUpLogin');
		$this->load->view('templates/footer');
	}
	public function createCaptcha()
    {
        $vals = array(            
            'word'          => rand(1,999999),
            'img_path'      => './assets/captcha/images/',
            'img_url'       => base_url('assets').'/captcha/images/',
            'font_path'     => FCPATH.'/system/fonts/texb.ttf',
            'img_width'     => '250',
            'img_height'    => '50',
            'font_size'     => '20',
            'colors'        => array(
                'background'     => array(255, 255, 255),
                'border'         => array(255, 255, 255),
                'text'           => array(0, 0, 0),
                'grid'           => array(255, 75, 100)
            )
        );

        $captcha = create_captcha($vals);
        $this->session->unset_userdata('ses_captcha');
        $this->session->unset_userdata('ses_captcha_file');
        $this->session->set_userdata('ses_captcha', $captcha['word']);
        $this->session->set_userdata('ses_captcha_file', $captcha['filename']);
        return $captcha;
    }


}

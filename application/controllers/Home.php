<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct(){
        parent::__construct();  
        $this->load->model('Slider_model');  
        $this->load->model('User_model');  
        $this->load->model('Login_model');
        $this->load->library('form_validation');
        $this->load->helper('captcha');
 	}


	public function index()
	{
		$data['title'] = 'Home Page';
		$data['page']   = 'home';
		$data['sliders'] = $this->Slider_model->getActiveSlider();
        //$data['captcha']  = $this->createCaptcha();
		$this->load->view('admin/templates/top_header', $data);
		$this->load->view('templates/menu',$data);
		$this->load->view('home', $data);
        $this->load->view('signUpLogin');
		$this->load->view('templates/footer');
	}

    //validate email field
    public function email_check($emailid)
    {
        //Remove all illegal characters from email
        $emailid = filter_var($emailid, FILTER_SANITIZE_EMAIL);
        if( strlen( trim($emailid) ) ==0)
        {
            $this->form_validation->set_message('email_check', 'The {field} field is required');
            return FALSE;
        }
    
        elseif(filter_var($emailid, FILTER_VALIDATE_EMAIL) )
        {
            /*$isUser = $this->db->limit(1)->get_where('users', array('email' =>$emailid, 'id !=' => $this->session->userdata('user_id')))->num_rows();
            if($isUser)
            {
                $this->form_validation->set_message('email_check', 'This {field} already exists');
                return false;
            }*/
            return TRUE; //Valid email!
        }
        else
        {
            $this->form_validation->set_message('email_check', 'The {field} is not a valid email');
            return FALSE;
        }
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
        $data['captcha'] = $captcha;
        echo json_encode($data);
    }



}

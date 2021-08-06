<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Login_model');  
 	}
 
    /* if session is active, show dashboard ELSE login page */
    public function index()
    {
        if( $this->is_logged_in() )
        {
            $this->showDashbaord();    
        }
        else
        {
            $this->showLogin();
        }
    }
 
    /* load login page for admin access */
    public function showLogin()
    {
        $data['title'] = 'Login Page';
        $this->load->view('admin/templates/top_header', $data);        		
        $this->load->view('admin/loginForm', $data);
        $this->load->view('admin/templates/footer');
    }

    //validate email field
    public function email_check($emailid) {
        //Remove all illegal characters from email
        $emailid = filter_var($emailid, FILTER_SANITIZE_EMAIL);
        if( strlen( trim($emailid) ) ==0)
        {
            $this->form_validation->set_message('email_check', 'The {field} field is required');
            return FALSE;
        }
    
        elseif(filter_var($emailid, FILTER_VALIDATE_EMAIL) )
        {
            return TRUE; //Valid email!
        }
        else
        {
            $this->form_validation->set_message('email_check', 'The {field} is not a valid email');
            return FALSE;
        }
    }
    public function welcome()
    {
        $this->form_validation->set_rules('uname', 'User Email', 'trim|required|callback_email_check');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required');
        if ($this->form_validation->run() == false)
        {
            $data['result'] = $this->form_validation->error_array();          
            $data['status']   = 'failed';
        }
        else
        {
            $usermail = $this->input->post('uname');
            $pass = $this->input->post('pass');
            $user_exist = $this->Login_model->check_user($usermail, $pass); 
            if( is_object($user_exist[0]) )
            {
                $sessionArray = array(
                    'Auser_id'  => $user_exist[0]->id,
                    'Ausername' => $user_exist[0]->first_name,
                    'Aemail' => $user_exist[0]->email,
                    'AuserType' => $user_exist[0]->user_type,
                    'isAdminLogin' => TRUE );
                $this->session->set_userdata($sessionArray);
                $data['result'] = 'Logged in successfully...';
                $data['redirect'] = BASE_URL_ADMIN.'Dashboard/showDashbaord/';
                $data['status']   = 'passed';
            }
            else
            {
                $data['result'] = array("data" => $user_exist[0]);                    
                $data['status'] = 'failed';           
            }
        }
        echo json_encode($data);       
    }
    public function showDashbaord()
    {   
        $data['title'] = 'Dashboard';
        $data['page'] = 'dashboard';
        $data['username'] = $this->session->userdata('username');
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/dashboard', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('/Admin/Dashboard/'));
    }  
}
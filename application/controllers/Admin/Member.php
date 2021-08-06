<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {
    public function __construct(){
        parent::__construct();
        if( !$this->is_logged_in() )
        {
            redirect(BASE_URL_ADMIN); 
        }
        $this->load->library('form_validation');
        $this->load->model('Member_model');  
        $this->load->model('User_model');  
 	}
 
    //show all members list
    public function listAll()
    {
        $data = array(
            'title' => 'Users list',
            'page' => 'allUsers',
            'members' => $this->Member_model->getAllMembers(),
            'controller' => $this,
        );
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/users_list', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }

    //show member Active/Inactive form
    public function edit($memberId)
    {
        $encodedId =  $memberId;
        $memberId = $this->decodeData($memberId);
        $data = array(
            'title' => 'User',
            'page' => 'allUsers',
            'userData' => $this->Member_model->getMember($memberId),
            'encodedId' => $encodedId,
        );
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/user_edit', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }

    //save profile changes
    public function updateMember()
    {
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
           
        $status = $this->input->post('status');
        $user_id = $this->input->post('user_id');
        $user_id = $this->decodeData($user_id);
        $form_data = array('status' => $status );

        if ($this->form_validation->run() == FALSE)
        {      
            $data['result'] = $this->form_validation->error_array();            
            $data['status']   = 'failed';
        }
        elseif($status == 'delete')
        {
            $insert = $this->User_model->deleteUser($user_id); 
            if($insert > 0 )
            {
                $data['result'] = 'User Deleted successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'Member/listAll';
                $data['status']   = 'passed';   
            }
            else
            {
                $data['result'] =   array('resp' => $insert);
                $data['status']   = 'failed';   
            }
        }

        else    //else edit data
        {
            $update = $this->User_model->updateUser($form_data, $user_id);
            if($update != -1 )
            {                                   
                $data['result'] = 'User status updated successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'Member/listAll/';
                $data['status']   = 'passed';
            }
            else
            {
                $data['result'] =   array('resp' => $update);
                $data['status']   = 'failed';   
            }
        }
        echo json_encode($data);  
    }  



}
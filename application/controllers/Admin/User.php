<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
    public function __construct(){
        parent::__construct();
        if( !$this->is_logged_in() )
        {
            redirect(BASE_URL_ADMIN); 
        }
        $this->load->library('form_validation');
        $this->load->model('User_model');  
 	}
 
    //show admin edit profile page
    public function editProfile()
    {
        $data = array(
            'title' => 'My Profile',
            'page' => 'user',
            'userData' => $this->User_model->getUserData($this->session->userdata('Auser_id'))
        );
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/myProfile', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
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
            $isUser = $this->db->limit(1)->get_where('users', array('email' =>$emailid, 'id !=' => $this->session->userdata('Auser_id')))->num_rows();
            if($isUser)
            {
                $this->form_validation->set_message('email_check', 'This {field} already exists');
                return false;
            }
            return TRUE; //Valid email!
        }
        else
        {
            $this->form_validation->set_message('email_check', 'The {field} is not a valid email');
            return FALSE;
        }
    }
    //save profile changes
    public function saveProfile()
    {
        $this->form_validation->set_rules('fname', 'First Name','trim|required|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z\s\.\-\_]+$/]',array('regex_match' => 'Please enter valid first name.'));
        $this->form_validation->set_rules('mname', 'Middle Name','trim|required|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z\s\.\-\_]+$/]',array('regex_match' => 'Please enter valid middle name.'));
        $this->form_validation->set_rules('lname', 'Last Name','trim|required|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z\s\.\-\_]+$/]',array('regex_match' => 'Please enter valid last name.'));
        $this->form_validation->set_rules('comp', 'Company Name','trim|required|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z0-9\s\.\-\_]+$/]',array('regex_match' => 'Please enter valid company name.'));
        $this->form_validation->set_rules('mob', 'Mobile No', 'trim|required|integer|exact_length[10]');
        $this->form_validation->set_rules('adds1', 'Address line 1','trim|required|min_length[2]|regex_match[/^[a-zA-Z0-9\s\,\.\-\_\/\&]+$/]',array('regex_match' => 'Please enter valid Address.'));
        $this->form_validation->set_rules('adds2', 'Address line 2','trim|min_length[2]|regex_match[/^[a-zA-Z0-9\s\.\-\_\/\&]+$/]',array('regex_match' => 'Please enter valid Address.'));
        $this->form_validation->set_rules('city', 'City Name','trim|required|min_length[2]|regex_match[/^[a-zA-Z\s\-\_\.]+$/]',array('regex_match' => 'Please enter valid city.'));
        $this->form_validation->set_rules('state', 'State','trim|required|min_length[2]|regex_match[/^[a-zA-Z\s\-\_\.]+$/]',array('regex_match' => 'Please enter valid state.'));
        $this->form_validation->set_rules('country', 'Country','trim|required|min_length[2]|regex_match[/^[a-zA-Z\s\-\_\.]+$/]',array('regex_match' => 'Please enter valid Country.'));
        $this->form_validation->set_rules('zip', 'Postal Code','trim|required|integer|exact_length[6]');


        if ($this->form_validation->run() == false)
        {
            $data['result'] = $this->form_validation->error_array();          
            $data['status']   = 'failed';
        }
        else
        {
            $fname = $this->input->post('fname');
            $mname = $this->input->post('mname');
            $lname = $this->input->post('lname');
            $comp = $this->input->post('comp');
            $mob = $this->input->post('mob');
            $adds1 = $this->input->post('adds1');
            $adds2 = $this->input->post('adds2');
            $city = $this->input->post('city');
            $state = $this->input->post('state');
            $country = $this->input->post('country');
            $zip = $this->input->post('zip');
            $user_id = $this->session->userdata('Auser_id');
            $form_data =array(
                'first_name' => $fname,
                'middle_name' => $mname,
                'last_name'  => $lname,
                'company_name' => $comp,
                'mobile'      => $mob,
                'address1'    => $adds1,
                'address2'    => $adds2,
                'city'        => $city,
                'state'        => $state,
                'country'     => $country,
                'zipcode'     => $zip
            );

            $user_update = $this->User_model->updateUser($form_data, $user_id); 
            if( $user_update !=-1)
            {
                $data['result'] = 'Profile updated successfully.';
                $data['redirect'] = BASE_URL_ADMIN.'Dashboard/';
                $data['status']   = 'passed';
            }
            else
            {
                $data['result'] = array("resp" => $user_update);                    
                $data['status'] = 'failed';           
            }
        }
        echo json_encode($data);       
    }
    //show userName change form
    public function changeUserName()
    {
        $data = array(
            'title' => 'My Profile',
            'page' => 'user',
        );
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/myUsername', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }

    public function userName_check($emailid)
    {
        //Remove all illegal characters from email
        $emailid = filter_var($emailid, FILTER_SANITIZE_EMAIL);
        if( strlen( trim($emailid) ) ==0)
        {
            $this->form_validation->set_message('userName_check', 'The {field} field is required');
            return FALSE;
        }
    
        elseif(filter_var($emailid, FILTER_VALIDATE_EMAIL) )
        {   
            if($emailid != $this->session->userdata('email'))
            {
                $this->form_validation->set_message('userName_check', 'This is not your current username');
                return false;
            }
            return TRUE; //Valid email!
        }
        else
        {
            $this->form_validation->set_message('userName_check', 'The {field} is not a valid email');
            return FALSE;
        }
    }
    //save userName changes
    public function saveUsername()
    {
        $this->form_validation->set_rules('crntUser', 'Current Username', 'trim|required|callback_userName_check');
        $this->form_validation->set_rules('newUser', 'New Username', 'trim|required|callback_email_check');
        $this->form_validation->set_rules('cnfUser', 'Confirm Username', 'trim|required|matches[newUser]');

        if ($this->form_validation->run() == false)
        {
            $data['result'] = $this->form_validation->error_array();          
            $data['status']   = 'failed';
        }
        else
        {
            $newUser = $this->input->post('newUser');
            $user_id = $this->session->userdata('Auser_id');
            $form_data =array('email'      => $newUser);
            $user_update = $this->User_model->updateUser($form_data, $user_id); 
            if( $user_update !=-1)
            {
                $data['result'] = 'Username changed successfully. Please login again';
                $data['redirect'] = BASE_URL_ADMIN.'Dashboard/logout';
                $data['status']   = 'passed';
            }
            else
            {
                $data['result'] = array("cnfUser" => $user_update);                    
                $data['status'] = 'failed';           
            }
        }
        echo json_encode($data);       
    }
    //show password change form
    public function changePassword()
    {
        $data = array(
            'title' => 'Change Password',
            'page' => 'user'
        );
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/myPassword', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }
    //check password validation 
    public function password_check($password)
    {
        if( strlen( trim($password) ) < 8)
        {
            $this->form_validation->set_message('password_check', 'The {field} must be between 8 and 20 characters');
            return FALSE;
        }
        else if ( !preg_match('/[0-9]/', $password) )
        {
            $this->form_validation->set_message('password_check', 'The {field} must contain atleast one digit');
            return FALSE;
        } 
        elseif ( !preg_match('/[a-z]/', $password) )
        {
            $this->form_validation->set_message('password_check', 'The {field} must contain atleast one lowercase letter');
            return FALSE;
        }
        elseif ( !preg_match('/[A-Z]/', $password) )
        {
            $this->form_validation->set_message('password_check', 'The {field} must contain atleast one uppercase letter');
            return FALSE;
        }
        elseif ( ! preg_match('/[^\w\s]/', $password) )
        {
            $this->form_validation->set_message('password_check', 'The {field} must contain atleast one special character');
            return FALSE;
        }     
        else
        {
            return true;
        }
    }  
    //check user entered correct password
    public function chkCrntPass($password)
    {
        if( strlen( trim($password) ) < 8)
        {
            $this->form_validation->set_message('chkCrntPass', 'Please enter Correct password.');
            return FALSE;
        }
        elseif($this->session->userdata('Auser_id') )
        {
            $query = $this->db->select('password')->from('users')->where(array('id' => $this->session->userdata('Auser_id')))->get()->row();
            if (password_verify($password, $query->password))
            {
                return TRUE;  
            }
            else
            {
                $this->form_validation->set_message('chkCrntPass', 'Please enter correct password');
                return FALSE;
            }
        }      
        else
        {
            return true;
        }
    }  
    //save password changes
    public function savePassword()
    {
        $this->form_validation->set_rules('crntUser','Current Password','trim|required|callback_chkCrntPass');
        $this->form_validation->set_rules('newUser', 'New Password', 'trim|required|callback_password_check');
        $this->form_validation->set_rules('cnfUser', 'Confirm Password', 'trim|required|matches[newUser]');

        if ($this->form_validation->run() == false)
        {
            $data['result'] = $this->form_validation->error_array();          
            $data['status']   = 'failed';
        }
        else
        {
            $newPwd = password_hash($this->input->post('newUser'),PASSWORD_DEFAULT);
            $user_id = $this->session->userdata('Auser_id');
            $form_data =array('password'      => $newPwd);
            $user_update = $this->User_model->updateUser($form_data, $user_id); 
            if( $user_update !=-1)
            {
                $data['result'] = 'Password changed successfully. Please login again';
                $data['redirect'] = BASE_URL_ADMIN.'Dashboard/logout';
                $data['status']   = 'passed';
            }
            else
            {
                $data['result'] = array("resp" => $user_update);                    
                $data['status'] = 'failed';           
            }
        }
        echo json_encode($data);       
    }




}
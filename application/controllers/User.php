<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
    public function __construct(){
        parent::__construct();
        /*if( !$this->is_user_loggedIn() )
        {
            redirect(base_url()); 
        }*/
        $this->load->library('form_validation');
        $this->load->model('User_model');  
        $this->load->model('Login_model');  
        $this->load->model('Product_model');  
 	}

    //register user and mail account activation link
    public function signUp() 
    {
        /*$this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z\s]+$/]',
            array('regex_match' => 'Enter only alphabets'));
        $this->form_validation->set_rules('mname', 'Middle Name', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z\s]+$/]',
            array('regex_match' => 'Enter only alphabets'));
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z\s]+$/]',
            array('regex_match' => 'Enter only alphabets'));
        $this->form_validation->set_rules('mob', 'Mobile No', 'trim|required|exact_length[10]|integer');*/
        $this->form_validation->set_rules('userMail', 'Email ID', 'trim|required|max_length[100]|callback_email_check|is_unique[users.email]', array('is_unique' => 'This %s is already registered.'));
        $this->form_validation->set_rules('pwd', 'Password', 'trim|required|regex_match[/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,20}$/]',
            array('regex_match' => 'Password is not matching the rules.'));   
        $this->form_validation->set_rules('cnfPwd', 'Confirm Password', 'trim|required|matches[pwd]');
        $this->form_validation->set_rules('captcha', 'Captcha box', 'trim|required');
        
        if(!$this->input->post('agree')){
            $this->form_validation->set_rules('agree', 'Terms & Privacy', 'trim|required');
        }
        if ($this->form_validation->run() == FALSE)
        {      
            $data['result'] = $this->form_validation->error_array();            
            $data['status']   = 'failed';
        }
        elseif($this->session->userdata('ses_captcha') != $this->input->post('captcha') )
        {
            $data['result'] = array('captcha' => 'Please enter valid captcha code');            
            $data['status']   = 'failed';
        }
        else
        {    
            $this->session->unset_userdata('ses_captcha');   
            if (file_exists(FCPATH."assets/captcha/images/".$this->session->userdata('ses_captcha_file')))
            {
                unlink(FCPATH."assets/captcha/images/".$this->session->userdata('ses_captcha_file'));
                $this->session->unset_userdata('ses_captcha_file');
            }
            /*$fname = ucwords(strtolower($this->input->post('fname')));
            $mname = ucwords(strtolower($this->input->post('mname')));
            $lname = ucwords(strtolower($this->input->post('lname')));*/
            $userMail = $this->input->post('userMail');
            //$userMob = $this->input->post('mob');
            $userPass = password_hash($this->input->post('pwd'),PASSWORD_DEFAULT);
            $token = openssl_random_pseudo_bytes(16);
            $token = bin2hex($token); //random token
            $Date = date('Y-m-d h:i:s');
            $exp_date = date('Y-m-d h:i:s', strtotime($Date. ' + 2 days'));        
    
            $user_data = array(
                /*'first_name' =>  $fname,                    
                'middle_name'  =>  $mname,
                'last_name'  =>  $lname,*/
                'email'      =>  $userMail,
                'password'   =>  $userPass,         
                'status'     =>  0,
                'is_verified' => 0,
                'password_token' => $token,
                'token_expires'  => $exp_date,
                'user_type'  =>  2,              
            );
            
            $insert = $this->User_model->addNewUser($user_data);
            if($insert)
            {
                $reset_url = base_url('User/activateAccount/').$insert.'/'.$token;    
                //send email to reset password
                /*$this->email->from('info@qasmiherbal.com', 'QrKaro Admin');
                $this->email->to($userMail);
                $this->email->subject('[QrKaro] member registration password reset');
                $message = '<html><head><title>Password Reset Link</title></head>
                <body>
                    <h3 style="color:green">Dear '.$fname.',</h3>
                    <p>You are successfully registered in QrKaro portal. Please click on the below given link to reset your password.</p>
                    <h5>Please note, the above link is valid only for 2 days and can be used to Reset the password only once.</h5>
                    <div><p><a href="'.$insert.'" target="_blank" title="Click to reset your password!">Reset Your Password</a></p><br /><br /><hr /></div>
                    <h4>Regards</h4>
                    <h3 style="color:blue;">QrKaro Portal</h3>
                </body></html>';
                $this->email->message($message);
                $this->email->set_mailtype('html');
                $this->email->send();*/
            
                $data['result'] = 'Registration done successfully!. Please check your mail to activate the account.';
                $data['redirect']  = base_url();
                $data['status']   = 'passed';   
            }
            else
            {
                $data['result'] =   array("resp" => $insert);
                $data['status']   = 'failed';   
            }
        }
        echo json_encode($data);
    }    
    //Activate Account after registration
    public function activateAccount()
    {
        $userId = $this->uri->segment(3);
        $token = $this->uri->segment(4);
        //check if $token is matching & not expired
        $dbToken = $this->User_model->chkTokenExist($userId,$token);
        $dbMail =  $dbToken ? $dbToken->email : null;
        
        if($dbMail)
        {
            $form_data =array(
                'status'      => 1,
                'is_verified' => 1,
                'password_token' => null,
                'token_expires'  => '0000-00-00 00:00:00'
            );
            $user_update = $this->User_model->updateUser($form_data,$userId); 
            if($user_update)
            {
                $data['isValid'] ='<h4 class="text-success">Congrats! Your account is activated.</h4>
                <p class="text-info">You can now access your account.</p>';
            }
            else
            {
                $data['isValid'] = '<p class="text-danger">Sorry!, there was some problem in account activation</p>
                <p class="text-info">Please contact site administrator.</p>';
            }
            $data['title'] = 'Account Activation';
            $this->load->view('admin/templates/top_header', $data);
            $this->load->view('templates/menu',$data);
            $this->load->view('accountActivation', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $data['inValid'] = 1;
            $data['title'] = 'Account Activation';
            $this->load->view('admin/templates/top_header', $data);
            $this->load->view('templates/menu',$data);
            $this->load->view('accountActivation', $data);
            $this->load->view('templates/footer');
        }
    }
    //user login here
    public function signIn()
    {
        $this->form_validation->set_rules('userMail', 'Email ID', 'trim|required|callback_email_check');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required');
        if ($this->form_validation->run() == false)
        {
            $data['result'] = $this->form_validation->error_array();          
            $data['status']   = 'failed';
        }
        else
        {
            $this->session->unset_userdata('ses_captcha');   
            if (file_exists(FCPATH."assets/captcha/images/".$this->session->userdata('ses_captcha_file')))
            {
                unlink(FCPATH."assets/captcha/images/".$this->session->userdata('ses_captcha_file'));
                $this->session->unset_userdata('ses_captcha_file');
            }
            $usermail = $this->input->post('userMail');
            $pass = $this->input->post('pass');
            $user_exist = $this->Login_model->check_user($usermail, $pass); 
            if( is_object($user_exist[0]) )
            {
                $sessionArray = array(
                    'user_id'  => $user_exist[0]->id,
                    'username' => $user_exist[0]->email,
                    'userType' => $user_exist[0]->user_type,
                    'isUserLogin' => TRUE );
                $this->session->set_userdata($sessionArray);
                $data['result'] = 'Logged in successfully...';
                $data['redirect'] = base_url('User/dashboard/').substr(md5($this->session->userdata('user_id')), 0, 15);
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
    //show user dashboard if login success
    public function dashboard($custId)
    {
        if( !$this->is_user_loggedIn() )
        {
            redirect(base_url()); 
        }
        $data['title'] = 'Dashboard';
        $data['page']   = 'signed';
        //get docuemnt count by status
        $data['userDocs'] = $this->User_model->getUserDocs($this->session->userdata('user_id'), $groupBy=1);
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('templates/menu',$data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
    //Get all documents of a particular status
    public function docListByStatus()
    {
        $status = $this->input->post('status');
        $data['docList'] = $this->User_model->getUserDocs($this->session->userdata('user_id'),null,$status);
        echo json_encode($data);       
    }
    //send Reset password link on forgot password 
    public function mailPasswordReset()
    {
        $this->form_validation->set_rules('userMail', 'Email ID', 'trim|required|callback_email_check');
        if ($this->form_validation->run() == false)
        {
            $data['result'] = $this->form_validation->error_array();          
            $data['status']   = 'failed';
        }
        else
        {
            $this->session->unset_userdata('ses_captcha');   
            if (file_exists(FCPATH."assets/captcha/images/".$this->session->userdata('ses_captcha_file')))
            {
                unlink(FCPATH."assets/captcha/images/".$this->session->userdata('ses_captcha_file'));
                $this->session->unset_userdata('ses_captcha_file');
            }
            $usermail = $this->input->post('userMail');
            $user_exist = $this->Login_model->check_userMail_exist($usermail); 
            if( isset($user_exist['success']) )
            {
                $data['result'] = 'Password reset link is sent to your email.';
                $data['redirect'] = base_url();
                $data['status']   = 'passed';
            }
            else
            {
                $data['result'] = array("userMail" => $user_exist['error']);                    
                $data['status'] = 'failed';           
            }
        }
        echo json_encode($data);
    }
    //show reset password form
    public function resetPassword()
    {
        $userId = $this->uri->segment(3);
        $token = $this->uri->segment(4);
        //check if $token is matching & not expired
        $dbToken = $this->User_model->chkTokenExist($userId,$token,'reset Password');
        $dbMail =  $dbToken ? $dbToken->email : null;
        $data['isValid'] = $dbToken ? 1:0;
        $data['title'] = 'Password Reset';
        $this->session->set_userdata('tmpMail', $dbMail);
        $this->session->set_userdata('tmpUserId', $userId);
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('templates/menu',$data);
        $this->load->view('resetPasswordFrm', $data);
        $this->load->view('templates/footer');
    }

    //save password when forgot
    public function savePassword()
    {
        $this->form_validation->set_rules('newPwd', 'New Password', 'trim|required|callback_password_check');
        $this->form_validation->set_rules('cnfPwd', 'Confirm Password', 'trim|required|matches[newPwd]');

        if ($this->form_validation->run() == false)
        {
            $data['result'] = $this->form_validation->error_array();          
            $data['status']   = 'failed';
        }
        else
        {
            $newPwd = password_hash($this->input->post('newPwd'),PASSWORD_DEFAULT);
            $user_mail = $this->session->userdata('tmpMail');
            $tmpUserId = $this->session->userdata('tmpUserId');
            $form_data =array('password'   => $newPwd);
            $user_update = $this->User_model->updateUser($form_data,$tmpUserId); 
          
            if( $user_update !=-1)
            {
                $this->session->unset_userdata($tmpUserId);
                $data['result'] = 'Password reset successfully. Please login with your new password';
                $data['redirect'] = base_url();
                $data['status']   = 'passed';
                //send password reset succeess mail
            }
            else
            {
                $data['result'] = array("data" => $user_update);                    
                $data['status'] = 'failed';           
            }
        }
        echo json_encode($data);       
    }

    // save uploaded file
    public function saveDocument()
    {
        if( !$this->is_user_loggedIn() )
        {
            redirect(base_url()); 
        }
        $this->form_validation->set_rules('docName', 'Document Name', 'trim|required|min_length[2]|max_length[400]|regex_match[/^[a-zA-Z0-9\s]+$/]',
            array('regex_match' => 'Only alphabets and numbers are allowed'));

        $config['upload_path'] = './assets/img/userDoc/';
        $config['allowed_types'] = 'jpeg|jpg|png|JPEG|JPG|PNG|pdf|PDF';
        $config['max_size']     =      1100;
        
        $imgPath = 'assets/img/userDoc/';
        $this->load->library('upload', $config);  
        $this->upload->initialize($config);

        if ($this->form_validation->run() == FALSE)
        {      
            $data['result'] = $this->form_validation->error_array();            
            $data['status']   = 'failed';
        }      
        elseif ( ! $this->upload->do_upload('userDoc'))
        {
            $data['result'] = array('userDoc' => $this->upload->display_errors('', '') );
            $data['status']   = 'failed';              
        }
        else
        {
            $docName = ucwords(strtolower($this->input->post('docName')));
            $pic  = $imgPath.$this->upload->data('file_name');
            
            $user_data = array(
                'documentName' =>  $docName,                    
                'document_path'  =>  $pic,
                'uploaded_user_id'     =>  $this->session->userdata('user_id'),
                'status'           => 'Inprogress',
            );
            
            $insert = $this->User_model->saveUserDoc($user_data);  
            if($insert > 0)
            {
                $data['result'] = 'Document uploaded successfully.';
                $data['redirect']  = base_url('User/listDocument/').substr(md5($this->session->userdata('user_id')), 0, 15);
                $data['status']   = 'passed';   
            }
            else
            {
                $data['result'] =   array('data' => $insert);
                $data['status']   = 'failed';   
            }                           
        }
        echo json_encode($data);
    }

    //show user uploaded ALL documents
    public function listDocument($custId)
    {
        if( !$this->is_user_loggedIn() )
        {
            redirect(base_url()); 
        }
        $data['title'] = 'User Documents';
        $data['page']   = 'signed';
        $data['docs'] = $this->User_model->getUserDocs($this->session->userdata('user_id'));
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('templates/menu',$data);
        $this->load->view('document_list', $data);
        $this->load->view('templates/footer');
    }

    //show profile edit page
    public function editProfile()
    {
        if( !$this->is_user_loggedIn() )
        {
            redirect(base_url()); 
        }
        $data = array(
            'title' => 'My Profile',
            'page' => 'signed',
            'username' => $this->session->userdata('username'),
            'userData' => $this->User_model->getUserData($this->session->userdata('user_id'))
        );
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('templates/menu', $data);      
        $this->load->view('profile_edit', $data);
        $this->load->view('templates/footer');
    }

    public function saveProfile()
    {
        if( !$this->is_user_loggedIn() )
        {
            redirect(base_url()); 
        }
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
            $user_id = $this->session->userdata('user_id');
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
                $data['redirect'] = base_url('User/dashboard/').substr(md5($user_id), 0,15);
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

    //show password change form
    public function changePassword()
    {
        if( !$this->is_user_loggedIn() )
        {
            redirect(base_url()); 
        }
        $data = array(
            'title' => 'My Profile',
            'page' => 'signed',
            'username' => $this->session->userdata('username'),
        );
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('templates/menu', $data);      
        $this->load->view('password_change', $data);
        $this->load->view('templates/footer');
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
        elseif($this->session->userdata('user_id') )
        {
            $query = $this->db->select('password')->from('users')->where(array('id' => $this->session->userdata('user_id')))->get()->row();
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
    public function savePasswordChange()
    {
        if( !$this->is_user_loggedIn() )
        {
            redirect(base_url()); 
        }
        $this->form_validation->set_rules('crntPwd', 'Current Password', 'trim|required|callback_chkCrntPass');
        $this->form_validation->set_rules('newPwd', 'New Password', 'trim|required|callback_password_check');
        $this->form_validation->set_rules('cnfPwd', 'Confirm Password', 'trim|required|matches[newPwd]');

        if ($this->form_validation->run() == false)
        {
            $data['result'] = $this->form_validation->error_array();          
            $data['status']   = 'failed';
        }
        else
        {
            $newPwd = password_hash($this->input->post('newPwd'),PASSWORD_DEFAULT);
            $user_id = $this->session->userdata('user_id');
            $form_data =array('password'   => $newPwd);
            $user_update = $this->User_model->updateUser($form_data, $user_id); 
            if( $user_update !=-1)
            {
                $data['result'] = 'Password changed successfully. Please login again';
                $data['redirect'] = base_url('User/logout');
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

    //show product page with buy now option
    public function PayNow($custId)
    {
        $data['title'] = 'Purchase Certificate';
        $data['page']   = 'document';
        $data['Certificates'] = $this->Product_model->getActiveCertificates();
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('templates/menu',$data);
        $this->load->view('user_payment', $data);
        $this->load->view('templates/footer');
    }






    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    } 

}
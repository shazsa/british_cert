<?php

class Login_model extends CI_Model {
	/* Check admin and other users login */
	public function check_user($uname, $pass)
	{        
		$this->db->select('id,first_name, email, password,status,user_type');
		$this->db->from('users');
	    $this->db->where(array('email' => $uname));
		$query = $this->db->get()->row();
        $resp = array();
	    if($query !== null)
        {
            if($query->status == 0)
            {
                $resp[] = 'Your account is blocked!';
            }
        	elseif (password_verify($pass, $query->password))
        	{
                $resp[] = $query; //if password also matching, return user array	
        	}
            else
            {
                $resp[] = 'Email address & password is not matching';
        	}       	
    	}
    	else
        {
            $resp[] = 'Sorry! This user does not exist!';
    	}
        return $resp;
    }

    //chek email for password reset link
    public function check_userMail_exist($email)
    {        
        $this->db->select('id, status, is_verified');
        $this->db->from('users')->where(array('email' => $email));
        $user = $this->db->get()->row();  
        $resp = array();   
        if($user !== null)
        {
            if($user->status == 0)
            {
                $resp['error'] = 'Sorry! Your account is blocked. Please contact administrator';
            }
            elseif($user->is_verified==0)
            {
                $resp['error'] = 'Sorry!, your account is NOT verified. Please activate your account';
            }
            else{
                $token = openssl_random_pseudo_bytes(16);
                $token = bin2hex($token); //random token
                $Date = date('Y-m-d h:i:s');
                $exp_date = date('Y-m-d h:i:s', strtotime($Date. ' + 2 days'));
                $this->db->set(array('password_token' => $token, 'token_expires' => $exp_date));
                $this->db->where('email', $email);
                $this->db->update('users');
                // set reset password link
                $reset_url = base_url('User/resetPassword/').$user->id.'/'.$token;            
                $resp['success'] = $reset_url;
            }
        }
        else
        {
            $resp['error'] = 'Sorry!, This Email address is not registered with us';
        }
        return $resp;
    }
}
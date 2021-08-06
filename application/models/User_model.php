<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {
    
    public function addNewUser($data)
    {
        $this->db->insert('users', $data);        
        return $this->db->insert_id();       
    }
    //get all data of auser by auto ID
    public function getUserData($userId)
    {
        $this->db->from('users');
        $this->db->where('id',$userId);
        return $this->db->get()->row(); 
    }   
    public function updateUser($user_data, $userId)
    {
        $this->db->set($user_data)->where('id', $userId)->update('users');
        return $this->db->affected_rows();
    } 
    // validate password reset token in db
    //action=NULL for new account activation
    public function chkTokenExist($userId, $token,$action=null)
    {
        $time = date('Y-m-d h:i:s');
        if($action)
        {
            $tkn = $this->db->select('email')->from('users')->where(array('id'=>$userId, 'is_verified'=>1, 'password_token' => $token, 'token_expires >' => $time ) )->get()->row();
        }
        else
        {
            $tkn = $this->db->select('email')->from('users')->where(array('id'=>$userId, 'is_verified'=>0, 'password_token' => $token, 'token_expires >' => $time ) )->get()->row();
        }
        if( $tkn !== null)
        {
            return $tkn;
        }
        else
        {
            return 0;
        }
    }   
    
    public function saveUserDoc($data)
    {
        $this->db->insert('user_documents', $data);        
        return $this->db->insert_id();       
    }
    
    public function getUserDocs($userId, $groupBy = null, $whereStatus=null)
    {
        if($groupBy)
        {
            $this->db->select('count(id) as total,status')->where('uploaded_user_id',$userId);
            return $this->db->group_by('status')->get('user_documents');    
        }
        if($whereStatus)
        {
            return $this->db->from('user_documents')->where(array('uploaded_user_id'=>$userId, 'status'=>$whereStatus))->get()->result_array();  
        }        
        $this->db->from('user_documents');
        return $this->db->where('uploaded_user_id',$userId)->get();    
    }
    public function deleteUser($userId)
    {
        $this->db->delete('users', array('id' => $userId));
        //return array($this->db->affected_rows(), $this->db->error());
        return $this->db->affected_rows();
    }  
}
?>
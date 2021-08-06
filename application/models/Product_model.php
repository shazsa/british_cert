<?php

class Product_model extends CI_Model {

    public function addCertificate($data)
    {
        $this->db->insert('certificates', $data);
        return $this->db->insert_id();        
    }
    public function getAllCertificates()
    {
        return $this->db->get('certificates');
    }
    //front end call
    public function getActiveCertificates()
    {
        return $this->db->get_where('certificates', array('status' => 1));
    }  
    public function getCertificate($certificateId, $page_slug=null)
    {
        if($certificateId)
        {
            return $this->db->from('certificates')->where('id', $certificateId)->get()->row(); 
        }
        return $this->db->from('certificates')->where('page_slug', $page_slug)->get()->row(); 
    }

    public function deleteCertificate($certificateId)
    {
        $this->db->delete('certificates', array('id' => $certificateId));
        //return array($this->db->affected_rows(), $this->db->error());
        return $this->db->affected_rows();
    }
    public function updateCertificate($user_data, $certificateId)
    {            
        $this->db->where('id', $certificateId);
        $this->db->update('certificates', $user_data);
        return $this->db->affected_rows();
    }

    public function matchingCertificates()
    {
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit(4);
        return $this->db->get_where('certificates', array('status' => 1) );
    } 

}












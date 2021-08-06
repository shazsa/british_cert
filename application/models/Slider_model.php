<?php

class Slider_model extends CI_Model {

    public function addSlider($data)
    {
        $this->db->insert('sliders', $data);
        return $this->db->insert_id();        
    }
    public function getAllSlider()
    {
        return $this->db->get('sliders');
    }
    //front end call
    public function getActiveSlider()
    {
        return $this->db->get_where('sliders', array('status' => 1));
    }  
    public function getSlider($sliderId)
    {
        return $this->db->from('sliders')->where('id', $sliderId)->get()->row(); 
    }

    public function deleteSlider($sliderId)
    {
        $this->db->delete('sliders', array('id' => $sliderId));
        //return array($this->db->affected_rows(), $this->db->error());
        return $this->db->affected_rows();
    }
    public function updateSlider($user_data, $sliderId)
    {            
        $this->db->where('id', $sliderId);
        $this->db->update('sliders', $user_data);
        return $this->db->affected_rows();
    }

}












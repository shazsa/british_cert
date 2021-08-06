<?php

class Notify_model extends CI_Model {


    public function getNewDocs()
    { 
        return $this->db->get_where('user_documents', array('status' => 'Inprogress'))->num_rows();   
    }

    public function getAllDealers()
    {
        $this->db->select('dealer.id,dName,dBanner,mobile,brandIds,dealer_status,added_on,brandtable.brandName');
        $this->db->join('brandtable', 'dealer.brandIds=brandtable.id','inner');
        return $this->db->get('dealer');
    }  
    public function getAllBrands()
    {
        return $this->db->select('id,brandName')->get_where('brandtable', array('brandStatus' => 1));
        //echo $this->db->select('id,brandName')->where(array('brandStatus' => 1))->get_compiled_select('brandtable');
    }

    public function dealerById($dealerId)
    {
        return $this->db->select('dealer.*,dealeraddress.*, dealer.id as dealerId')->join('dealeraddress','dealer.id=dealeraddress.dealerId','inner')->where('dealer.id', $dealerId)->get('dealer');
    }    

    public function delete_dealer($sliderId)
    {
        $this->db->delete('dealer', array('id' => $sliderId));
        $this->db->delete('dealeraddress', array('dealerId' => $sliderId));
        return $this->db->affected_rows();
    }
    public function updateDealer($user_data, $sliderId)
    {            
        $this->db->where('id', $sliderId);
        $this->db->update('dealer', $user_data);
        return $this->db->affected_rows();
    } 
    public function updateDealerAdds($user_data, $sliderId)
    {            
        $this->db->where('dealerId', $sliderId);
        $this->db->update('dealeraddress', $user_data);
        return $this->db->affected_rows();
    } 

}












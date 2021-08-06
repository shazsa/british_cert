<?php
class Document_model extends CI_Model {
    public function getAllDocs()
    { 
        return $this->db->select('user_documents.*,users.email')->order_by('uploaded_date', 'DESC')->join('users','users.id=user_documents.uploaded_user_id','inner')->get('user_documents');   
    }
    public function getDocById($docId)
    {
        return $this->db->get_where('user_documents', array('id' => $docId))->row();
    } 
    public function docRejApprove($doc_data, $doc_id)
    {
        $this->db->where('id', $doc_id);
        $this->db->update('user_documents', $doc_data);
        return $this->db->affected_rows();
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












<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends MY_Controller {
    public function __construct(){
        parent::__construct();
        if( !$this->is_logged_in() )
        {
            redirect(BASE_URL_ADMIN); 
        }
        $this->load->library('form_validation');
        $this->load->model('Document_model');  
 	}
 	//show documents of all users
 	public function listAll()
    {
        $data['title'] = 'User Documents';
        $data['page']   = 'docs';
        $data['docs'] = $this->Document_model->getAllDocs();
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/document_list', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }
    //show document reject/ approve form
    public function edit($docId)
    {
        $data['title'] = 'User Document';
        $data['page']   = 'docs';
        $data['document'] = $this->Document_model->getDocById($docId);
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/document_edit', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }
    //reject or approve document
    public function docRejApprove()
    {
        $this->form_validation->set_rules('docSts', 'Document Status', 'trim|required');
        if( $this->input->post('docSts')=='Rejected')
        {
            $this->form_validation->set_rules('rejRsn', 'Reject Reason', 'trim|required|regex_match[/^[a-zA-Z\s]+$/]',array('regex_match' => 'Please enter alphabets and numbers only'));
        }
        if ($this->form_validation->run() == false)
        {
            $data['result'] = $this->form_validation->error_array();          
            $data['status']   = 'failed';
        }
        else
        {
            $docSts = $this->input->post('docSts');
            $rejRsn = $this->input->post('rejRsn')?:null;
            $doc_id = $this->input->post('doc_id');
            $form_data =array(
                'status' => $docSts,
                'reason'  => $rejRsn,
            );

            $user_update = $this->Document_model->docRejApprove($form_data, $doc_id); 
            if( $user_update != -1)
            {
                $data['result'] = 'Document status changed successfully.';
                $data['redirect'] = BASE_URL_ADMIN.'Document/listAll';
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
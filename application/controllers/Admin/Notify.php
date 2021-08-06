<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notify extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Notify_model');  
 	}
 	//show new uploaded documents count
 	public function newDocuments()
    {
        $data['docCount'] = $this->Notify_model->getNewDocs();
        echo json_encode($data);
    }

}
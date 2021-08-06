<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {
    public function __construct(){
        parent::__construct();
        if( !$this->is_logged_in() )
        {
            redirect(BASE_URL_ADMIN); 
        }
        $this->load->library('form_validation');
        $this->load->model('Product_model');  
 	}
 
    //show add product form
    public function addProduct()
    {        
        $data['title'] = 'Add Certificate';
        $data['page'] = 'product';
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/product_add', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }

    //save product
    public function save_product() 
    {
        $this->form_validation->set_rules('sTitle', 'Certificate Name', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9"(\,)\s\_\?\-\.\:\@\&]+$/]',
            array('regex_match' => 'Enter only alphabets and space'));

        $this->form_validation->set_rules('price', 'Certificate Price', 'trim|required|numeric');
        $this->form_validation->set_rules('ofrPrice', 'Offer Price', 'trim|numeric');

        $this->form_validation->set_rules('sDesc', 'Short Description', 'trim|required|min_length[2]|max_length[300]|regex_match[/^[a-zA-Z0-9\s\,"()\.\-\?\_\&\:\@]+$/]',
            array('regex_match' => 'Enter only alphabets, numbers and space'));
        $this->form_validation->set_rules('lDesc', 'Long Description', 'trim|required|min_length[2]');

        $config['upload_path'] = './assets/img/products/';
        $config['allowed_types'] = 'jpeg|jpg|png|JPEG|JPG|PNG';
        $config['max_size']     =      500;
        $config['max_width']  =  800;
        $config['max_height'] =  1200;
        
        $imgPath = 'assets/img/products/';
        $this->load->library('upload', $config);  
        $this->upload->initialize($config);
        $user_data = array(); 

        $sTitle = $this->input->post('sTitle');
        $page_slug = preg_replace("/[^a-zA-Z0-9_()]/", "_", $sTitle);
        $price = $this->input->post('price');
        $ofrPrice = $this->input->post('ofrPrice');
        $sDesc = $this->input->post('sDesc');
        $lDesc = $this->input->post('lDesc');
       
        if ($this->form_validation->run() == FALSE)
        {      
            $data['result'] = $this->form_validation->error_array();            
            $data['status']   = 'failed';
        }
        else
        {
            if($_FILES['sliderPic']['error'] == 4) //no file uploaded
            {
                $user_data = array(
                    'certificate_name' =>  $sTitle,
                    'page_slug' =>  $page_slug, 
                    'certificate_price'    =>  $price,
                    'offer_price'    =>  $ofrPrice,
                    'short_desc'    =>  $sDesc,
                    'long_desc'    =>  $lDesc,
                    'status'         => 1,
                );
            }
            else    //new brand pic uploaded
            {        
                if ( ! $this->upload->do_upload('sliderPic'))
                {
                    if($_FILES['sliderPic']['error'] != 4)
                    {                       
                        $data['result'] = array('sliderPic' =>$this->upload->display_errors('', ''));
                        $data['status']   = 'failed';              
                    }
                    echo json_encode($data);
                    exit();
                }
                else
                {
                    $user_data = array(
                        'certificate_name' =>  $sTitle,
                        'page_slug' =>  $page_slug, 
                        'certificate_price'    =>  $price,
                        'offer_price'    =>  $ofrPrice,
                        'short_desc'    =>  $sDesc,
                        'long_desc'    =>  $lDesc,
                        'certificate_image' => $imgPath.$this->upload->data('file_name'),
                        'status'         => 1,
                    );                    
                }               
            }   
            $insert = $this->Product_model->addCertificate($user_data);  
            if($insert > 0)
            {
                $data['result'] = 'Certificate added successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'Product/listProduct/';
                $data['status']   = 'passed';   
            }
            else
            {
                $data['result'] =   array('resp' => $insert);
                $data['status']   = 'failed';   
            }
        }
        echo json_encode($data);        
    }   

    //show list of all certificates
    public function listProduct()
    {
        $data['title'] = 'Edit Certificate';
        $data['page'] = 'product';
        $data['sliders'] = $this->Product_model->getAllCertificates();
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/product_list', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }
    //show certificate edit page
    public function edit($certificateId)
    {                   
        //echo strlen('');
        $data['title'] = 'Edit Certificate';
        $data['page'] = 'product';           
        $data['slider'] = $this->Product_model->getCertificate($certificateId);
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/product_edit', $data);        
        $this->load->view('admin/templates/top_footer');       
        $this->load->view('admin/templates/footer');       
    }
    //update certificate changes
    public function update_certificate()
    {
        $this->form_validation->set_rules('sTitle', 'Certificate Name', 'trim|required|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9"(\,)\s\_\?\-\.\:\@\&]+$/]',
            array('regex_match' => 'Enter only alphabets and space'));

        $this->form_validation->set_rules('price', 'Certificate Price', 'trim|required|numeric');
        $this->form_validation->set_rules('ofrPrice', 'Offer Price', 'trim|numeric');

        $this->form_validation->set_rules('sDesc', 'Short Description', 'trim|required|min_length[2]|max_length[300]|regex_match[/^[a-zA-Z0-9\s\,"()\.\-\?\_\&\:\@]+$/]',
            array('regex_match' => 'Enter only alphabets, numbers and space'));
        $this->form_validation->set_rules('lDesc', 'Long Description', 'trim|required|min_length[2]');

        $config['upload_path'] = './assets/img/products/';
        $config['allowed_types'] = 'jpeg|jpg|png|JPEG|JPG|PNG';
        $config['max_size']     =      500;
        $config['max_width']  =  800;
        $config['max_height'] =  1200;
        
        $imgPath = 'assets/img/products/';
        $this->load->library('upload', $config);  
        $this->upload->initialize($config);
        $user_data = array(); 

        $sTitle = $this->input->post('sTitle');
        $page_slug = preg_replace("/[^a-zA-Z0-9_()]/", "_", $sTitle);
        $price = $this->input->post('price');
        $ofrPrice = $this->input->post('ofrPrice');
        $sDesc = $this->input->post('sDesc');
        $lDesc = $this->input->post('lDesc');
        $status = $this->input->post('status');
        $slider_id = $this->input->post('slider_id');
        $slider_img = $this->input->post('slider_img');
        $imgDelete = FCPATH.$slider_img; 
        if ($this->form_validation->run() == FALSE)
        {      
            $data['result'] = $this->form_validation->error_array();            
            $data['status']   = 'failed';
        }

        elseif($status == 'delete')
        {
            $insert = $this->Product_model->deleteCertificate($slider_id); 
            if($insert > 0 )
            {
                if($slider_img && file_exists($imgDelete))
                {
                    unlink($imgDelete);
                }
                $data['result'] = 'Certificate Deleted successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'Product/listProduct/';
                $data['status']   = 'passed';   
            }
            else
            {
                $data['result'] =   array('resp' => $insert);
                $data['status']   = 'failed';   
            }
        }

        else    //else edit data
        {
            $banner_data = array();     
            if($_FILES['sliderPic']['error'] == 4) //no file uploaded
            {
                $banner_data = array(
                    'certificate_name' =>  $sTitle,                    
                    'page_slug' =>  $page_slug,                    
                    'certificate_price'  =>  $price,
                    'offer_price'  =>  $ofrPrice,
                    'short_desc'      => $sDesc,
                    'long_desc'      => $lDesc,
                    'status'         => $status,
                );
            }
            else    //new brand pic uploaded
            {        
                if ( ! $this->upload->do_upload('sliderPic'))
                {
                    if($_FILES['sliderPic']['error'] != 4)
                    {                       
                        $data['result'] = array('sliderPic' =>$this->upload->display_errors('', ''));
                        $data['status']   = 'failed';              
                    }
                    echo json_encode($data);
                    exit();
                }
                else
                { 
                    $banner_data = array(
                        'certificate_name' =>  $sTitle, 
                        'page_slug' =>  $page_slug,                    
                        'certificate_price'  =>  $price,
                        'offer_price'  =>  $ofrPrice,
                        'short_desc'      => $sDesc,
                        'long_desc'      => $lDesc,
                        'certificate_image' => $imgPath.$this->upload->data('file_name'),
                        'status'         => $status,
                    );
                    
                    if($slider_img && file_exists($imgDelete))
                    {
                        unlink($imgDelete);
                    }                     
                }               
            }
            $update = $this->Product_model->updateCertificate($banner_data, $slider_id);  

            if($update != -1 )
            {                                   
                $data['result'] = 'Certificate updated successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'Product/listProduct/';
                $data['status']   = 'passed';   
            }
            else
            {
                $data['result'] =   array('resp' => $update);
                $data['status']   = 'failed';   
            }
        } //else edit end
        echo json_encode($data);  
    }  

}
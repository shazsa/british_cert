<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends MY_Controller {
    public function __construct(){
        parent::__construct();
        if( !$this->is_logged_in() )
        {
            redirect(BASE_URL_ADMIN); 
        }
        $this->load->library('form_validation');
        $this->load->model('Slider_model');  
 	}
 
    //show add slider form
    public function addSlider()
    {        
        $data['title'] = 'Add Slider';
        $data['page'] = 'slider';
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/slider_add', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }

    //save slider
    public function save_slider() 
    {
        $this->form_validation->set_rules('sTitle', 'Title', 'trim|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('readMore', 'Description', 'trim|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $config['upload_path'] = './assets/img/slider/';
        $config['allowed_types'] = 'jpeg|jpg|png|JPEG|JPG|PNG';
        $config['max_size']     =      500;
        $config['max_width']  =  1350;
        $config['max_height'] =  500;
        
        $imgPath = 'assets/img/slider/';
        $this->load->library('upload', $config);  
        $this->upload->initialize($config);

        if ($this->form_validation->run() == FALSE)
        {      
            $data['result'] = $this->form_validation->error_array();            
            $data['status']   = 'failed';
        }      
        elseif ( ! $this->upload->do_upload('sliderPic'))
        {
            $data['result'] = array('sliderPic' => $this->upload->display_errors('', '') );
            $data['status']   = 'failed';              
        }
        else
        {
            $sTitle = $this->input->post('sTitle');
            $readMore = ucwords(strtolower($this->input->post('readMore')));
            $pic  = $imgPath.$this->upload->data('file_name');
            
            $user_data = array(
                'heading' =>  $sTitle,                    
                'slider_detail'  =>  $readMore,
                'slider_image'    =>  $pic,
                'status'         => 1,
                'created_by'     =>  $this->session->userdata('Auser_id')     
            );
            
            $insert = $this->Slider_model->addSlider($user_data);
            if($insert > 0)
            {
                $data['result'] = 'Slider added successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'Slider/listSlider/';
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

    //show list of all sliders
    public function listSlider()
    {
        $data['title'] = 'Slider list';
        $data['page'] = 'slider';
        $data['sliders'] = $this->Slider_model->getAllSlider();
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/slider_list', $data);        
        $this->load->view('admin/templates/top_footer');
        $this->load->view('admin/templates/footer');
    }
    //show slider edit page
    public function edit($sliderId)
    {                   
        $data['title'] = 'Edit Slider';
        $data['page'] = 'slider';            
        $data['slider'] = $this->Slider_model->getSlider($sliderId);
        $this->load->view('admin/templates/top_header', $data);
        $this->load->view('admin/templates/left_menu', $data);      
        $this->load->view('admin/slider_edit', $data);        
        $this->load->view('admin/templates/top_footer');       
        $this->load->view('admin/templates/footer');       
    }
    //update slider changes
    public function update_slider()
    {
        $this->form_validation->set_rules('sTitle', 'Title', 'trim|min_length[2]|max_length[40]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric and space'));

        $this->form_validation->set_rules('readMore', 'Description', 'trim|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z0-9\s\-\_\,\:\&\.\;]+$/]',
            array('regex_match' => 'Enter only alphanumeric, numbers and space'));

        $config['upload_path'] = './assets/img/slider/';
        $config['allowed_types'] = 'jpeg|jpg|png|JPEG|JPG|PNG';
        $config['max_size']     =      500;
        $config['min_width'] = $config['max_width']  =  1350;
        $config['min_height'] = $config['max_height'] =  500;
        
        $imgPath = 'assets/img/slider/';
        $this->load->library('upload', $config);  
        $this->upload->initialize($config);

        $sTitle = $this->input->post('sTitle');
        $readMore = ucwords(strtolower($this->input->post('readMore')));
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
            $insert = $this->Slider_model->deleteSlider($slider_id); 
            if($insert > 0 )
            {
                if(file_exists($imgDelete))
                {
                    unlink($imgDelete);
                }
                $data['result'] = 'Slider Deleted successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'Slider/listSlider/';
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
                    'heading' =>  $sTitle,                    
                    'slider_detail'  =>  $readMore,
                    'status'         => $status,
                    'created_by'     =>  $this->session->userdata('Auser_id') 
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
                        'heading' =>  $sTitle,                    
                        'slider_detail'  =>  $readMore,
                        'slider_image' => $imgPath.$this->upload->data('file_name'),
                        'status'         => $status,
                        'created_by'     =>  $this->session->userdata('Auser_id'),
                    );  
                    if(file_exists($imgDelete))
                    {
                        unlink($imgDelete);
                    }                     
                }               
            }
            $update = $this->Slider_model->updateSlider($banner_data, $slider_id);
            if($update != -1 )
            {                                   
                $data['result'] = 'Slider updated successfully.';
                $data['redirect']  = BASE_URL_ADMIN.'Slider/listSlider/';
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
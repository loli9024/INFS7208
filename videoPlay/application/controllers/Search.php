<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->model('video_model');
            $this->load->model('user_model');
            $this->load->library('session');
            
    }
    

    function index(){
        
        $search=$this->input->get('search');
        $videos=$this->video_model->searchVideos($search);
        

        
        $data['titleHeader']=sizeof($videos) . " results found";
        if(get_cookie('userLoggedIn')){
            $subscriptions=$this->user_model->getSubscriptions(get_cookie('userLoggedIn'));
            $this->session->set_userdata('subscriptions',$subscriptions);
            $notification=$this->video_model->getNotification(get_cookie('userLoggedIn'));
            $this->session->set_userdata('notification',$notification);
                            
            
            $data['userLogged']=get_cookie('userLoggedIn');
            $this->load->view('templates/headerLogged',$data);
        }
		else{
			$this->load->view('templates/header');
		}
        $this->load->view('templates/headerSearch',$data);
		
		foreach ($videos as $video){
            $this->load->view('search',$video);
        } 
        $this->load->view('templates/footerSearch');
        $this->load->view('templates/footer');
    }

    function fetch()
    {
    echo $this->video_model->fetch_data($this->uri->segment(3));
    }


    
    
}

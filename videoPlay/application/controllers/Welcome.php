<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	protected $_enable_log_output = TRUE;

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
            parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('session');
			$this->load->model('video_model');
			$this->load->model('user_model');
            
    }

	public function index()
	{

		$this->load->database();
		$option=$this->input->get('option');
		if($option==2){
			$videos=$this->video_model->getVideosLiked(get_cookie('userLoggedIn'));
		}else if($option==3){
			$videos=$this->video_model->getVideosSubscription(get_cookie('userLoggedIn'));
		}else if($option==4){

			$videos=$this->video_model->getVideosHistory(get_cookie('userLoggedIn'));
		}
		else{
			$videos=$this->video_model->getAllVideos();
		}
		
		if($this->session->userdata('username')){

			$notification=$this->video_model->getNotification(get_cookie('userLoggedIn'));
            $this->session->set_userdata('notification',$notification);        
			$data['userLogged']=get_cookie('userLoggedIn');
			$data['subscriptions']=$this->user_model->getSubscriptions(get_cookie('userLoggedIn'));
			$this->load->view('templates/headerLogged',$data);
		}
		else{
			$this->load->view('templates/header');
		}
		
		
		if(sizeof($videos)==0){
			$data["titleHeader"]="We did not find any video";
			$this->load->view('templates/headerSearch',$data);
			$this->load->view('templates/footerSearch');

		}
		else{
			$this->load->view('templates/gridVideo');
			foreach ($videos as $data){
				$this->load->view('index',$data);
			}
			$this->load->view('templates/footerGridVideo');
		}
		
		$this->load->view('templates/footer');
	}

	public function logout(){
		
		session_destroy();
		delete_cookie("userLoggedIn");
		redirect("welcome");
	}
}

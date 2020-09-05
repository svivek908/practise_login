<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        // ob_start(); # add this
        $this->load->helper('url');
        // $this->load->library('session');
        // $this->load->database();
        // $this->load->library('form_validation');
        // $this->load->library('javascript');
         $this->load->model('User_model');
        
    }
	public function index()
	{
		$this->load->view('login');
	}
	public function registration_page()
	{
		$this->load->view('registration');
	}
	public function dashboard_page()
	{	
		//echo $this->isUserLoggedIn();die;
		if ($this->isUserLoggedIn()) {
			$value = $this->session->userdata('email');
		$this->load->view('dashboard');
		} else {
            redirect("/");
        }
	}
	public function register()
	{
		$data=array('name'=>$this->input->post('name'),
					'email'=>$this->input->post('email'),
					'password'=>md5($this->input->post('password')));
		$result=$this->User_model->insert('registration',$data);
		if ($result) {
			redirect('/');
		}else{
			redirect('Welcome/registration_page');
		}
		
	}
	public function login_user()
	{
		
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$result_login=$this->User_model->auth($email,$password);
		if ($result_login) {
			$session_data = array(
                        'email' => $email
                    );
                    $this->session->set_userdata($session_data);
			redirect('Welcome/dashboard_page');
		}else{
			redirect('/');
		}
	}
	public function isUserLoggedIn()
    {
        
        $logged_in = $this->session->userdata('email');
        if (!empty($logged_in)) {
            return true;
        } else {
            return false;
        }
    }
    public function logout()
    {
    	//$this->session->unset_userdata('email');
        $this->session->sess_destroy('email');
        redirect("/");
    }
}

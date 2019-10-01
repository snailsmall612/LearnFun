<?php
class SignUp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	private function viewSignUpPage(){
		$data['title'] = "signUp";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/signUp');
		$this->load->view('templates/footer');
	}
	public function index(){
		$this->load->helper('form');		
		$this->load->helper('url');
		$this->viewSignUpPage();	
	}
	public function submit(){

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('account', 'Account', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('school', 'School', 'required');
		$this->form_validation->set_rules('department', 'Department', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->viewSignUpPage();
		}
		else{	
			$this->load->model('signup_model');
			$result = $this->signup_model->checkAccount();
			if(!$result){
				$this->signup_model->insert();
				$this->signUpSuccess();
			}
			else{
				$this->signUpFail();
			}
			
		}
	}
	public function checkAccount(){
		$this->load->model('signup_model');
		$result = $this->signup_model->checkAccount();
		if($result){
			echo "account_exist";
		}
		else{
			echo "account_not_exist";
		}
	}

	private function signUpSuccess(){
		$data['title'] = "signUpSuccess";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/signUpSuccess');
		$this->load->view('templates/footer');
	}

	private function signUpFail(){
		$data['title'] = "signUpFail";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/signUpFail');
		$this->load->view('templates/footer');
	}
}
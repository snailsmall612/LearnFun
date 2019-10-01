<?php
class SignIn extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
	}
	
	public function index(){
		$this->load->model('signin_model');
		$result = $this->signin_model->loginCheck();
		
		if($result){
			if ( session_status() == PHP_SESSION_NONE ) {
				session_start();
			}
			$_SESSION["userName"] = $result["name"];
			$_SESSION["user_ID"] = $result["user_ID"];
			echo "login_success";
		}
		else{
			echo "login_fail";
		}
	}
	
}
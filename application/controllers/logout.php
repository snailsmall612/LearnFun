<?php
class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
	}
	
	public function index(){
		if ( session_status() == PHP_SESSION_NONE ) {
			session_start();
		}
		session_unset();
		session_destroy();

		$this->load->helper('url');
		$url = site_url('pages/view/home');
		header("Location:$url" );
		exit;
	}
	
}
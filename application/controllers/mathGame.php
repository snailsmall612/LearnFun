<?php
class MathGame extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index($gameType = 'add_reduce'){

		$data['title'] = "mathGame";
		$data['gameType'] = $gameType;
		$this->load->helper('url');
		$this->load->view('templates/header', $data);
		$this->load->view('pages/mathGame', $data);
		$this->load->view('templates/footer');
	}

	private function insertScore(){
		$this->load->model('mathgame_model');
		$result = $this->mathgame_model->insert();
	}
	public function checkLoginStatus(){
		if ( session_status() == PHP_SESSION_NONE ) {
			session_start();
		}
		if(isset($_SESSION["user_ID"])){
			$this->insertScore();
		}
	}
}
<?php
class TypeGame extends CI_Controller {

	public function __construct()
	{
		parent::__construct();			
	}
	public function index($word_Quantity = 10){
		$this->load->model('words_model');
		if(is_numeric($word_Quantity)){
			$data['words'] = $this->words_model->get_words($word_Quantity);
			$data['word_Quantity'] = $word_Quantity;
		}
		else{
			show_404();
		}

		$data['title'] = "typeGame";
		$this->load->helper('url');
		$this->load->view('templates/header', $data);
		$this->load->view('pages/typeGame' , $data);
		$this->load->view('templates/footer');
	}
	private function insertTime(){
		$this->load->model('typegame_model');
		$result = $this->typegame_model->insert();
	}
	public function checkLoginStatus(){
		if ( session_status() == PHP_SESSION_NONE ) {
			session_start();
		}
		if(isset($_SESSION["user_ID"])){
			$this->insertTime();
		}
	}
}
<?php
class Typegame_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}
	public function insert(){
		$time = $this->input->post('time');
		$wordQuantity = $this->input->post('wordQuantity');

		if ( session_status() == PHP_SESSION_NONE ) {
			session_start();
		}
		$user_ID = $_SESSION["user_ID"];
		

		date_default_timezone_set('Asia/Taipei');
		$datetime = date("Y/m/d H:i:s");//取得年份/月/日 時:分:秒

		switch($wordQuantity){
			case 10:
				$game_ID = "1";
				break;
			case 20:
				$game_ID = "2";
				break;
			case 30:
				$game_ID = "3";
				break;
		}

		$data = array(
		   'score' => $time,
		   'user_ID' => $user_ID,
		   'game_ID' => $game_ID,
		   'date_time' => $datetime,
		   'subjectQuantity' => $wordQuantity
		);
		$this->db->insert('score_Record', $data);
	}
}
?>
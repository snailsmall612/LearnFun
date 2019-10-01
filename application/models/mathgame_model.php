<?php
class Mathgame_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}
	public function insert(){
		$score = $this->input->post('score');
		$subjectQuantity = $this->input->post('subjectQuantity');
		$gameType = $this->input->post('gameType');

		if ( session_status() == PHP_SESSION_NONE ) {
			session_start();
		}
		$user_ID = $_SESSION["user_ID"];
		

		date_default_timezone_set('Asia/Taipei');
		$datetime = date("Y/m/d H:i:s");//取得年份/月/日 時:分:秒

		
		switch($gameType){
			case "add_reduce":
				$game_ID = '4';
				break;
			case "multiply_except":
				$game_ID = '5';
				break;
			default:
				$game_ID = '6';
				break;
		}


		$data = array(
		   'score' => $score,
		   'user_ID' => $user_ID,
		   'game_ID' => $game_ID,
		   'date_time' => $datetime,
		   'subjectQuantity' => $subjectQuantity
		);
		$this->db->insert('score_Record', $data);
	}
}
?>
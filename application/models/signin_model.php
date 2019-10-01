<?php
class SignIn_model extends CI_Model {

	public function __construct(){
		$this->load->database();
		$this->load->helper('security');
	}

	public function loginCheck(){
		$account = $this->input->post('account');
		$password = $this->input->post('password');
		if($account && $password){  //確保帳密都有輸入
			$password = do_hash($password); // SHA1
			$query = $this->db->get_where('user', array('account' => $account , 'password' => $password));
			$result = $query->row_array();
			
			return $result;
		}	
		
	}

}
?>
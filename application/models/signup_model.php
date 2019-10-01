<?php
class SignUp_model extends CI_Model {

	public function __construct(){
		$this->load->database();
		$this->load->helper('security');
	}
	public function insert(){
		$account = $this->input->post('account');
		$name = $this->input->post('name');
		$password = $this->input->post('password');
		$password = do_hash($password); // SHA1
		$school = $this->input->post('school');
		$department = $this->input->post('department');
		$grade = $this->input->post('grade');
		$gender = $this->input->post('gender');

		$data = array(
		   'account' => $account,
		   'name' => $name,
		   'password' => $password,
		   'school' => $school,
		   'department' => $department,
		   'grade' => $grade,
		   'gender' => $gender
		);
		$this->db->insert('user', $data);
	}
	public function checkAccount(){
		$account = $this->input->post('account');
		$query = $this->db->get_where('user', array('account' => $account));
		$result = $query->row_array();
		return $result;
	}

}
?>
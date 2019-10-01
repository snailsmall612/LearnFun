<?php
class Words_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function get_words($wordQuantity)
	{	
		$wordQuantity = floor($wordQuantity);
		$query = $this->db->query("SELECT word,translation FROM words ORDER BY RAND() LIMIT $wordQuantity");
		return $query->result_array();
	}
}
?>
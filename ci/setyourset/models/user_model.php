<?php
class User_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	public function getAll()
	{
		$query = $this->db->get('User');
		return $query->result();
	}
}

?>
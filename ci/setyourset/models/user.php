<?php
	Class User extends CI_Model
	{
		var $id;
		var $username;

		function __construct()
		{
			parent::__construct();
 		}

		function authenticate($username, $password)
		{
			$this->db->select('Username', 'Password');
			$this->db->from('User');
			$this->db->where('Username', $username);
			$this->db->where('Password', $password);
			$this->db->limit(1);
			$query = $this->db-> get();
 			if($query -> num_rows() == 1)
			{
				$rows = $query->result();
				$this->id = $rows[0]->id;
				$this->username = $rows[0]->username;
				return $this;
			}
 			return FALSE;
		}
	}
?>
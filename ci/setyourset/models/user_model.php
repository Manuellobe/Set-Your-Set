<?php
class User_model extends CI_Model {
	
	var $id;
	var $username;
	var $privilege;
	
	public function __construct()
	{
		parent::__construct();
	}
	public function getAll()
	{
		$query = $this->db->get('User');
		return $query->result();
	}
	
	public function authenticate($username, $password)
	{
		$this->db->select('*');
		$this->db->from('User');
		$this->db->where('username',$username);
		$this->db->limit(1);
		
		$query = $this->db-> get();
		
		if($query -> num_rows() == 1)
		{
			$rows = $query->result();
			if(password_verify($password, $rows[0]->Password)){
				$this->id = $rows[0]->Id;
				$this->username = $rows[0]->Username;
				$this->privilege = $rows[0]->Privilege;
				
				if($this->privilege == 3) {
					$this->error = array( 'success' => "All perfect, administrator");
				}
				else if($this->privilege == 2) {
					$this->error = array( 'success' => "All perfect, user");
				} else {
					$this->error = array( 'verification' => "Not verified yet");
				}
			} else {
				$this->error = array( 'user' => "Wrong user and/or password");
			}
			return $this;
		}	else {
			$this->error = array( 'user' => "Wrong user and/or password");
		}
		return $this;
	}
	
	public function exists($uname){
		$this->db->select('*');
		$this->db->from('User');
		$this->db->where('Username',$uname);
		$this->db->limit(1);
		
		$query=$this->db->get();
		if($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function add_user(){
        //$this->load->helper('string');
        //$verifyKey=random_string('alnum',20);
        $data = array(
                'Username' => $this->input->post('username'),
                'Email' => $this->input->post('email'),
                'Password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT),
                'Privilege' => 2
                //'verifyKey' => $verifyKey
        );
        if($this->db->insert('User', $data))
                {
                        //$this->EmailModel->sendVerificatinEmail($this->input->post('email'),$verifyKey);
                        return TRUE;
                }
        return FALSE;
	}
}

?>
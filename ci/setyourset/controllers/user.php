<?php

class User extends CI_Controller {
    function __contruct()
    {
        parent::__contruct();
    }
    public function login()
    {
		$data['title'] = ucfirst('Login Page - Set Your Set!');
		
        if (!$this->input->post()){
            $this->load->helper(array('form'));
			$this->load->view('templates/header',$data);
			$this->load->view('login', $data);
			$this->load->view('templates/footer');
            return;
        }

        $this->load->library('form_validation');
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_authenticate');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header',$data);
			$this->load->view('login', $data);
        }
        else
        {
			$this->load->view('templates/header',$data);
            $this->load->view('index', $data);
        }
		$this->load->view('templates/footer');
		return;
    }

    public function authenticate($password)
    {
		$this->load->model("User_model");
        $username = $this->input->post('username');
        $user = $this->User_model->authenticate($username, $password);
		if($user){
			if(array_key_exists('success', $user->error))
			{
				$this->_set_session($user);
				return TRUE;
			}
			if(array_key_exists('verification', $user->error)){
				$this->form_validation->set_message('authenticate',
					"This user hasn't been verified yet");
			} else if(array_key_exists('pass', $user->error)){
				$this->form_validation->set_message('authenticate',
					"Wrong password for this user");
			} else if(array_key_exists('user', $user->error)){
				$this->form_validation->set_message('authenticate',
					"Wrong username and/or password");
			}
		}
		return FALSE;
    }

    private function _set_session($user)
    {
        $sess_array = array(
            'id' => $user->id,
            'username' => $user->username,
			'privilege'=> $user->privilege,
			'logged_in' => TRUE
        );
        $this->session->set_userdata($sess_array);
    }
}

?>
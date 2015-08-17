<?php

class User extends CI_Controller {
    function __contruct()
    {
        parent::__contruct();
    }
    public function login()
    {
        if (!$this->input->post()){
            $this->load->helper(array('form'));
            $this->load->view('login');
            return;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_authenticate');
		
        if($this->form_validation->run() == FALSE)
        {

            //$this->load->view('templates/header',$data);
			//$this->load->view('login', $data);
			echo 'false'.validation_errors();
        }
        else
        {
			//$this->load->view('templates/header',$data);
            //$this->load->view('index', $data);
			echo 'true';
        }
    }

    public function authenticate($password)
    {
		$this->load->model('User_model');
        $username = $this->input->post('username');
        $user = $this->User_model->authenticate($username, $password);
		
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
		return FALSE;
		
        //if($user)
        //{
        //    $this->_set_session($user);
        //    return TRUE;
        //}
        //$this->form_validation->set_message('authenticate','Invalid username or password');
        //return FALSE;
    }

    private function _set_session($user)
    {
        $sess_array = array(
            'Id' => $user->id,
            'Username' => $user->username,
			'Privilege'=> $user->privilege,
			'logged_in' => TRUE
        );
        $this->session->set_userdata($sess_array);
    }


    public function register()
    {
        $this->load->view('templates/header');
        if(!$this->input->post()){
            $this->load->helper(array('form'));
            $this->load->view('register');
            $this->load->view('templates/footer');
            return;
        }
		$this->load->model('User_model');
		$this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username',
                'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password',
                'trim|required|xss_clean|alpha_numeric');
        $this->form_validation->set_rules('rpassword', 'rpassword',
                'trim|required|xss_clean|alpha_numeric|matches[password]');
        $this->form_validation->set_rules('email', 'email',
                'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('remail', 'remail',
                'trim|required|xss_clean|valid_email|matches[email]');

        if($this->form_validation->run() == FALSE)
        {
            //Errors in formulary
            $data['captchaerror'] = "Write the characters below as they are shown.";
            $this->load->view('xpath_register_ns_auto(xpath_context)');

        } else {
            if($this->User_model->add_user())
            {
                $error = array('pendingVerification' => 1);
                $data['errormsg'] = $error;
                $this->load->view('index');
            } else
            {
                $data['alreadyRegistered'] = "Username or email already in use";
                $this->load->view('register');
            }
        }
        $this->load->view('templates/footer');
    }
	
	function logout(){
		$this->session->sess_destroy();
		$this->session->set_userdata('logged_in', FALSE);
		$data['title'] = ucfirst('');
		$this->load->view('templates/header', $data);
		$this->load->view('index', $data);
		$this->load->view('templates/footer', $data);
	}
}

?>
<?php

class User extends CI_Controller {
    funtion __contruct()
    {
        parent::__contruct();
    }
    public function login()
    {
        if (!$this->input->post()){
            $this->load->helper(array('form'));
            $this->load->view('register');
            return;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_authenticate');
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('dmgcalc');
            $this->load->view('templates/footer');
            return;
        }
        else
        {
            $this->load->view('dmgcalc');
        }
    }

    private function authenticate($password)
    {
        $username = $this->input->post('username');
        $user = $this->user->authenticate($username, $password);
        if($user)
        {
            $this->_set_session($user);
            return TRUE;
        }
        $this->form_validation->set_message('authenticate','Invalid username or password');
        return FALSE;
    }

    private function _set_session($user)
    {
        $sess_array = array(
            'id' => $user->id,
            'username' => $user->username
        );
        $this->session->set_userdata('logged_in', $sess_array);
    }
}

?>
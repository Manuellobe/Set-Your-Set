<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index(){
		$this->view('index');
	}

	public function view($page = 'index')
	{		
		if(! file_exists($_SERVER["DOCUMENT_ROOT"]. '/setyourset/views/pages/'. $page . '.php')){
			show_404();
		}
		$data['title'] = "Set Your Set!";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function test_model($model = ''){
		if($model == 'user_model'){
			$data['title'] = "Set Your Set!";
			$this->load->model('User_model');
			$data["results"] = $this->User_model->getAll();
			$this->load->view('templates/header', $data);
			$this->load->view('test/test_model', $data);
			$this->load->view('templates/footer', $data);
		} 
	}
}

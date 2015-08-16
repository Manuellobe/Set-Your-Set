<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DMGcalculator extends CI_Controller {

public function dmgcalc()
	{
		$this->load->view('templates/header');
		$this->load->view('dmgcalc');
		$this->load->view('templates/footer');
	}


public function register()
	{
		$this->load->view('templates/header');
		$this->load->view('register');
		$this->load->view('templates/footer');
	}

public function itemSet()
	{
		$this->load->view('templates/header');
		$this->load->view('itemSet');
		$this->load->view('templates/footer');
	}
}

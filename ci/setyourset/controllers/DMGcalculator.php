<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DMGcalculator extends CI_Controller {

public function dmgcalc()
	{
		$this->load->view('templates/header');
		$this->load->view('dmgcalc');
		$this->load->view('templates/footer');
	}
}
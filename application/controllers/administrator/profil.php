<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function index()
	{
		$this->load->view('administrator/header');
		$this->load->view('administrator/profil');
	}

}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('administrator/login');
	}
	
	public function masuk()
	{
		  $this->form_validation->set_rules('username', 'Username', 'required');
		  $this->form_validation->set_rules('password', 'Password', 'required');
  
		  if ($this->form_validation->run() == FALSE){
			  $this->load->view('administrator/login');	
		  }else{
			  $u = $this->input->post('username');
			  $p = $this->input->post('password');
			  $this->app_model->getLoginData($u,$p);
		  }
	}
	
	public function logout(){
		$this->session->sess_destroy();
		header('location:'.base_url().'index.php');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->input->post('buttonLogin'))
		{
			$un = $this->input->post('username');
			$ps = $this->input->post('password');

			$this->load->model('loginmodel');



			if($this->loginmodel->verifyUser($un, $ps))
			{
				//$this->load->library('session');
				
				$this->session->set_userdata('loggedin', true);
				//$_SESSION['loggedin'] = true;
				
				//$this->load->helper('url');
				redirect('http://localhost:8082/ci226/home', 'refresh');
				//echo base_url();

			}
			else
			{
				echo "Error";
			}
		}
		else
		{
			$this->load->view('login.html');
		}
	}
}
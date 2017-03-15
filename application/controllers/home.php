<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->library('session');
		if(! $this->session->userdata('loggedin'))
		{
			$this->load->helper('url');
			redirect('http://localhost:8082/ci226/login', 'refresh');
			return;
		}

		$this->load->model('loginmodel');
	}

	public function index()
	{
		
		$data['userlist'] = $this->loginmodel->getUserList();
		$this->load->view('home.html', $data);
		//$this->load->view('view_userdetails');
		//print_r($this->loginmodel->getUserList());
	}

	public function userdetails($userid = 0)
	{
		
		
		$user = $this->loginmodel->findUser($userid);
		if($user == null)
		{
			echo "user not found";
		}
		else
		{
			$this->load->view('details.html', $user);
		}
	}
	public function adduser()
	{	
		if($this->input->post('buttonAdd'))
		{
			$no = $this->input->post('no');
			$name = $this->input->post('name');
			$type = $this->input->post('type');


			$data['error']=0;

			$this->load->model('loginmodel');


			$add=$this->loginmodel->addUser($no, $name, $type);
			$data['error']=$add;
			$this->load->view('addnew.html',$data);

			//$this->load->helper('url');
			//redirect('http://localhost:8082/ci226/home', 'refresh');
			
		}
		else
		{
			$this->load->view('addnew.html');
		}
	}


	public function deposit()
	{
		if($this->input->post('buttonAdd'))
		{
			$no = $this->input->post('no');
			$amount = $this->input->post('amount');

			$data['error']=0;

			$this->load->model('loginmodel');


			$add=$this->loginmodel->deposit($no,$amount);
			$data['error']=$add;
			$this->load->view('deposit.html',$data);

			//$this->load->helper('url');
			//redirect('http://localhost:8082/ci226/home', 'refresh');
			
		}
		else
		{
			$this->load->view('deposit.html');
		}



	}
	public function withdraw()
	{
		if($this->input->post('buttonAdd'))
		{
			$no = $this->input->post('no');
			$amount = $this->input->post('amount');

			$data['error']=0;

			$this->load->model('loginmodel');


			$add=$this->loginmodel->withdraw($no,$amount);
			$data['error']=$add;
			$this->load->view('withdraw.html',$data);

			//$this->load->helper('url');
			//redirect('http://localhost:8082/ci226/home', 'refresh');
			
		}
		else
		{
			$this->load->view('withdraw.html');
		}



	}
	public function transfer()
	{
		if($this->input->post('buttonAdd'))
		{
			$from = $this->input->post('from');
			$to = $this->input->post('to');
			$amount = $this->input->post('amount');

			$data['error']=0;

			$this->load->model('loginmodel');


			$add=$this->loginmodel->transfer($from,$to,$amount);
			$data['error']=$add;
			$this->load->view('transfer.html',$data);

			//$this->load->helper('url');
			//redirect('http://localhost:8082/ci226/home', 'refresh');
			
		}
		else
		{
			$this->load->view('transfer.html');
		}



	}

	public function deleteuser($userid = 0)
	{
		if($this->input->post('buttonAdd'))
		{
			 $this->loginmodel->deleteUser($userid);
			 $this->load->helper('url');
			 redirect('http://localhost:8082/ci226/home', 'refresh');



		}
		
		
		$user = $this->loginmodel->findUser($userid);
		if($user == null)
		{
			echo "user not found";
		}else if ($this->input->post('buttonAdd'))
		{
			 $this->loginmodel->deleteUser($userid);
			 $this->load->helper('url');
			 redirect('http://localhost:8082/ci226/home', 'refresh');



		}
		else
		{
			$this->load->view('delete.html', $user);
		}
	}

	public function logout(){
		$this->session->unset_userdata('loggedin');
		$this->load->helper('url');
		redirect('http://localhost:8082/ci226/login', 'refresh');




	}
}

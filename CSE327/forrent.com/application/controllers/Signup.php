<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
	}


	public function index(){
		$this->load->model('Signup_model'); //need to update model-Signup

		$this->form_validation->set_rules('FIRST_NAME','First Name','alpha|required');
		$this->form_validation->set_rules('MIDDLE_NAME','Middle Name','alpha');
		$this->form_validation->set_rules('LAST_NAME','Last Name','alpha|required');
		$this->form_validation->set_rules('password','Password','required|min_length[5]');
		$this->form_validation->set_rules('passwordConfirm','Confirm Password','required|min_length[5]|matches[password]');
		$this->form_validation->set_rules('EMAIL','Email Address','required|is_unique[USER.EMAIL]|valid_email');

		if($this->form_validation->run()==FALSE){
			$this->load->view('templates/header');
			$this->load->view('signupView');
			$this->load->view('templates/footer');
		}
		else{
			$firstname = $this->input->post('FIRST_NAME');
			$middlename = $this->input->post('MIDDLE_NAME');
			$lastname = $this->input->post('LAST_NAME');
			$email = $this->input->post('EMAIL');
			$password = $this->input->post('password');
			$contacttime = $this->input->post('CONTACT_TIME');
			$phoneno = $this->input->post('PHONE_NO');

			$data = array(
				'FIRST_NAME'=>$firstname,
				'MIDDLE_NAME'=>$middlename,
				'LAST_NAME'=>$lastname,
				'EMAIL'=>$email,
				'password'=>md5($password),
				'CONTACT_TIME'=>$contacttime,
				'PHONE_NO'=>$phoneno,
			);

		$this->Signup_model->user_insert($data);

		$this->load->view('templates/header');
		$this->load->view('signupSuccess');
		$this->load->view('templates/footer');

		}
	}
}
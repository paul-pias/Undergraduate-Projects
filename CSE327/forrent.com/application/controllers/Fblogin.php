<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fblogin extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
    }

    public function index() {
    	$this->load->model('Fb_model');

    	$this->form_validation->set_rules('EMAIL', 'Email Address', 'required');


    	if ($this->form_validation->run() == FALSE) {
    		$this->load->view('templates/header');
    		$this->load->view('fbview');
    		$this->load->view('templates/footer');
    	}
    	else {
    		$email = $this->input->post('EMAIL');


    		$data = array(
    				'EMAIL' => $email,

    			);

    		$ss = $this->Fb_model->get_credential($data);


    		if ($ss) {
    			$userCredential = array(
    				'username' => $ss->FIRST_NAME.' '.$ss->MIDDLE_NAME.' '.$ss->LAST_NAME,
    				'userId' => $ss->USER_ID,
    				'logged_in' => TRUE
    				);

    			$this->session->set_userdata($userCredential);
    			redirect("home/user");
    		}
    		else {
				$this->load->view('templates/header');
    			$this->load->view('fbview');
    			$this->load->view('templates/footer');
    		}
    	}
    }

    public function logout() {
    	$this->session->unset_userdata('username');
    	$this->session->unset_userdata('userId');
    	$this->session->unset_userdata('logged_in');
    	$this->session->sess_destroy();

    	redirect("home");
    }
}

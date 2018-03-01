<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Home_model');
		$this->load->library('pagination');
		$this->load->library('form_validation');
	}

	public function index() {
		//populate home page
		$data["results"] = $this->Home_model->get_home_info();

		$this->load->view('templates/header');
		$this->load->view('homeView', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/footer');
	}

	public function user_view() {
		$data["results"] = $this->Home_model->get_home_info();

		if ($this->session->userdata('logged_in')) {
			$data['username'] = $this->session->userdata('username');
			$this->load->view('templates/headerUser', $data);
			$this->load->view('homeView', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('home');
		}
	}

	public function home_search() {
		//this function searches according to the data entered in the widget
		$rules = array(
			array(
				'field' => 'BASE_RENT_SEARCH',
				'label' => '',
				'rules' => ''
			),
			array(
				'field' => 'TYPE_SEARCH',
				'label' => '',
				'rules' => ''
			),
			array(
				'field' => 'NUMBER_OF_BEDROOM_SEARCH',
				'label' => '',
				'rules' => ''
			),
			array(
				'field' => 'SQ_FEET_SEARCH',
				'label' => '',
				'rules' => ''
			),
			array(
				'field' => 'LOCATION_SEARCH',
				'label' => '',
				'rules' => ''
			)
		);

		if ($this->session->userdata('logged_in')) {
			$data["search"] = $this->input->post_values($rules);
			$data["results"] = $this->Home_model->get_search_result($data);
			$data['username'] = $this->session->userdata('username');

			$this->load->view('templates/headerUser', $data);
			$this->load->view('resultView', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/footer');
		}
		else {
			$data["search"] = $this->input->post_values($rules);
			$data["results"] = $this->Home_model->get_search_result($data);

			$this->load->view('templates/header');
			$this->load->view('resultView', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/footer');
		}
	}

	public function getRoom($id) {
		//this function is responsible for getting the room details
		$data['info'] = $this->Home_model->get_room_info($id);
		$this->load->model('User_model');
		$contact_info = $this->User_model->getContact($id, 1);
		$data['contact_no'] = $contact_info[0]['PHONE_NO'];
		$data['contact_time'] = $contact_info[0]['CONTACT_TIME'];

		if ($this->session->userdata('logged_in')) {
			$data['username'] = $this->session->userdata('username');

			$this->load->view('templates/headerUser', $data);
			$this->load->view('showRoom', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/footer');
		}
		else {
			$this->load->view('templates/header');
			$this->load->view('showRoom', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/footer');
		}
	}

	public function getFlat($id) {
		//this function is responsible for getting the Flat details
		$data['info'] = $this->Home_model->get_flat_info($id);
		$this->load->model('User_model');
		$contact_info = $this->User_model->getContact($id, 0);
		$data['contact_no'] = $contact_info[0]['PHONE_NO'];
		$data['contact_time'] = $contact_info[0]['CONTACT_TIME'];

		if ($this->session->userdata('logged_in')) {
			$data['username'] = $this->session->userdata('username');

			$this->load->view('templates/headerUser', $data);
			$this->load->view('showFlat', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/footer');
		}
		else {
			$this->load->view('templates/header');
			$this->load->view('showFlat', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/footer');
		}
	}
}
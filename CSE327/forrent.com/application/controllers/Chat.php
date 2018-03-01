<?php

class Chat extends CI_Controller {
  public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation', 'session');
    }
    public function userProfile() {
      $this->load->model('User_model');

      if ($this->session->userdata('logged_in')) {
      $data['username'] = $this->session->userdata('username');
      $data['user_info'] = $this->User_model->getUserInfo($this->session->userdata('userId'));
      $data['rooms'] = $this->User_model->getRoomInfo($this->session->userdata('userId'));
      $data['flats'] = $this->User_model->getFlatInfo($this->session->userdata('userId'));

      $this->load->view('templates/headerUser', $data);
      $this->load->view('userProfileView', $data);
      $this->load->view('templates/footer');
    }
    else {
      redirect('home');
    }
  }

  public function update() {
    $this->load->model('User_model');


    $data['username'] = $this->session->userdata('username');
    $data['fname'] = $this->session->userdata('FIRST_NAME');
    $data['user_info'] = $this->User_model->getUserInfo($this->session->userdata('userId'));



   $this->load->view('templates/headerUser', $data);
    $this->load->view('smsview');

   $this->load->view('templates/footer');
 }
}

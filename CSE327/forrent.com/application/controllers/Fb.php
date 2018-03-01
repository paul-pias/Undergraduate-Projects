<?php

class Fb extends CI_Controller {
  public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation', 'session');
    }


  function index(){
    $this->load->model('Signup_model');
    $this->form_validation->set_rules('FIRST_NAME', 'First Name', 'alpha|required');
    //$this->form_validation->set_rules('Middle_NAME', 'Middle Name', 'alpha');
    $this->form_validation->set_rules('LAST_NAME', 'Last Name', 'alpha|required');
    $this->form_validation->set_rules('EMAIL', 'Email Address', 'required|is_unique[USER.EMAIL]|valid_email');


    if ($this->facebook->is_authenticated())
		{
			// User logged in, get user details
			$user = $this->facebook->request('get', '/me?fields=first_name,last_name,email,gender');
			if (!isset($user['error']))
			{
				$data['user'] = $user;
			}

        $firstname = $user['first_name'];
      //  $middlename =$user['MIDDLE_NAME'];
        $lastname = $user['last_name'];

        $email = $user['email'];




        $this->load->view('templates/header');
        $this->load->view('fbview');
        $this->load->view('templates/footer');

  //var_dump($user);
  $data = array(
      'FIRST_NAME' => $firstname,

      'LAST_NAME' => $lastname,
      'EMAIL' => $email


    );
    $this->Signup_model->user_insert($data);

}
}
}

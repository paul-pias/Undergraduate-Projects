<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class Api extends REST_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Home_model');     //load home model
		$this->load->library('pagination');
		$this->load->library('form_validation');
	}

	public function home_info_get(){
		$data["result"]= $this->Home_model->get_home_info();  //get home info
		$this->response($data);                               // make http response
	}
}


// //	 ###get,put,post,delete example
// //     public function user_get(){
// // 		$r = $this->user_model->user_info();
// //         $this->response($r); 
// //     }
// //        public function user_put(){
// //            $id = $this->uri->segment(3);

// //            $data = array('name' => $this->input->get('name'),
// //            'pass' => $this->input->get('pass'),
// //            'type' => $this->input->get('type')
// //            );

// //             $r = $this->user_model->update($id,$data);
// //                $this->response($r); 
// //        }

// //        public function user_post(){
// //            $data = array('name' => $this->input->post('name'),
// //            'pass' => $this->input->post('pass'),
// //            'type' => $this->input->post('type')
// //            );
// //            $r = $this->user_model->insert($data);
// //            $this->response($r); 
// //        }
// //        public function user_delete(){
// //            $id = $this->uri->segment(3);
// //            $r = $this->user_model->delete($id);
// //            $this->response($r); 
// //        }
//     

// }
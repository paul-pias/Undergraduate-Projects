<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Signup_model extends CI_Model
{	
	public function __construct()
	{
		$this->load->database();
	}
	public function user_insert($data)
	{
		$this->db->insert('USER',$data);
	}
}
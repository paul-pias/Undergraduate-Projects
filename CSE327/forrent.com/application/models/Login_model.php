<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{	
	public function __construct()
	{
		$this->load->database();
	}

	public function get_credential($data)
	{
		$sql = "SELECT USER_ID, FIRST_NAME, MIDDLE_NAME, LAST_NAME FROM USER WHERE EMAIL LIKE ".$this->db->escape($data['EMAIL'])." AND password LIKE ".$this->db->escape($data['password']);
		
		return $this->db->query($sql)->row();
	}
}
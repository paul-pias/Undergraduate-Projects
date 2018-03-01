<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fb_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get_credential($data) {
		$sql = "SELECT USER_ID, FIRST_NAME, MIDDLE_NAME, LAST_NAME FROM USER WHERE EMAIL LIKE ".$this->db->escape($data['EMAIL']);

		return $this->db->query($sql)->row();
	}
}

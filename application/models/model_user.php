<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function cek_login($table,$where)
	{
		return $this->db->get_where($table,$where);
	}
}

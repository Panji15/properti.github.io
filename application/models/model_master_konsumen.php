<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_master_konsumen extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

    function get_subkavling($id){
        $hasil=$this->db->query("SELECT * FROM tb_kavling WHERE proyek='$id'");
        return $hasil->result();
    }
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_dashboard extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

    function total_rows() {
        return $this->db->get('tb_proyek')->num_rows();
      }
}

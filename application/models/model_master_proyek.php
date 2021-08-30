<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_master_proyek extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

    private function _uploadImage()
    {
        $config['upload_path']          = './storage/kavling/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->product_id;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
    
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }
}

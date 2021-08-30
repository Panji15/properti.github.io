<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kavling_detail extends CI_Controller {

    /**
     * [__construct description]
     */
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    }

    /**
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
        $kavling = $this->db->select('*')
                            ->from('tb_konsumen')
                            ->get()
                            ->result_array();
        $data['kavling']=$kavling;

        // echo'<pre>';
        // print_r($data['kavling']);
        // return;

        $this->load
        ->view('kavling_detail',$data);
    }
}
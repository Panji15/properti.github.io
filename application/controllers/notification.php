<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

    /**
     * [__construct description]
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_dashboard');

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
        $data['message'] = $this->db->from('tb_message')
                                ->where('date_deleted',null)
                                ->get()
                                ->result_array();

        $this->load
        ->view('notification/notification',$data);
    }

    public function lihat_notification($id)
    {
        $data['message'] = $this->db->from('tb_message')
                                ->where('id',$id)
                                ->where('date_deleted',null)
                                ->get()
                                ->result_array();

        $this->load
        ->view('notification/notification_lihat',$data);
    }

    public function print_notification($id)
    {
        $data['message'] = $this->db->from('tb_message')
                                ->where('id',$id)
                                ->where('date_deleted',null)
                                ->get()
                                ->result_array();

        $this->load
        ->view('notification/notification_print',$data);
    }

    public function hapus($id)
    {
        $this->db->set('date_deleted', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tb_message');
        $json['success'] = 1;
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_user extends CI_Controller {

    /**
     * [__construct description]
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));

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
        $user = $this->db->select('u.*,k.nama')
                            ->from('tb_user u')
                            ->join('tb_karyawan k','k.id=u.nama')
                            ->where('u.date_deleted',null)
                            ->get()
                            ->result_array();
        $data['user']=$user;

        // echo'<pre>';
        // print_r($data['kavling']);
        // return;

        $this->load
        ->view('master_user/master_user',$data);
    }

    public function master_user_edit($id)
    {
          $user = $this->db->select('u.*,k.nama as name')
                            ->from('tb_user u')
                            ->join('tb_karyawan k','k.id=u.nama')
                            ->where('u.date_deleted',null)
                            ->get()
                            ->result_array();
          $data['user']=$user;

        // echo'<pre>';
        // print_r($data['kavling']);
        // return;

        $this->load
        ->view('master_user/master_user_edit',$data);
    }

    public function proses_edit()
    {
      $json = array();

      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $level = $this->input->post('level');
      // $deskripsi = $this->input->post('deskripsi');
      $date_updated = date('Y-m-d H:i:s');

      $config['upload_path']          = './storage/user/';
      $config['allowed_types']        = 'gif|jpg|png';
      // $config['file_name']            = 'user';
      $config['max_size']             = 100;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;
     
      $this->load->library('upload', $config);
     
      if ($this->upload->do_upload('img_user')){

        $post = $this->input->post(null,false);
  

      }else{

        $error = array('error' => $this->upload->display_errors());

      }

      $data = array(
        // 'img_user' => './storage/user/'.$this->upload->data("file_name"),
        'nama' => $nama,
        'username' => $username,
        // 'password' => hash('sha512',$password),
        'level' => $level,
        // 'luas' => $luas,
        // 'deskripsi' => $deskripsi,
        'date_updated' => $date_updated
        );

        // echo'<pre>';
        // print_r($data);
        // return;

        $this->db->where('id', $id);
        $this->db->update('tb_user', $data);
    
        // redirect('master_user');
        $json['success'] = 1;
        $this->output->set_content_type('application/json')->set_output(json_encode($json));

    }

    public function master_user_add()
    {
        $user = $this->db->select('*')
                            ->from('tb_user')
                            // ->where('id',$id)
                            ->where('date_deleted',null)
                            ->get()
                            ->result_array();
        $data['user']=$user;

        $result = $this->db->select('k.*,')
        ->from('tb_karyawan k')
        ->join('tb_user u','u.nama != k.id','right')
        // ->where_not_in('u.id',$id)
        ->where('k.date_deleted',null)
        ->get()
        ->result_array();
        // $data['kavling']=$kavling;

        $uk = array('' => '--Pilih--');
        foreach ($result as $pk) {
                $uk[$pk['id']] = $pk['nama'];
        }
        $data['uk'] = $uk;

        // echo'<pre>';
        // print_r($data['kavling']);
        // return;

        $this->load
        ->view('master_user/master_user_add',$data);
    }

    public function proses_save()
    {

      $nama = $this->input->post('nama');
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      // $user = $this->input->post('user');
      $level = $this->input->post('level');
      $date_added = date('Y-m-d H:i:s');

      $config['upload_path']          = './storage/user/';
      $config['allowed_types']        = 'gif|jpg|png';
      // $config['file_name']            = 'user';
      $config['max_size']             = 100;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;
     
      $this->load->library('upload', $config);
     
      if ( ! $this->upload->do_upload('img_user')){
        $error = array('error' => $this->upload->display_errors());

      }else{

      $post = $this->input->post(null,false);
      }

      $data = array(
        // 'img_user' => './storage/user/'.$this->upload->data("file_name"),
        'nama' => $nama,
        'username' => $username,
        'password' => hash('sha512',$password),
        'level' => $level,
        // 'luas' => $luas,
        // 'deskripsi' => $deskripsi,
        'date_added' => $date_added
        );

        // $this->db->where('id', $id);
        $this->db->insert('tb_user', $data);

        // echo"<pre>";
        // print_r($data);
        // return;
    
        redirect('master_user');

        // $json['success'] = 1;
        // $this->output->set_content_type('application/json')->set_output(json_encode($json));


    }

    public function hapus($id)
    {
        $this->db->set('date_deleted', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tb_user');
        $json['success'] = 1;
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_karyawan extends CI_Controller {

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
        $karyawan = $this->db->select('k.*,j.jabatan as najab, d.divisi as nadiv')
                            ->from('tb_karyawan k')
                            ->join('tb_jabatan j','j.id=k.jabatan')
                            ->join('tb_divisi d','d.id=k.divisi')
                            // ->where('k.id',$id)
                            ->where('k.date_deleted',null)
                            ->get()
                            ->result_array();
        $data['karyawan']=$karyawan;

        // echo'<pre>';
        // print_r($data['kavling']);
        // return;

        $this->load
        ->view('master_karyawan/master_karyawan',$data);
    }

    public function master_karyawan_edit($id)
    {
          $karyawan = $this->db->select('k.*,j.jabatan as najab, d.divisi as nadiv')
                              ->from('tb_karyawan k')
                              ->join('tb_jabatan j','j.id=k.jabatan')
                              ->join('tb_divisi d','d.id=k.divisi')
                              ->where('k.id',$id)
                              ->where('k.date_deleted',null)
                              ->get()
                              ->result_array();
          $data['karyawan']=$karyawan;

          foreach ($karyawan as $kr) {
            $idd = $kr['divisi'];
            $divisi = $kr['nadiv'];

            $idj = $kr['jabatan'];
            $jabatan = $kr['najab'];
          }

          $result = $this->db->select('*')
          ->from('tb_jabatan')
          // ->where('id',$id)
          ->where('date_deleted',null)
          ->get()
          ->result_array();
  
          $jbt = array($idj => $jabatan);
          foreach ($result as $pk) {
                  $jbt[$pk['id']] = $pk['jabatan'];
          }
          $data['jbt'] = $jbt;
  
          $result2 = $this->db->select('*')
          ->from('tb_divisi')
          // ->where('id',$id)
          ->where('date_deleted',null)
          ->get()
          ->result_array();
          // $data['kavling']=$kavling;
  
          $dvs = array($idd => $divisi);
          foreach ($result2 as $pk) {
                  $dvs[$pk['id']] = $pk['divisi'];
          }
          $data['dvs'] = $dvs;
  

        // echo'<pre>';
        // print_r($data['kavling']);
        // return;

        $this->load
        ->view('master_karyawan/master_karyawan_edit',$data);
    }

    public function proses_edit()
    {
      $json = array();

      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      $no_karyawan = $this->input->post('no_karyawan');
      $jabatan = $this->input->post('jabatan');
      $divisi = $this->input->post('divisi');
      $alamat = $this->input->post('alamat');
      $date_updated = date('Y-m-d H:i:s');

      $config['upload_path']          = './storage/karyawan/';
      $config['allowed_types']        = 'gif|jpg|png';
      // $config['file_name']            = 'karyawan';
      $config['max_size']             = 100;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;
     
      $this->load->library('upload', $config);
     
      if ($this->upload->do_upload('img_karyawan')){

        $post = $this->input->post(null,false);
  

      }else{

        $error = array('error' => $this->upload->display_errors());

      }

      $data = array(
        'img_karyawan' => './storage/karyawan/'.$this->upload->data("file_name"),
        'nama' => $nama,
        'no_karyawan' => $no_karyawan,
        'jabatan' => $jabatan,
        'divisi' => $divisi,
        'alamat' => $alamat,
        'date_update' => $date_updated
        );

        // echo'<pre>';
        // print_r($data);
        // return;

        $this->db->where('id', $id);
        $this->db->update('tb_karyawan', $data);
    
        // redirect('master_karyawan');
        $json['success'] = 1;
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function master_karyawan_add()
    {
        $karyawan = $this->db->select('*')
                            ->from('tb_karyawan')
                            // ->where('id',$id)
                            ->where('date_deleted',null)
                            ->get()
                            ->result_array();
        $data['karyawan']=$karyawan;

        $result = $this->db->select('*')
        ->from('tb_jabatan')
        // ->where('id',$id)
        ->where('date_deleted',null)
        ->get()
        ->result_array();

        $jbt = array('' => '--Pilih--');
        foreach ($result as $pk) {
                $jbt[$pk['id']] = $pk['jabatan'];
        }
        $data['jbt'] = $jbt;

        $result2 = $this->db->select('*')
        ->from('tb_divisi')
        // ->where('id',$id)
        ->where('date_deleted',null)
        ->get()
        ->result_array();
        // $data['kavling']=$kavling;

        $dvs = array('' => '--Pilih--');
        foreach ($result2 as $pk) {
                $dvs[$pk['id']] = $pk['divisi'];
        }
        $data['dvs'] = $dvs;

        // echo'<pre>';
        // print_r($data['kavling']);
        // return;

        $this->load
        ->view('master_karyawan/master_karyawan_add',$data);
    }

    public function proses_save()
    {
      $nama = $this->input->post('nama');
      $no_karyawan = $this->input->post('no_karyawan');
      $jabatan = $this->input->post('jabatan');
      $divisi = $this->input->post('divisi');
      $alamat = $this->input->post('alamat');
      $date_added = date('Y-m-d H:i:s');

      $config['upload_path']          = './storage/karyawan/';
      $config['allowed_types']        = 'gif|jpg|png';
      // $config['file_name']            = 'karyawan';
      $config['max_size']             = 100;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;
     
      $this->load->library('upload', $config);
     
      if ( ! $this->upload->do_upload('img_karyawan')){
        $error = array('error' => $this->upload->display_errors());

      }else{

      $post = $this->input->post(null,false);
      }

      $data = array(
        'img_karyawan' => './storage/karyawan/'.$this->upload->data("file_name"),
        'nama' => $nama,
        'no_karyawan' => $no_karyawan,
        'jabatan' => $jabatan,
        'divisi' => $divisi,
        'alamat' => $alamat,
        'date_added' => $date_added
        );

        // $this->db->where('id', $id);
        $this->db->insert('tb_karyawan', $data);

        // echo"<pre>";
        // print_r($data);
        // return;
    
        redirect('master_karyawan');

    }

    public function hapus($id)
    {
        $this->db->set('date_deleted', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tb_karyawan');
        $json['success'] = 1;
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
}
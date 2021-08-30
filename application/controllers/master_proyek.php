<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_proyek extends CI_Controller {

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
        $proyek = $this->db->select('*')
                            ->from('tb_proyek')
                            ->where('date_deleted',null)
                            ->get()
                            ->result_array();
        $data['proyek']=$proyek;

        // echo'<pre>';
        // print_r($data['kavling']);
        // return;

        $this->load
        ->view('master_proyek/master_proyek',$data);
    }

    public function master_proyek_edit($id)
    {
        $proyek = $this->db->select('tp.*,ts.spesifikasi,ts.detail,ts.date_deleted,tjs.spesifikasi as nama_spesifikasi, ts.id as idts')
                            ->from('tb_proyek tp')
                            ->join('tb_spesifikasi ts','ts.proyek=tp.id')
                            ->join('tb_jenis_spesifikasi tjs','tjs.id=ts.spesifikasi')
                            ->where('tp.id',$id)
                            ->where('tp.date_deleted',null)
                            ->where('ts.date_deleted',null)
                            ->get()
                            ->result_array();
        $data['proyek']=$proyek;

        $proyek2 = $this->db->select('*')
        ->from('tb_proyek')
        ->where('id',$id)
        ->where('date_deleted',null)
        ->get()
        ->result_array();

        $data['proyek2']=$proyek2;
        // echo'<pre>';
        // print_r($data['kavling']);
        // return;

        $jenis_spesifikasi = $this->db->select('*')
        ->from('tb_jenis_spesifikasi')
        // ->where('id',$id)
        ->where('date_deleted',null)
        ->get()
        ->result_array();
        // $data['kavling']=$kavling;

        // $jenis_spesifikasi = array('' => '--Pilih--');
        // foreach ($result as $js) {
        //         $jenis_spesifikasi[$js['id']] = $js['spesifikasi'];
        // }
        $data['jenis_spesifikasi'] = $jenis_spesifikasi;

        $this->load
        ->view('master_proyek/master_proyek_edit',$data);
    }

    public function proses_edit()
    {
      $json = array();

      $post = $this->input->post(null,false);
      
      $id = $this->input->post('id');
      $nama_proyek = $this->input->post('nama_proyek');
      $jumlah_kavling = $this->input->post('jumlah_kavling');
      $sisa_kavling = $this->input->post('sisa_kavling');
      $lokasi = $this->input->post('lokasi');
      $luas = $this->input->post('luas');
      $deskripsi = $this->input->post('deskripsi');
      $date_update = date('Y-m-d H:i:s');

      $config['upload_path']          = './storage/proyek/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['file_name']            = 'proyek';
      $config['max_size']             = 100;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;
     
      $this->load->library('upload', $config);
     
      if ($this->upload->do_upload('img_proyek')){
  
        $data = array(
          'img_proyek' => './storage/proyek/'.$this->upload->data("file_name"),
          // 'nama_proyek' => $nama_proyek,
          // 'jumlah_kavling' => $jumlah_kavling,
          // 'sisa_kavling' => $sisa_kavling,
          // 'lokasi' => $lokasi,
          // 'luas' => $luas,
          // 'deskripsi' => $deskripsi,
          // 'date_update' => $date_update
          );
    
          $this->db->where('id', $id);
          $this->db->update('tb_proyek', $data);

      }else{

        $error = array('error' => $this->upload->display_errors());
        
      }

      $data2 = array(
        // 'img_proyek' => './storage/proyek/'.$this->upload->data("file_name"),
        'nama_proyek' => $nama_proyek,
        'jumlah_kavling' => $jumlah_kavling,
        'sisa_kavling' => $sisa_kavling,
        'lokasi' => $lokasi,
        'luas' => $luas,
        'deskripsi' => $deskripsi,
        'date_update' => $date_update
        );
  
        $this->db->where('id', $id);
        $this->db->update('tb_proyek', $data2);


        $id = $this->input->post('id');

        $this->db->where('proyek', $id);
        $this->db->delete('tb_spesifikasi');

        // spesifikasi      
        $i = 0; // untuk loopingnya
        $idts = $this->input->post('idts');
        $a = $this->input->post('spesifikasi');
        $b = $this->input->post('detail');
        if ($a[0] !== null) 
        {
          foreach ($a as $row) 
          {
            $data1 = [
              // 'id'=>$idts,
              'proyek'=>$id,
              'spesifikasi'=>$row,
              'detail'=>$b[$i],
              'date_added'=>date('Y-m-d H:i:s'),
            ];
            // $delete = [
            //   'proyek'=>$id,
            // ];

            $insert = $this->db->insert('tb_spesifikasi', $data1);
            if ($insert) {
              $i++;
            }
          }
        }
        // echo'<pre>';
        // print_r($insert);
        // return;

      
        // redirect('master_proyek');
        $json['success'] = 1;
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
      
    }

    public function master_proyek_add()
    {
        $proyek = $this->db->select('*')
                            ->from('tb_proyek')
                            // ->where('id',$id)
                            ->where('date_deleted',null)
                            ->get()
                            ->result_array();
        $data['proyek']=$proyek;

        $jenis_spesifikasi = $this->db->select('*')
        ->from('tb_jenis_spesifikasi')
        // ->where('id',$id)
        ->where('date_deleted',null)
        ->get()
        ->result_array();
        // $data['kavling']=$kavling;

        // $jenis_spesifikasi = array('' => '--Pilih--');
        // foreach ($result as $js) {
        //         $jenis_spesifikasi[$js['id']] = $js['spesifikasi'];
        // }
        $data['jenis_spesifikasi'] = $jenis_spesifikasi;

        // echo'<pre>';
        // print_r($data['kavling']);
        // return;

        $this->load
        ->view('master_proyek/master_proyek_add',$data);
    }

    public function proses_save()
    {

      $config['upload_path']          = './storage/proyek/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['file_name']            = 'proyek';
      $config['max_size']             = 100;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;
     
      $this->load->library('upload', $config);
     
      if ( ! $this->upload->do_upload('img_proyek')){
        $error = array('error' => $this->upload->display_errors());

      }else{
        $post = $this->input->post(null,false);
        
      //   $id = $this->input->post('id');
        $nama_proyek = $this->input->post('nama_proyek');
        $jumlah_kavling = $this->input->post('jumlah_kavling');
        $sisa_kavling = $this->input->post('sisa_kavling');
        $lokasi = $this->input->post('lokasi');
        $luas = $this->input->post('luas');
        $deskripsi = $this->input->post('deskripsi');
        $date_added = date('Y-m-d H:i:s');

        $data = array(
          'img_proyek' => './storage/proyek/'.$this->upload->data("file_name"),
          'nama_proyek' => $nama_proyek,
          'jumlah_kavling' => $jumlah_kavling,
          'sisa_kavling' => $sisa_kavling,
          'lokasi' => $lokasi,
          'luas' => $luas,
          'deskripsi' => $deskripsi,
          'date_added' => $date_added
          );

          // $this->db->where('id', $id);
          $this->db->insert('tb_proyek', $data);
          $idp=$this->db->insert_id();

      }

          $i = 0; // untuk loopingnya
          $a = $this->input->post('spesifikasi');
          $b = $this->input->post('detail');
          if ($a[0] !== null) 
          {
            foreach ($a as $row) 
            {
              $data = [
                'proyek'=>$idp,
                'spesifikasi'=>$row,
                'detail'=>$b[$i],
                'date_added'=>date('Y-m-d H:i:s'),
              ];

              $insert = $this->db->insert('tb_spesifikasi', $data);
              if ($insert) {
                $i++;
              }
            }
          }

          $arr['success'] = true;
          $arr['notif']  = '<div class="alert alert-success">
            <i class="fa fa-check"></i> Data Berhasil Disimpan
          </div>';
        redirect('master_proyek');

        return $this->output->set_output(json_encode($arr));

    

    

    }

    public function hapus($id)
    {
        $this->db->set('date_deleted', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tb_proyek');
        $json['success'] = 1;
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
}
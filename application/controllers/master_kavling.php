<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_kavling extends CI_Controller {

    /**
     * [__construct description]
     */
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}    }

    /**
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
        $kavling = $this->db->select('k.*, p.nama_proyek, s.keterangan')
                            ->from('tb_kavling k')
                            ->join('tb_proyek p','p.id=k.proyek')
                            ->join('tb_status s','s.id=k.status')
                            ->where('k.date_deleted',null)
                            ->order_by('p.nama_proyek', 'asc')
                            ->order_by('k.id', 'asc')
                            ->get()
                            ->result_array();
        $data['kavling']=$kavling;

        // echo'<pre>';
        // print_r($data['kavling']);
        // return;

        $this->load
        ->view('master_kavling/master_kavling',$data);
    }

    public function master_kavling_edit($id)
    {
        $kavling = $this->db->select('k.*, p.nama_proyek, s.keterangan')
                            ->from('tb_kavling k')
                            ->join('tb_proyek p','p.id=k.proyek')
                            ->join('tb_status s','s.id=k.status')
                            ->where('k.date_deleted',null)
                            ->where('k.id',$id)
                            ->get()
                            ->result_array();
        $data['kavling']=$kavling;

        foreach ($kavling as $kv) {
            $data['nama_proyek'] = $kv['nama_proyek'];
            $data['proyek'] = $kv['proyek'];
            $data['keterangan'] = $kv['keterangan'];
            $data['status'] = $kv['status'];
        }

        $result = $this->db->select('*')
        ->from('tb_proyek')
        // ->where('id',$id)
        ->where('date_deleted',null)
        ->get()
        ->result_array();
        // $data['kavling']=$kavling;

        $proyek = array($data['proyek'] => $data['nama_proyek']);
         foreach ($result as $pk) {
                $proyek[$pk['id']] = $pk['nama_proyek'];
        }
        $data['proyek'] = $proyek;

        $result1 = $this->db->select('*')
        ->from('tb_status')
        // ->where('id',$id)
        // ->where('date_deleted',null)
        ->get()
        ->result_array();
        // $data['kavling']=$kavling;

        $status = array($data['status'] => $data['keterangan']);
        foreach ($result1 as $pk) {
                $status[$pk['id']] = $pk['keterangan'];
        }
        $data['status'] = $status;

        // echo'<pre>';
        // print_r($data['nama_proyek']);
        // return;

        $this->load
        ->view('master_kavling/master_kavling_edit',$data);
    }

    public function proses_edit()
    {
      $json = array();

      $post = $this->input->post(null,false);
      
      $id = $this->input->post('id');
      $proyek = $this->input->post('proyek');
      $kavling = $this->input->post('kavling');
      $status = $this->input->post('status');
      $progress = $this->input->post('progress');
      $date_update = date('Y-m-d H:i:s');

      if ($status == 1) {
        $indikator = "green";
      } else if ($status == 2) {
        $indikator = "yellow";
      } else if ($status == 3) {
        $indikator = "orange";
      } else if ($status == 4) {
        $indikator = "purple";
      } else if ($status == 5) {
        $indikator = "red";
      }

      $data = array(
        'proyek' => $proyek,
        'kavling' => $kavling,
        'status' => $status,
        'progress' => $progress,
        'indikator' => $indikator,
        'date_update' => $date_update,
        'create_by' => $this->session->userdata('nama'),
        );

        // echo'<pre>';
        // print_r($indikator);
        // return;

        $this->db->where('id', $id);
        $this->db->update('tb_kavling', $data);
    
        // redirect('master_kavling');
        $json['success'] = 1;
        $this->output->set_content_type('application/json')->set_output(json_encode($json));

    }

    public function master_kavling_add()
    {
        $result = $this->db->select('*')
                ->from('tb_proyek')
                // ->where('id',$id)
                ->where('date_deleted',null)
                ->get()
                ->result_array();
        // $data['kavling']=$kavling;

        $proyek = array('' => '--Pilih Proyek--');
        foreach ($result as $pk) {
                $proyek[$pk['id']] = $pk['nama_proyek'];
        }
        $data['proyek'] = $proyek;

        $result1 = $this->db->select('*')
        ->from('tb_status')
        // ->where('id',$id)
        // ->where('date_deleted',null)
        ->get()
        ->result_array();
        // $data['kavling']=$kavling;

        $status = array('' => '--Pilih Status--');
        foreach ($result1 as $pk) {
                $status[$pk['id']] = $pk['keterangan'];
        }
        $data['status'] = $status;

        $this->load
        ->view('master_kavling/master_kavling_add',$data);
    }

    public function proses_save()
    {
      $post = $this->input->post(null,false);
      
    //   $id = $this->input->post('id');
      $proyek = $this->input->post('proyek');
      $kavling = $this->input->post('kavling');
      $status = $this->input->post('status');
      $progress = $this->input->post('progress');
      $date_added = date('Y-m-d H:i:s');

      if ($status == 1) {
        $indikator = "green";
      } else if ($status == 2) {
        $indikator = "yellow";
      } else if ($status == 3) {
        $indikator = "orange";
      } else if ($status == 4) {
        $indikator = "purple";
      } else if ($status == 5) {
        $indikator = "red";
      }

      $data = array(
        'proyek' => $proyek,
        'kavling' => $kavling,
        'status' => $status,
        'progress' => $progress,
        'indikator' => $indikator,
        'date_added' => $date_added,
        'create_by' => $this->session->userdata('nama'),
        );

        // $this->db->where('id', $id);
        $this->db->insert('tb_kavling', $data);
    
        redirect('master_kavling');
    }

    public function hapus($id)
    {
        $this->db->set('date_deleted', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tb_kavling');
        $json['success'] = 1;
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    // public function master_kavling_detail($id)
    // {

    //     $cek = $this->db->select('k.*, p.nama_proyek, kv.kavling as kvl, s.keterangan, kv.progress')
    //             ->from('tb_konsumen k')
    //             ->join('tb_proyek p','p.id=k.proyek')
    //             ->join('tb_kavling kv','kv.id=k.kavling')
    //             ->join('tb_status s','s.id=kv.status')
    //             ->where('k.date_deleted',null)
    //             ->where('k.kavling',$id)
    //             ->get()
    //             ->num_rows();

    //     if ($cek > 0) {
    //         $kavling = $this->db->select('k.*, p.nama_proyek, kv.kavling as kvl, s.keterangan, kv.progress')
    //             ->from('tb_konsumen k')
    //             ->join('tb_proyek p','p.id=k.proyek')
    //             ->join('tb_kavling kv','kv.id=k.kavling')
    //             ->join('tb_status s','s.id=kv.status')
    //             ->where('k.date_deleted',null)
    //             ->where('k.kavling',$id)
    //             ->get()
    //             ->result_array();

    //         $data['kavling']=$kavling;

    //     } else {

    //         redirect(base_url("master_kavling/"));

    //     }

    //     foreach ($kavling as $kv) {
    //         $data['nama_proyek'] = $kv['nama_proyek'];
    //     }

    //     $result = $this->db->select('*')
    //     ->from('tb_proyek')
    //     // ->where('id',$id)
    //     ->where('date_deleted',null)
    //     ->get()
    //     ->result_array();
    //     // $data['kavling']=$kavling;

    //     $proyek = array('' => $data['nama_proyek']);
    //      foreach ($result as $pk) {
    //             $proyek[$pk['id']] = $pk['nama_proyek'];
    //     }
    //     $data['proyek'] = $proyek;

    //     $spesifikasi = $this->db->select('ts.*,tjs.spesifikasi, tp.nama_proyek')
    //     ->from('tb_spesifikasi ts')
    //     ->join('tb_jenis_spesifikasi tjs','tjs.id=ts.spesifikasi')
    //     ->join('tb_proyek tp','tp.id=ts.proyek')
    //     ->where('tp.id',$id)
    //     ->where('ts.date_deleted',null)
    //     ->get()
    //     ->result_array();
    //     $data['spesifikasi']=$spesifikasi;

    //     $angs = $this->db->select('kv.*,hp.jml_pembayaran')
    //     ->join('tb_konsumen kv')
    //     ->from('tb_history_pembayaran hp','kv.id=hp.konsumen')
    //     ->where('kv.date_deleted',null)
    //     ->where('kv.kavling',$id)
    //     ->where('hp.pembayaran',3)
    //     ->get()
    //     ->result_array();

    //     foreach ($angs as $val) {
    //         @$data['jml_pembayaran']=$val['jml_pembayaran'];
    //     }

    //     // echo'<pre>';
    //     // print_r($spesifikasi);
    //     // return;

    //     $this->load
    //     ->view('master_kavling/master_kavling_detail',$data);
    // }
}
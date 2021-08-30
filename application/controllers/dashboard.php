<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    /**
     * [__construct description]
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_dashboard');
        $this->load->library('session');

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
        $id = $this->session->userdata("id");

        $data['jumlah_proyek'] = $this->db->from('tb_proyek')
                                ->where('date_deleted',null)
                                ->get()
                                ->num_rows();

        $data['jumlah_sales'] = $this->db->from('tb_karyawan')
                                ->where('jabatan',1)
                                ->where('date_deleted',null)
                                ->get()
                                ->num_rows();

        $data['jumlah_sales_level'] = $this->db->from('tb_karyawan')
                                ->where('jabatan',1)
                                ->where('date_deleted',null)
                                ->where('id',$this->session->userdata("nama"))
                                ->get()
                                ->num_rows();

        $data['jml_notification'] = $this->db->select('*')
                                ->from('tb_message')
                                ->where('date_deleted',null)
                                ->where('status',null)
                                ->get()
                                ->num_rows();

        $data['jml_konsumen'] = $this->db->select('*')
                                ->from('tb_konsumen')
                                ->where('date_deleted',null)
                                ->where('nama_marketing',$id)
                                ->get()
                                ->num_rows();

        $data['notification'] = $this->db->select('*')
                                ->from('tb_message')
                                ->limit(5)
                                ->where('date_deleted',null)
                                ->where('status',null)
                                ->order_by('id', 'desc')
                                ->get()
                                ->result_array();

        $data['karyawan'] = $this->db->select('k.*,j.jabatan as najab, d.divisi as nadiv, u.nama as names')
                                ->from('tb_karyawan k')
                                ->join('tb_user u','.u.nama=k.id')
                                ->join('tb_jabatan j','j.id=k.jabatan')
                                ->join('tb_divisi d','d.id=k.divisi')
                                // ->where('k.jabatan',1)
                                ->where('k.id',$id)
                                ->where('k.date_deleted',null)
                                ->get()
                                ->result_array();
    
        // foreach ($karyawan as $key => $value) {
        //                             $jml_sales = $this->db
        //                             ->select('count(id) as jml_sales')
        //                             ->from('tb_konsumen')
        //                             ->where('date_deleted', NULL)
        //                             ->where('nama_marketing', $value['id'])
        //                             ->get()
        //                             ->row_array();
        //                             $value['jml_sales'] = $jml_sales['jml_sales'];
                        
        //                             $data_output[$key] = $value;
        //                         }
        //                         // $data['jumlah_sales'] = $data_output;
        // $data['karyawan']=$data_output;

        // echo'<pre>';
        // print_r($id);
        // return;

        $this->load
        ->view('dashboard',$data);
    }

    public function dashboard_proyek()
    {
        $proyek = $this->db->select('*')
                ->from('tb_proyek')
                ->where('date_deleted',null)
                ->get()
                ->result_array();
        $data['proyek']=$proyek;

        $this->load
        ->view('dashboard_proyek',$data);
    }

    public function dashboard_manajemen_proyek()
    {
        $proyek = $this->db->select('*')
                ->from('tb_proyek')
                ->where('date_deleted',null)
                ->get()
                ->result_array();
        $data['proyek']=$proyek;

        $this->load
        ->view('dashboard_manajemen_proyek',$data);
    }

    public function dashboard_sales()
    {
        $proyek = $this->db->select('*')
                ->from('tb_proyek')
                ->where('date_deleted',null)
                ->get()
                ->result_array();
        $data['proyek']=$proyek;

        $data['jumlah_sales'] = $this->db->from('tb_karyawan')
                            ->where('jabatan',1)
                            ->where('date_deleted',null)
                            ->get()
                            ->num_rows();

        $karyawan = $this->db->select('k.*,j.jabatan as najab, d.divisi as nadiv')
                            ->from('tb_karyawan k')
                            ->join('tb_jabatan j','j.id=k.jabatan')
                            ->join('tb_divisi d','d.id=k.divisi')
                            ->where('k.jabatan',1)
                            ->where('k.date_deleted',null)
                            ->get()
                            ->result_array();

        foreach ($karyawan as $key => $value) {
                                $jml_sales = $this->db
                                ->select('count(id) as jml_sales')
                                ->from('tb_konsumen')
                                ->where('date_deleted', NULL)
                                ->where('nama_marketing', $value['id'])
                                ->get()
                                ->row_array();
                                $value['jml_sales'] = $jml_sales['jml_sales'];
                    
                                $data_output[$key] = $value;
                            }
                            // $data['jumlah_sales'] = $data_output;
        $data['karyawan']=$data_output;

        // echo'<pre>';
        // print_r($value['jml_sales']);
        // return;

        $this->load
        ->view('dashboard_sales',$data);
    }

    public function dashboard_keuangan()
    {
        $proyek = $this->db->select('*')
                ->from('tb_proyek')
                ->where('date_deleted',null)
                ->get()
                ->result_array();
        $data['proyek']=$proyek;

        $this->load
        ->view('dashboard_keuangan',$data);
    }
}

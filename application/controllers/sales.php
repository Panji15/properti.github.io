<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

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
        $data['jumlah_proyek'] = $this->db->from('tb_proyek')
                                ->where('date_deleted',null)
                                ->get()
                                ->num_rows();

        $this->load
        ->view('dashboard',$data);
    }

    public function penjualan_per_sales($id)
    {
        $konsumen = $this->db->select('k.*, p.nama_proyek, kv.kavling as nkav, kv.status as stts, s.keterangan as ketstts, kv.progress')
                            ->from('tb_konsumen k')
                            ->join('tb_proyek p','p.id=k.proyek')
                            ->join('tb_kavling kv','kv.id=k.kavling')
                            ->join('tb_status s','s.id=kv.status')
                            ->join('tb_karyawan kr','kr.id=k.nama_marketing')
                            ->where('k.nama_marketing',$id)
                            ->where('k.date_deleted',null)
                            ->order_by('p.nama_proyek', 'asc')
                            ->get()
                            ->result_array();
        $data['konsumen']=$konsumen;

        $karyawan = $this->db->select('k.*,j.jabatan as najab, d.divisi as nadiv')
                            ->from('tb_karyawan k')
                            ->join('tb_jabatan j','j.id=k.jabatan')
                            ->join('tb_divisi d','d.id=k.divisi')
                            ->where('k.jabatan',1)
                            ->where('k.id',$id)
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


        $this->load
        ->view('sales/penjualan_per_sales',$data);
    }
}

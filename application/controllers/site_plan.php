<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_plan extends CI_Controller {

    /**
     * [__construct description]
     */
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        $this->load->helper('fungsi_helper');
    }

    /**
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
        // $konsumen = $this->db->select('k.*, p.nama_proyek, kv.kavling as nkav, kv.status as stts, s.keterangan as ketstts')
        // ->from('tb_konsumen k')
        // ->join('tb_proyek p','p.id=k.proyek')
        // ->join('tb_kavling kv','kv.id=k.kavling')
        // ->join('tb_status s','s.id=kv.status')
        // ->where('k.proyek',$id)

        // ->where('k.date_deleted',null)
        // ->order_by('p.nama_proyek', 'asc')
        // ->get()
        // ->result_array();
        // $data['konsumen']=$konsumen;

        $this->load
        ->view('site_plan/site_plan');
    }

    public function site_plan_perkavling($id)
    {
        $konsumen = $this->db->select('k.*, p.nama_proyek, kv.kavling as nkav, kv.status as stts, s.keterangan as ketstts, kv.progress')
        ->from('tb_konsumen k')
        ->join('tb_proyek p','p.id=k.proyek')
        ->join('tb_kavling kv','kv.id=k.kavling')
        ->join('tb_status s','s.id=kv.status')
        ->where('k.proyek',$id)

        ->where('k.date_deleted',null)
        ->order_by('p.nama_proyek', 'asc')
        ->get()
        ->result_array();
        $data['konsumen']=$konsumen;

        $proyek = $this->db->select('*')
        ->from('tb_proyek')
        ->where('id',$id)
        ->where('date_deleted',null)
        ->get()
        ->result_array();
        $data['proyek']=$proyek;

        $spesifikasi = $this->db->select('ts.*,tjs.spesifikasi, tp.nama_proyek')
        ->from('tb_spesifikasi ts')
        ->join('tb_jenis_spesifikasi tjs','tjs.id=ts.spesifikasi')
        ->join('tb_proyek tp','tp.id=ts.proyek')
        ->where('tp.id',$id)
        ->where('ts.date_deleted',null)
        ->get()
        ->result_array();
        $data['spesifikasi']=$spesifikasi;

        $this->load
        ->view('site_plan/site_plan_perkavling', $data);
    }

    // public function gu_site()
    // {
    //     $this->load
    //     ->view('site_plan/gu_site');
    // }

    public function master_kavling_detail($id)
    {

        if (isset($id)) {
            $kavling = $this->db->select('k.*, pm.bayar, p.nama_proyek, kv.kavling as kvl, s.keterangan, kv.progress, kr.nama as namarkt, kr.hp, kv.id as idkav')
                ->from('tb_konsumen k')
                ->join('tb_proyek p','p.id=k.proyek')
                ->join('tb_kavling kv','kv.id=k.kavling')
                ->join('tb_status s','s.id=kv.status')
                ->join('tb_karyawan kr','kr.id=k.nama_marketing')
                ->join('tb_pembayaran pm','pm.id=k.cara_bayar')
                ->where('k.date_deleted',null)
                ->where('k.kavling',$id)
                ->get()
                ->result_array();

            $data['kavling']=$kavling;
        } else {
            redirect(base_url("site_plan/site_plan_perkavling/".$id));
        }


        foreach ($kavling as $kv) {
            $data['nama_proyek'] = $kv['nama_proyek'];
        }

        $result = $this->db->select('*')
        ->from('tb_proyek')
        // ->where('id',$id)
        ->where('date_deleted',null)
        ->get()
        ->result_array();
        // $data['kavling']=$kavling;

        $proyek = array('' => $data['nama_proyek']);
         foreach ($result as $pk) {
                $proyek[$pk['id']] = $pk['nama_proyek'];
        }
        $data['proyek'] = $proyek;

        $angs = $this->db->select('kv.*,hp.jml_pembayaran')
                        ->from('tb_konsumen kv')
                        ->join('tb_history_pembayaran hp','kv.id=hp.konsumen')
                        ->where('kv.date_deleted',null)
                        ->where('kv.kavling',$id)
                        ->where('hp.pembayaran',3)
                        ->get()
                        ->result_array();

        foreach ($angs as $val) {
            @$data['jml_pembayaran']=$val['jml_pembayaran'];
            $data['idk']=$val['id'];
        }

        $angs = $this->db->select('*')
        ->from('tb_history_pembayaran')
        ->where('date_deleted',null)
        ->where('konsumen',$data['idk'])
        ->where('pembayaran',3)
        ->get()
        ->result_array();

        foreach ($angs as $key => $val) {
            @$data['total_angsuran']+=$val['jml_pembayaran'];
        }

        // echo'<pre>';
        // print_r($data['idk']);
        // return;

        $this->load
        ->view('master_kavling/master_kavling_detail',$data);
    }

    public function gran_urbano()
    {


        $this->load
        ->view('site_plan/gran_urbano');
    }



}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_konsumen extends CI_Controller {

    /**
     * [__construct description]
     */
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        $this->load->model('model_master_konsumen');
    }

    /**
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
        $konsumen = $this->db->select('k.*, p.nama_proyek, kv.kavling as nkav, kv.status as stts, s.keterangan as ketstts, kv.progress, hp.date_added as da')
                            ->from('tb_konsumen k')
                            ->join('tb_proyek p','p.id=k.proyek')
                            ->join('tb_kavling kv','kv.id=k.kavling')
                            ->join('tb_status s','s.id=kv.status')
                            ->join('tb_history_pembayaran hp','hp.konsumen=k.id')
                            ->where('hp.date_deleted',null)
                            ->where('k.date_deleted',null)
                            // ->order_by('p.nama_proyek', 'asc')
                            ->where('hp.pembayaran',3)
                            ->order_by('hp.date_added', 'asc')
                            ->group_by('hp.konsumen')
                            ->get()
                            ->result_array();
        foreach ($konsumen as $key => $value) {
                $jml_angs = $this->db
                            ->select('count(id) as jml_angs')
                            ->from('tb_history_pembayaran')
                            ->where('date_deleted', NULL)
                            ->where('konsumen', $value['id'])
                            ->where('pembayaran',3)
                            ->get()
                            ->row_array();
                            $value['jml_angs'] = $jml_angs['jml_angs'];
                            @$data['jml']+=$value['jml_pembayaran'];
            
                            $data_output[$key] = $value;

                            $idk=$value['id'];
                }
                            // $data['jumlah_sales'] = $data_output;
        $data['konsumen']=$data_output;

        $days = $this->db
        ->select('*')
        ->from('tb_history_pembayaran')
        // ->limit(1)
        ->where('date_deleted', NULL)
        // ->where('konsumen', $idk)
        ->where('pembayaran',3)
        ->group_by('konsumen')
        // ->order_by('id', 'desc')
        ->get()
        ->result_array();

        foreach ($days as $val) {
        // $data['day']=date('Y-m', strtotime($val['date_added']));
        $data['hday']=date('Y-m');
        }

        //         echo'<pre>';
        // print_r($data['day']);
        // return;

        $this->load
        ->view('master_konsumen/master_konsumen',$data);
    }

    public function master_konsumen_edit($id)
    {
        $konsumen = $this->db->select('k.*, p.nama_proyek, kv.kavling as kvl, s.keterangan as ketstts, kv.status as stts, kr.id as idkr, kr.nama as namak, pb.bayar')
                    ->from('tb_konsumen k')
                    ->join('tb_proyek p','p.id=k.proyek')
                    ->join('tb_kavling kv','kv.id=k.kavling')
                    ->join('tb_status s','s.id=kv.status')
                    ->join('tb_karyawan kr','kr.id=k.nama_marketing')
                    ->join('tb_pembayaran pb','pb.id=k.cara_bayar')
                    ->where('k.date_deleted',null)
                    ->where('k.id',$id)
                    ->get()
                    ->result_array();
        $data['konsumen']=$konsumen;

        foreach ($konsumen as $kv) {
            $data['nama_proyek'] = $kv['nama_proyek'];
            $data['ketstts'] = $kv['ketstts'];
            $data['stts'] = $kv['stts'];
            $data['idkr'] = $kv['idkr'];
            $data['namak'] = $kv['namak'];
            $data['cara_bayar'] = $kv['cara_bayar'];
            $data['bayar'] = $kv['bayar'];
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

        $result1 = $this->db->select('*')
        ->from('tb_status')
        // ->where('id',$id)
        // ->where('date_deleted',null)
        ->get()
        ->result_array();

        $status = array($data['stts'] => $data['ketstts']);
         foreach ($result1 as $ket) {
                $status[$ket['id']] = $ket['keterangan'];
        }
        $data['status'] = $status;

        $result2 = $this->db->select('*')
        ->from('tb_karyawan')
        ->where('jabatan',1)
        ->where('date_deleted',null)
        ->get()
        ->result_array();

        $marketing = array($data['idkr'] => $data['namak']);
         foreach ($result2 as $ket) {
                $marketing[$ket['id']] = $ket['nama'];
        }
        $data['marketing'] = $marketing;

        $result3 = $this->db->select('*')
        ->from('tb_pembayaran')
        ->where('date_deleted',null)
        ->get()
        ->result_array();

        $pembayaran = array($data['cara_bayar'] => $data['cara_bayar']);
         foreach ($result3 as $pk) {
                $pembayaran[$pk['id']] = $pk['bayar'];
        }
        $data['pembayaran'] = $pembayaran;

        // echo'<pre>';
        // print_r($konsumen);
        // return;

        $this->load
        ->view('master_konsumen/master_konsumen_edit',$data);
    }

    public function proses_edit()
    {
        $json = array();

      $post = $this->input->post(null,false);
      
      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      $kontak = $this->input->post('kontak');
      $tlahir = $this->input->post('tlahir');
      $alamat = $this->input->post('alamat');
      $alamat2 = $this->input->post('alamat2');
      $identitas = $this->input->post('identitas');
    //   $jumlah_pembayaran = $this->input->post('jumlah_pembayaran');
    //   $kurangan_pembayaran = $this->input->post('kurangan_pembayaran');
      $nama_marketing = $this->input->post('nama_marketing');
    //   $kontak_marketing = $this->input->post('kontak_marketing');
      $harga_jual = $this->input->post('harga_jual');
      $harga_pengikat = $this->input->post('harga_pengikat');
      $diskon = $this->input->post('diskon');
      $uang_muka = $this->input->post('uang_muka');
      $cara_bayar = $this->input->post('cara_bayar');
      $booking_fee = $this->input->post('booking_fee');
      $tanda_jadi = $this->input->post('tanda_jadi');
      $cicilan = $this->input->post('cicilan');
    //   $tenggat_waktu = $this->input->post('tenggat_waktu');
      $note = $this->input->post('note');
      $date_update = date('Y-m-d H:i:s');

      $data = array(
        'nama' => $nama,
        'kontak' => $kontak,
        'tlahir' => $tlahir,
        'alamat' => $alamat,
        'alamat2' => $alamat2,
        'identitas' => $identitas,
        'cara_bayar' => $cara_bayar,
        'uang_muka' => str_replace('.', '', $uang_muka),
        'booking_fee' => str_replace('.', '', $booking_fee),
        'tanda_jadi' => str_replace('.', '', $tanda_jadi),
        'cicilan' => str_replace('.', '', $cicilan),
        // 'tenggat_waktu' => $tenggat_waktu,
        'diskon' => $diskon,
        'harga_jual' => str_replace('.', '', $harga_jual),
        'harga_pengikat' => str_replace('.', '', $harga_pengikat),
        // 'jumlah_pembayaran' => str_replace('.', '', $jumlah_pembayaran),
        // 'kurangan_pembayaran' => str_replace('.', '', $kurangan_pembayaran),
        'nama_marketing' => $nama_marketing,
        // 'kontak_marketing' => $kontak_marketing,
        // 'proses' => $proses,
        'note' => $note,
        'date_update' => $date_update,
        'create_by' => $this->session->userdata("nama"),

        );

        $this->db->where('id', $id);
        $this->db->update('tb_konsumen', $data);

        $angsuran = array(
            // 'pembayaran' => 2,
            // 'no_pembayaran' => $no_pembayaran,
            // 'metode_pembayaran' => $m_pembayaran,
            // 'angsuran' => $angsuran,
            'jml_pembayaran' => str_replace('.', '', $uang_muka),
            'date_update' => $date_update,
            'create_by' => $this->session->userdata("nama"),
            );
    
        $this->db->where('konsumen', $id);
        $this->db->where('pembayaran',2);
        $this->db->update('tb_history_pembayaran', $angsuran);

        
        $bookingfe = array(
            // 'no_pembayaran' => $no_pembayaran,
            // 'metode_pembayaran' => $m_pembayaran,
            // 'angsuran' => $angsuran,
            'jml_pembayaran' => str_replace('.', '', $booking_fee),
            'date_update' => $date_update,
            'create_by' => $this->session->userdata("nama"),
            );
    
        $this->db->where('konsumen', $id);
        $this->db->where('pembayaran',1);
        $this->db->update('tb_history_pembayaran', $bookingfe);
    
        $pengikat = array(
            // 'no_pembayaran' => $no_pembayaran,
            // 'metode_pembayaran' => $m_pembayaran,
            // 'angsuran' => $angsuran,
            'jml_pembayaran' => str_replace('.', '', $harga_pengikat),
            'date_update' => $date_update,
            'create_by' => $this->session->userdata("nama"),
            );
    
        $this->db->where('konsumen', $id);
        $this->db->where('pembayaran',6);
        $this->db->update('tb_history_pembayaran', $pengikat);


        // echo'<pre>';
        // print_r($data);
        // return;
    
        // redirect('master_konsumen');
        $json['success'] = 1;
        $this->output->set_content_type('application/json')->set_output(json_encode($json));

    }

    public function master_konsumen_add()
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

        $status = array('' => '--Pilih Status--');
         foreach ($result1 as $ket) {
                $status[$ket['id']] = $ket['keterangan'];
        }
        $data['status'] = $status;

        $result2 = $this->db->select('*')
        ->from('tb_kavling')
        ->where('status',1)
        ->where('date_deleted',null)
        ->get()
        ->result_array();

        $kavling = array('' => '--Pilih Kavling--');
         foreach ($result2 as $ket) {
                $kavling[$ket['id']] = $ket['kavling'];
        }
        $data['kavling'] = $kavling;

        $result2 = $this->db->select('*')
        ->from('tb_karyawan')
        ->where('jabatan',1)
        ->where('date_deleted',null)
        ->get()
        ->result_array();

        $marketing = array('' => '--Pilih Marketing--');
         foreach ($result2 as $ket) {
                $marketing[$ket['id']] = $ket['nama'];
        }
        $data['marketing'] = $marketing;


        $result3 = $this->db->select('*')
        ->from('tb_pembayaran')
        ->where('date_deleted',null)
        ->get()
        ->result_array();

        $pembayaran = array('' => '--Pilih Pembayaran--');
         foreach ($result3 as $ket) {
                $pembayaran[$ket['id']] = $ket['bayar'];
        }
        $data['pembayaran'] = $pembayaran;

        $this->load
        ->view('master_konsumen/master_konsumen_add',$data);
    }

    function master_subkavling()
    {
      $id = $this->input->post('id');

        $data = $this->db->select('*')
        ->from('tb_kavling')
        ->where('status',1)
        ->where('proyek',$id)
        ->where('date_deleted',null)
        ->get()
        ->result_array();

        echo json_encode($data);
    }

    public function proses_save()
    {
      $post = $this->input->post(null,false);
      
      $proyek = $this->input->post('proyek');
      $kavling = $this->input->post('kavling');
      $nama = $this->input->post('nama');
      $kontak = $this->input->post('kontak');
      $tlahir = $this->input->post('tlahir');
      $alamat = $this->input->post('alamat');
      $alamat2 = $this->input->post('alamat2');
      $identitas = $this->input->post('identitas');
    //   $jumlah_pembayaran = $this->input->post('jumlah_pembayaran');
    //   $kurangan_pembayaran = $this->input->post('kurangan_pembayaran');
      $nama_marketing = $this->input->post('nama_marketing');
    //   $kontak_marketing = $this->input->post('kontak_marketing');
      $harga_jual = $this->input->post('harga_jual');
      $harga_pengikat = $this->input->post('harga_pengikat');
      $diskon = $this->input->post('diskon');
      $uang_muka = $this->input->post('uang_muka');
      $cara_bayar = $this->input->post('cara_bayar');
      $booking_fee = $this->input->post('booking_fee');
      $tanda_jadi = $this->input->post('tanda_jadi');
      $cicilan = $this->input->post('cicilan');
    //   $tenggat_waktu = $this->input->post('tenggat_waktu');
      $note = $this->input->post('note');
      $date_added = date('Y-m-d H:i:s');

      $data = array(
        'kavling' => $kavling,
        'proyek' => $proyek,
        'nama' => $nama,
        'kontak' => $kontak,
        'tlahir' => $tlahir,
        'alamat' => $alamat,
        'alamat2' => $alamat2,
        'identitas' => $identitas,
        'cara_bayar' => $cara_bayar,
        'uang_muka' => str_replace('.', '', $uang_muka),
        'booking_fee' => str_replace('.', '', $booking_fee),
        'tanda_jadi' => str_replace('.', '', $tanda_jadi),
        'cicilan' => str_replace('.', '', $cicilan),
        'diskon' => $diskon,
        // 'tenggat_waktu' => $tenggat_waktu,
        'harga_jual' => str_replace('.', '', $harga_jual),
        'harga_pengikat' => str_replace('.', '', $harga_pengikat),
        // 'jumlah_pembayaran' => str_replace('.', '', $jumlah_pembayaran),
        // 'kurangan_pembayaran' => str_replace('.', '', $kurangan_pembayaran),
        'nama_marketing' => $nama_marketing,
        // 'kontak_marketing' => $kontak_marketing,
        // 'proses' => $proses,
        'note' => $note,
        'date_added' => $date_added,
        'create_by' => $this->session->userdata("nama"),
        );

        $insert_id =$this->db->insert('tb_konsumen', $data);
        $query_insert_id = $this->db->insert_id();


        $angsuran = array(
            'konsumen' => $query_insert_id,
            'pembayaran' => 2,
            // 'no_pembayaran' => $no_pembayaran,
            // 'metode_pembayaran' => $m_pembayaran,
            // 'angsuran' => $angsuran,
            'jml_pembayaran' => str_replace('.', '', $uang_muka),
            'date_added' => $date_added,
            'create_by' => $this->session->userdata("nama"),
            );
    
        $this->db->insert('tb_history_pembayaran', $angsuran);

        $bookingfe = array(
            'konsumen' => $query_insert_id,
            'pembayaran' => 1,
            // 'no_pembayaran' => $no_pembayaran,
            // 'metode_pembayaran' => $m_pembayaran,
            // 'angsuran' => $angsuran,
            'jml_pembayaran' => str_replace('.', '', $booking_fee),
            'date_added' => $date_added,
            'create_by' => $this->session->userdata("nama"),
            );
    
        $this->db->insert('tb_history_pembayaran', $bookingfe);

        $pengikat = array(
            'konsumen' => $query_insert_id,
            'pembayaran' => 6,
            // 'no_pembayaran' => $no_pembayaran,
            // 'metode_pembayaran' => $m_pembayaran,
            // 'angsuran' => $angsuran,
            'jml_pembayaran' => str_replace('.', '', $harga_pengikat),
            'date_added' => $date_added,
            'create_by' => $this->session->userdata("nama"),
            );
    
        $this->db->insert('tb_history_pembayaran', $pengikat);

        $t_jadi = array(
            'konsumen' => $query_insert_id,
            'pembayaran' => 5,
            // 'no_pembayaran' => $no_pembayaran,
            // 'metode_pembayaran' => $m_pembayaran,
            // 'angsuran' => $angsuran,
            'jml_pembayaran' => str_replace('.', '', $tanda_jadi),
            'date_added' => $date_added,
            'create_by' => $this->session->userdata("nama"),
            );
    
        $this->db->insert('tb_history_pembayaran', $t_jadi);


        //Update status kavling yang sudah dibooking
        $data_kavling = array(
            'status' => 2,
            'konsumen' => $query_insert_id,
            );
    
            $this->db->where('id', $kavling);
            $this->db->update('tb_kavling', $data_kavling);

        //Update sisa kavling
        $konsumen = $this->db->select('*')
                            ->from('tb_proyek')
                            ->where('id',$proyek)
                            ->get()
                            ->result_array();

        foreach ($konsumen as $kv) {
            $data['sisa_kavling'] = $kv['sisa_kavling'];
        }

        $sisa_kavling=$data['sisa_kavling'];

        $data_proyek = array(
            'sisa_kavling' => $sisa_kavling-1,
            );
    
            $this->db->where('id', $proyek);
            $this->db->update('tb_proyek', $data_proyek);

        // echo'<pre>';
        // print_r($data);
        // return;
    
        redirect('master_konsumen');
    }

    public function hapus($id)
    {
        $konsumen = $this->db->select('k.*, p.nama_proyek, p.sisa_kavling, kv.kavling as kvl, s.keterangan as ketstts, kv.status as stts')
                    ->from('tb_konsumen k')
                    ->join('tb_proyek p','p.id=k.proyek')
                    ->join('tb_kavling kv','kv.id=k.kavling')
                    ->join('tb_status s','s.id=kv.status')
                    ->where('k.date_deleted',null)
                    ->where('k.id',$id)
                    ->get()
                    ->result_array();

        foreach ($konsumen as $kv) {
            $data['kavling'] = $kv['kavling'];
            $data['sisa_kavling'] = $kv['sisa_kavling'];
            $data['proyek']= $kv['proyek'];
        }

        $proyek=$data['proyek'];
        $kavling=$data['kavling'];
        $sisa_kavling=$data['sisa_kavling'];

        //hapus
        $this->db->set('date_deleted', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tb_konsumen');

        //Update kembali status kavling yang batal dibooking
        $data_kavling = array(
            'status' => 1,
            'konsumen' => null,
            'indikator' => "green",
            );
    
        $this->db->where('id', $kavling);
        $this->db->update('tb_kavling', $data_kavling);

        //Update kembali proyek sisa kavling yang batal dibooking
        $data_proyek = array(
            'sisa_kavling' => $sisa_kavling+1,
            );
    
        $this->db->where('id', $proyek);
        $this->db->update('tb_proyek', $data_proyek);


        $json['success'] = 1;
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function pembayaran($id)
    {
        $konsumen = $this->db->select('k.*, p.nama_proyek, kv.kavling as nkav, kv.status as stts, s.keterangan as ketstts, kv.progress, hp.jml_pembayaran, hp.id as idhp')
                            ->from('tb_konsumen k')
                            ->join('tb_proyek p','p.id=k.proyek')
                            ->join('tb_kavling kv','kv.id=k.kavling')
                            ->join('tb_status s','s.id=kv.status')
                            ->join('tb_history_pembayaran hp','hp.konsumen=k.id')
                            ->where('k.date_deleted',null)
                            ->where('k.id',$id)
                            ->order_by('p.nama_proyek', 'asc')
                            ->get()
                            ->result_array();
        foreach ($konsumen as $key => $value) {
                                $jml_angs = $this->db
                                ->select('count(id) as jml_angs')
                                ->from('tb_history_pembayaran')
                                ->where('date_deleted', NULL)
                                ->where('konsumen', $value['id'])
                                ->where('pembayaran',3)
                                ->get()
                                ->row_array();
                                $value['jml_angs'] = $jml_angs['jml_angs'];
                                @$data['jml']+=$value['jml_pembayaran'];
            
                                $data_output[$key] = $value;
                            }
                            // $data['jumlah_sales'] = $data_output;
        $data['konsumen']=$data_output;

        
        $angs = $this->db->select('*')
                        ->from('tb_history_pembayaran')
                        ->where('date_deleted',null)
                        ->where('konsumen',$id)
                        ->where('pembayaran',3)
                        ->get()
                        ->result_array();

        foreach ($angs as $key => $val) {
            @$data['total_angsuran']+=$val['jml_pembayaran'];
        }

        $data['history'] = $this->db->select('hp.*,s.keterangan')
                                    ->from('tb_history_pembayaran hp')
                                    // ->join('tb_proyek p','p.id=k.proyek')
                                    // ->join('tb_kavling kv','kv.id=k.kavling')
                                    ->join('tb_status_pembayaran s','s.id=hp.pembayaran')
                                    ->where('hp.date_deleted',null)
                                    ->where('hp.konsumen',$id)
                                    // ->order_by('p.nama_proyek', 'asc')
                                    ->get()
                                    ->result_array();

        // echo'<pre>';
        // print_r($data['total_angsuran']);
        // return;

        $this->load
        ->view('master_konsumen/pembayaran',$data);
    }

    public function pembayaran_add($id)
    {
        $data['history']=$this->db->select('hp.*,k.nama, p.nama_proyek,kv.kavling, sp.keterangan as status, k.id as idk, k.cicilan')
                                ->from('tb_history_pembayaran hp')
                                ->join('tb_konsumen k','k.id=hp.konsumen')
                                ->join('tb_proyek p','p.id=k.proyek')
                                ->join('tb_kavling kv','kv.id=k.kavling')
                                ->join('tb_status_pembayaran sp','sp.id=hp.pembayaran')
                                ->where('hp.date_deleted',null)
                                // ->where('hp.pembayaran',3)
                                ->where('hp.konsumen',$id)
                                // ->where('hp.id',$id)
                                ->get()
                                ->result_array();

        foreach ($data['history'] as $key => $value) {
            $data['status']=$value['status'];
            $data['pembayaran']=$value['pembayaran'];
        }

        $result = $this->db->select('*')
        ->from('tb_status_pembayaran')
        ->where('date_deleted',null)
        ->get()
        ->result_array();
        // $data['kavling']=$kavling;

        $byr = array('' => '--Pilih Pembayaran--');
        foreach ($result as $pk) {
            if ($pk['id']==3){
                $byr[$pk['id']] = $pk['keterangan'];
            }
        }
        $data['byr'] = $byr;

        $angsuran= $this->db->select('*')
                            ->from('tb_history_pembayaran')
                            ->where('pembayaran',3)
                            ->where('date_deleted',null)
                            ->get()
                            ->result_array();

       foreach ($angsuran as $key => $value) {
            $jml_angs = $this->db
                                ->select('count(id) as jml_angs')
                                ->from('tb_history_pembayaran')
                                ->where('date_deleted', NULL)
                                ->where('konsumen', $id)
                                ->where('pembayaran',3)
                                ->get()
                                ->row_array();
            $data['jml_angs'] = $jml_angs['jml_angs'];
        }

        $this->load
        ->view('master_konsumen/pembayaran_add',$data);
    }

    public function proses_pembayaran_add()
    {
        // $json = array();

      $post = $this->input->post(null,false);
      
      $id = $this->input->post('id');
      $pembayaran = $this->input->post('pembayaran');
      $no_pembayaran = $this->input->post('no_pembayaran');
      $m_pembayaran = $this->input->post('m_pembayaran');
      $angsuran = $this->input->post('angsuran');
      $jml_pembayaran = $this->input->post('jml_pembayaran');
      $date_added = date('Y-m-d H:i:s');

      $data = array(
        'konsumen' => $id,
        'pembayaran' => $pembayaran,
        'no_pembayaran' => $no_pembayaran,
        'metode_pembayaran' => $m_pembayaran,
        'angsuran' => $angsuran,
        'jml_pembayaran' => str_replace('.', '', $jml_pembayaran),
        'date_added' => $date_added,
        'create_by' => $this->session->userdata("nama"),
        );

        $this->db->insert('tb_history_pembayaran', $data);

        // echo'<pre>';
        // print_r($data);
        // return;
    
        redirect('master_konsumen/pembayaran/'.$id);
        // $json['success'] = 1;
        // $this->output->set_content_type('application/json')->set_output(json_encode($json));

    }

    public function pembayaran_edit($id)
    {

        $data['history']=$this->db->select('hp.*,k.nama, p.nama_proyek,kv.kavling, sp.keterangan as status, k.id as idhp')
                                ->from('tb_history_pembayaran hp')
                                ->join('tb_konsumen k','k.id=hp.konsumen')
                                ->join('tb_proyek p','p.id=k.proyek')
                                ->join('tb_kavling kv','kv.id=k.kavling')
                                ->join('tb_status_pembayaran sp','sp.id=hp.pembayaran')
                                ->where('hp.date_deleted',null)
                                ->where('hp.id',$id)
                                ->get()
                                ->result_array();

        foreach ($data['history'] as $key => $value) {
            $data['status']=$value['status'];
            $data['pembayaran']=$value['pembayaran'];
        }

        $result = $this->db->select('*')
        ->from('tb_status_pembayaran')
        ->where('date_deleted',null)
        ->get()
        ->result_array();
        // $data['kavling']=$kavling;

        $byr = array($data['pembayaran'] => $data['status']);
        foreach ($result as $pk) {
            if ($pk['id']==3){
                $byr[$pk['id']] = $pk['keterangan'];
            }
        }
        $data['byr'] = $byr;

        // echo'<pre>';
        // print_r( $data['history']);
        // return;

        $this->load
        ->view('master_konsumen/pembayaran_edit',$data);
    }

    public function proses_pembayaran_edit()
    {
        $json = array();

      $post = $this->input->post(null,false);
      
      $idhp = $this->input->post('idhp');
      $id = $this->input->post('id');

      $pembayaran = $this->input->post('pembayaran');
      $no_pembayaran = $this->input->post('no_pembayaran');
      $m_pembayaran = $this->input->post('m_pembayaran');
      $angsuran = $this->input->post('angsuran');
      $jml_pembayaran = $this->input->post('jml_pembayaran');
      $date_update = date('Y-m-d H:i:s');

        $this->db->set('pembayaran' , $pembayaran);
        $this->db->set('no_pembayaran' , $no_pembayaran);
        $this->db->set('metode_pembayaran' , $m_pembayaran);
        $this->db->set('angsuran' , $angsuran);
        $this->db->set('jml_pembayaran' , str_replace('.', '', $jml_pembayaran));
        $this->db->set('date_update' , $date_update);
        $this->db->set('create_by' , $this->session->userdata("nama"));

        $this->db->where('id', $id);
        $this->db->update('tb_history_pembayaran');

        // echo'<pre>';
        // print_r($data);
        // return;
    
        // redirect('master_konsumen/pembayaran/'.$id);
        $json['success'] = 1;
        $this->output->set_content_type('application/json')->set_output(json_encode($json));

    }

    public function hapus_pembayaran($id)
    {
        $this->db->set('date_deleted', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tb_history_pembayaran');
        $json['success'] = 1;
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    function form_pemesanan_pdf($id)
	{
        // $data = array(
        //     "dataku" => array(
        //         "nama" => "",
        //         "url" => "http://petanikode.com"
        //     )
        // );

        $konsumen = $this->db->select('k.*, p.nama_proyek, kv.kavling as nkav, kv.status as stts, s.keterangan as ketstts, kv.progress, hp.pembayaran, hp.metode_pembayaran, hp.jml_pembayaran, hp.angsuran, hp.id as idhp')
                            ->from('tb_konsumen k')
                            ->join('tb_proyek p','p.id=k.proyek')
                            ->join('tb_kavling kv','kv.id=k.kavling')
                            ->join('tb_status s','s.id=kv.status')
                            ->join('tb_history_pembayaran hp','hp.konsumen=k.id')
                            ->where('k.date_deleted',null)
                            ->where('k.id',$id)
                            // ->where('hp.konsumen',$id)
                            ->order_by('p.nama_proyek', 'asc')
                            ->get()
                            ->result_array();
        foreach ($konsumen as $key => $value) {
                                $jml_angs = $this->db
                                ->select('count(id) as jml_angs')
                                ->from('tb_history_pembayaran')
                                ->where('date_deleted', NULL)
                                ->where('konsumen', $value['id'])
                                ->where('pembayaran',3)
                                ->get()
                                ->row_array();
                                $value['jml_angs'] = $jml_angs['jml_angs'];
            
                                $data_output[$key] = $value;
                            }
                            // $data['jumlah_sales'] = $data_output;
        $data['konsumen']=$data_output;

        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('master_konsumen/form_pemesanan_pdf', $data);
    }

    public function master_konsumen_telat()
    {
        $data['hday']=date('Y-m');

        $konsumen = $this->db->select('k.*, p.nama_proyek, kv.kavling as nkav, kv.status as stts, s.keterangan as ketstts, kv.progress, hp.date_added as da')
                            ->from('tb_konsumen k')
                            ->join('tb_proyek p','p.id=k.proyek')
                            ->join('tb_kavling kv','kv.id=k.kavling')
                            ->join('tb_status s','s.id=kv.status')
                            ->join('tb_history_pembayaran hp','hp.konsumen=k.id')
                            ->where('hp.date_deleted',null)
                            ->where('k.date_deleted',null)
                            // ->order_by('p.nama_proyek', 'asc')
                            ->where('hp.pembayaran',3)
                            ->order_by('hp.date_added', 'asc')
                            ->group_by('hp.konsumen')
                            ->get()
                            ->result_array();
        foreach ($konsumen as $key => $value) {
            if (date('Y-m-d', strtotime($value['da']))<$data['hday']) {

                $jml_angs = $this->db
                            ->select('count(id) as jml_angs')
                            ->from('tb_history_pembayaran')
                            ->where('date_deleted', NULL)
                            ->where('konsumen', $value['id'])
                            ->where('pembayaran',3)
                            ->get()
                            ->row_array();
                            $value['jml_angs'] = $jml_angs['jml_angs'];
                            @$data['jml']+=$value['jml_pembayaran'];
            
                            $data_output[$key] = $value;

                            $idk=$value['id'];
                }
            }
                            // $data['jumlah_sales'] = $data_output;
        $data['konsumen']=$data_output;

        $days = $this->db
        ->select('*')
        ->from('tb_history_pembayaran')
        // ->limit(1)
        ->where('date_deleted', NULL)
        // ->where('konsumen', $idk)
        ->where('pembayaran',3)
        ->group_by('konsumen')
        // ->order_by('id', 'desc')
        ->get()
        ->result_array();

        foreach ($days as $val) {
        // $data['day']=date('Y-m', strtotime($val['date_added']));
        }

        //         echo'<pre>';
        // print_r($data['day']);
        // return;

        $this->load
        ->view('master_konsumen/master_konsumen_telat',$data);
    }



}
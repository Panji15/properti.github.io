<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * [__construct description]
     */
	public function __construct()
    {
        parent::__construct();
        // if($this->session->userdata('logged_in') == 1){
        //     redirect('dashboard');
        //   }
          $this->load->library('form_validation');
      
          $this->load->model('Model_user');
    }

    /**
     * [index description]
     * @return [type] [description]
     */
	public function index()
	{
		$this->load
        ->layout(false)
        ->view('login');
	}

    function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => hash('sha512', $password)
			);
		$cek = $this->Model_user->cek_login("tb_user",$where)->num_rows();
		if($cek > 0){

			$userz = $this->db->select('u.*,k.nama as name')
			->from('tb_user u')
			->join('tb_karyawan k','k.id=u.nama')
			->where('u.username',$username)
			->get()
			->result_array();

			foreach ($userz as $val) {
				$level=$val['level'];
				// $jabatan=$val['jabatan'];
				$nama=$val['name'];
				$id=$val['nama'];
			}

			$data_session = array(
				'level' => $level,
				// 'jabatan' => $jabatan,
				'id' => $id,
				'nama' => $nama,
				'username' => $username,
				'status' => "login"
				);

			// echo'<pre>';
			// print_r($data_session);
			// return;
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("dashboard"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}  
}

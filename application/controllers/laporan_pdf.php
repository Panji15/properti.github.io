<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan_pdf extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->database();    
        $this->load->helper(array('url','form'));
    }

    public function index(){

    $data['data'] = $this->db->get('post')->result();

    $this->load->library('pdf');
    $customPaper = array(0,0,381.89,595.28);
    $this->pdf->setPaper($customPaper, 'landscape');
    $this->pdf->load_view('laporan_pdf', $data);
    }
}